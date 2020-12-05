<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class HocSinh extends Model
{
    protected $table = 'hoc_sinhs';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id', 'ma_hs', 'id_bai_lam', 'id_lop', 'id_ket_qua'
    ];

    //Học sinh có nhiều bài làm
    public function BaiLam()
    {
        return $this->hasMany('App\BaiLam');
    }

    //Học sinh thuộc lớp
    public function Lop()
    {
        return $this->belongsTo('App\Lop');
    }

    //Học sinh thuộc kết quả thi
    public function KetQua()
    {
        return $this->belongsTo('App\KetQua');
    }
}
