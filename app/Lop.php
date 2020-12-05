<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Lop extends Model
{
    protected $table = 'lops';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id', 'ten_lop', 'so_luong', 'nam_hoc', 'trang_thai'
    ];

    //Lớp có nhiều học sinh
    public function HocSinh()
    {
        return $this->hasMany('App\HocSinh');
    }

    //Lớp thuộc năm học
    public function NamHoc()
    {
        return $this->belongsTo('App\NamHoc');
    }
}
