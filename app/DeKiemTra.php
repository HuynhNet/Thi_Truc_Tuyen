<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DeKiemTra extends Model
{
    protected $table = 'de_kiem_tras';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id', 'ma_gv', 'muc_kiem_tra', 'nam_hoc', 'mon_hoc', 'loai_kiem_tra', 'thoi_gian', 'so_cau', 'trang_thai'
    ];

    //Đề kiểm tra thuộc giáo viên
    public function GiaoVien()
    {
        return $this->belongsTo('App\GiaoVien');
    }

    //Đề kiểm tra thuộc mức độ kiểm tra
    public function MucKiemTra()
    {
        return $this->belongsTo('App\MucKiemTra');
    }

    //Đề kiểm tra thuộc năm học
    public function NamHoc()
    {
        return $this->belongsTo('App\NamHoc');
    }

    //Đề kiểm tra thuộc môn học
    public function MonHoc()
    {
        return $this->belongsTo('App\MonHoc');
    }

    //Đề kiểm tra thuộc loại
    public function LoaiKiemTra()
    {
        return $this->belongsTo('App\LoaiKiemTra');
    }
}
