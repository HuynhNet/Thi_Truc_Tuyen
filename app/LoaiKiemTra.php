<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class LoaiKiemTra extends Model
{
    protected $table = 'loai_kiem_tras';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id', 'ten_loai', 'thoi_gian'
    ];
}
