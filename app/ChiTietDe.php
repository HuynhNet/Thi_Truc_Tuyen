<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ChiTietDe extends Model
{
    protected $table = 'chi_tiet_des';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id', 'cau_hoi', 'de_kiem_tra'
    ];

    //Chi tiết đề thuộc câu hỏi
    public function CauHoi()
    {
        return $this->belongsTo('App\CauHoi');
    }

    //Chi tiết đề thuộc đề kiểm tra
    public function DeKiemTra()
    {
        return $this->belongsTo('App\DeKiemTra');
    }
}
