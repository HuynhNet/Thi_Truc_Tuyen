<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CauHoi extends Model
{
    protected $table = 'cau_hois';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id', 'dap_an_dung', 'mon_hoc', 'noi_dung', 'hinh_anh', 'a', 'b', 'c', 'd'
    ];

    //Câu hỏi thuộc môn học
    public function MonHoc()
    {
        return $this->belongsTo('App\MonHoc');
    }

    //Câu hỏi có nhiều trong chi tiết đề kiểm tra
    public function ChiTietDe()
    {
        return $this->hasMany('App\ChiTietDe');
    }
}
