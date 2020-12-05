<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BaiLam extends Model
{
    protected $table = 'bai_lams';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id', 'ma_hs', 'ma_de', 'ma_mon', 'thoi_gian_bat_dau_lam','thoi_gian_ket_thuc'
    ];

    //Bài làm thuộc học sinh
    public function HocSinh()
    {
        return $this->belongsTo('App\HocSinh');
    }

    //Bài làm thuộc đề kiểm tra
    public function DeKiemTra()
    {
        return $this->belongsTo('App\DeKiemTra');
    }

    //Bài làm thuộc môn học
    public function MonHoc()
    {
        return $this->belongsTo('App\MonHoc');
    }
}
