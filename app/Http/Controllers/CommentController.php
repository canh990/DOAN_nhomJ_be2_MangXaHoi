<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use App\Models\BinhLuan;
use App\Models\CamXuc;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // ── Lấy bình luận của bài viết (phân trang) ──────────
    // GET /api/bai-viet/{baiViet}/binh-luan
    public function index(BaiViet $baiViet): JsonResponse
    {
        $userId = Auth::id();

        $binhLuans = BinhLuan::goc()
            ->where('bai_viet_id', $baiViet->id)
            ->with([
                'nguoiDung:id,ten_dang_nhap,anh_dai_dien,da_xac_thuc',
                'traLoi.nguoiDung:id,ten_dang_nhap,anh_dai_dien,da_xac_thuc',
                'traLoi.camXuc',
                'camXuc',
            ])
            ->withCount('traLoi')
            ->orderByDesc('ngay_tao')
            ->paginate(10);

        // Gắn thêm thông tin reaction của user hiện tại
        $binhLuans->getCollection()->transform(
            fn($bl) => $this->ganThongTinReaction($bl, $userId)
        );

        return response()->json($binhLuans);
    }

    // ── Đăng bình luận mới hoặc trả lời ─────────────────
    // POST /api/bai-viet/{baiViet}/binh-luan
    public function store(Request $request, BaiViet $baiViet): JsonResponse
    {
        $data = $request->validate([
            'noi_dung'         => ['required', 'string', 'max:2000'],
            'binh_luan_cha_id' => ['nullable', 'integer', 'exists:binh_luan,id'],
        ]);

        // Kiểm tra bình luận cha phải thuộc cùng bài viết
        if (!empty($data['binh_luan_cha_id'])) {
            $cha = BinhLuan::findOrFail($data['binh_luan_cha_id']);
            abort_if(
                $cha->bai_viet_id !== $baiViet->id,
                422,
                'Bình luận cha không thuộc bài viết này.'
            );
        }

        $userId = Auth::id() ?? 1;

        $binhLuan = BinhLuan::create([
            'bai_viet_id'      => $baiViet->id,
            'nguoi_dung_id'    => $userId,
            'binh_luan_cha_id' => $data['binh_luan_cha_id'] ?? null,
            'noi_dung'         => $data['noi_dung'],
        ]);

        $binhLuan->load('nguoiDung:id,ten_dang_nhap,anh_dai_dien,da_xac_thuc');
        $binhLuan->phan_ung_cua_toi  = null;
        $binhLuan->tong_hop_cam_xuc  = (object) [];
        $binhLuan->tra_loi_count     = 0;

        return response()->json($binhLuan, 201);
    }

    // ── Sửa bình luận ────────────────────────────────────
    // PUT /api/binh-luan/{binhLuan}
    public function update(Request $request, BinhLuan $binhLuan): JsonResponse
    {
        $this->authorize('update', $binhLuan);

        $data = $request->validate([
            'noi_dung' => ['required', 'string', 'max:2000'],
        ]);

        $binhLuan->update(['noi_dung' => $data['noi_dung']]);

        return response()->json($binhLuan->fresh(['nguoiDung']));
    }

    // ── Xóa bình luận (soft-delete) ───────────────────────
    // DELETE /api/binh-luan/{binhLuan}
    public function destroy(BinhLuan $binhLuan): JsonResponse
    {
        $this->authorize('delete', $binhLuan);
        $binhLuan->thuHoi();

        return response()->json(['message' => 'Đã xóa bình luận.']);
    }

    // ── Tải thêm trả lời của một bình luận ───────────────
    // GET /api/binh-luan/{binhLuan}/tra-loi
    public function traLoi(BinhLuan $binhLuan): JsonResponse
    {
        $userId = Auth::id();

        $traLoi = BinhLuan::chuaXoa()
            ->where('binh_luan_cha_id', $binhLuan->id)
            ->with([
                'nguoiDung:id,ten_dang_nhap,anh_dai_dien,da_xac_thuc',
                'camXuc',
            ])
            ->orderBy('ngay_tao')
            ->paginate(5);

        $traLoi->getCollection()->transform(
            fn($tl) => $this->ganThongTinReaction($tl, $userId)
        );

        return response()->json($traLoi);
    }

    // ── Private helper ────────────────────────────────────
    /** Gắn phan_ung_cua_toi và tong_hop_cam_xuc vào bình luận */
    private function ganThongTinReaction(BinhLuan $bl, int $userId): BinhLuan
    {
        $bl->phan_ung_cua_toi = $bl->camXuc
            ->where('nguoi_dung_id', $userId)->first()?->loai_cam_xuc;

        $bl->tong_hop_cam_xuc = $bl->camXuc
            ->groupBy('loai_cam_xuc')->map->count();

        // Xử lý trả lời lồng nhau
        if ($bl->relationLoaded('traLoi')) {
            $bl->traLoi->transform(
                fn($tl) => $this->ganThongTinReaction($tl, $userId)
            );
        }

        unset($bl->camXuc);
        return $bl;
    }
}