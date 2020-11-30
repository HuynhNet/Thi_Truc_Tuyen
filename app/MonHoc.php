<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MonHoc extends Model
{
    protected $table = 'mon_hocs';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id','ma_mon_hoc','ten_mon_hoc','hinh_anh','trang_thai'
    ];

    //Môn học có nhiều câu hỏi
    public function CauHoi()
    {
        return $this->hasMany('App\CauHoi');
    }

    //Môn học có nhiều đề kiểm tra
    public function DeKiemTra()
    {
        return $this->hasMany('App\DeKiemTra');
    }
}
