<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class KetQua extends Model
{
    protected $table = 'ket_quas';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id', 'de_kiem_tra', 'mon_hoc', 'ma_hs', 'diem', 'xep_loai'
    ];

    //Kết quả kiểm tra thuộc đề kiểm tra
    public function DeKiemTra()
    {
        return $this->belongsTo('App\DeKiemTra');
    }

    //Kết quả kiểm tra thuộc môn học
    public function MonHoc()
    {
        return $this->belongsTo('App\MonHoc');
    }

    //Kết quả kiểm tra thuộc học sinh, sinh viên
    public function HocSinh()
    {
        return $this->belongsTo('App\HocSinh');
    }
}
