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

    //Loại kiểm tra có nhiều đề kiểm tra
    public function DeKiemTra()
    {
        return $this->hasMany('App\DeKiemTra');
    }
}
