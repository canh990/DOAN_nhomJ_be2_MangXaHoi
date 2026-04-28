<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaBaiViet extends Model
{
    protected $table = 'media_bai_viet';

    public $timestamps = false;

    protected $fillable = [
        'bai_viet_id',
        'loai',
        'duong_dan'
    ];
}
