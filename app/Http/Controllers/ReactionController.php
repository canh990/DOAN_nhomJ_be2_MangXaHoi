<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use App\Models\BinhLuan;
use App\Models\CamXuc;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ReactionController extends Controller
{
    // ── Toggle reaction bài viết ──────────────────────────
    // POST /api/bai-viet/{baiViet}/reaction
    public function toggleBaiViet(Request $request, BaiViet $baiViet): JsonResponse
    {
        $request->validate([
            'loai_cam_xuc' => ['required', Rule::in(array_keys(CamXuc::$LOAI))],
        ]);

        $userId = Auth::id() ?? 1;

        return $this->doToggle(
            nguoiDungId: $userId,
            loai:        $request->loai_cam_xuc,
            baiVietId:   $baiViet->id,
            binhLuanId:  null,
        );
    }

    // ── Toggle reaction bình luận ─────────────────────────
    // POST /api/binh-luan/{binhLuan}/reaction
    public function toggleBinhLuan(Request $request, BinhLuan $binhLuan): JsonResponse
    {
        $request->validate([
            'loai_cam_xuc' => ['required', Rule::in(array_keys(CamXuc::$LOAI))],
        ]);

        // Tạm thời dùng user ID giả để test
        $userId = 1; // Giả sử user ID = 1

        return $this->doToggle(
            nguoiDungId: $userId,
            loai:        $request->loai_cam_xuc,
            baiVietId:   null,
            binhLuanId:  $binhLuan->id,
        );
    }

    // ── Danh sách người đã react (modal) ─────────────────
    // GET /api/bai-viet/{baiViet}/reactions?loai=tim
    public function danhSach(Request $request, BaiViet $baiViet): JsonResponse
    {
        $query = CamXuc::with('nguoiDung:id,ten_dang_nhap,anh_dai_dien,da_xac_thuc')
            ->where('bai_viet_id', $baiViet->id);

        if ($loai = $request->query('loai')) {
            $query->where('loai_cam_xuc', $loai);
        }

        return response()->json($query->latest('ngay_tao')->paginate(20));
    }

    // ── Private: logic toggle chung ───────────────────────
    private function doToggle(
        int    $nguoiDungId,
        string $loai,
        ?int   $baiVietId,
        ?int   $binhLuanId,
    ): JsonResponse {
        // Điều kiện tìm reaction cũ
        $where = ['nguoi_dung_id' => $nguoiDungId];
        $baiVietId
            ? $where['bai_viet_id']  = $baiVietId
            : $where['binh_luan_id'] = $binhLuanId;

        $existing = CamXuc::where($where)->first();

        if ($existing && $existing->loai_cam_xuc === $loai) {
            // Click cùng loại → bỏ reaction (toggle off)
            $existing->delete();
            $action = 'removed';
        } else {
            // Tạo mới hoặc đổi sang loại khác
            CamXuc::updateOrCreate($where, [
                'loai_cam_xuc' => $loai,
                'ngay_tao'     => now(),
            ]);
            $action = $existing ? 'changed' : 'added';
        }

        // Đếm lại
        $countWhere = $baiVietId
            ? ['bai_viet_id'  => $baiVietId]
            : ['binh_luan_id' => $binhLuanId];

        $tongHop = CamXuc::where($countWhere)
            ->selectRaw('loai_cam_xuc, COUNT(*) as so_luong')
            ->groupBy('loai_cam_xuc')
            ->pluck('so_luong', 'loai_cam_xuc');

        $phanUngHienTai = CamXuc::where($where)->value('loai_cam_xuc');

        return response()->json([
            'action'            => $action,           // 'added' | 'changed' | 'removed'
            'tong_so'           => $tongHop->sum(),
            'tong_hop'          => $tongHop,          // ['thich'=>5, 'tim'=>2, ...]
            'phan_ung_hien_tai' => $phanUngHienTai,   // null nếu đã bỏ
            'labels'            => CamXuc::$LOAI,
        ]);
    }
}