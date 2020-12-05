<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ChiTietCauHoi extends Model
{
    protected $table = 'chi_tiet_cau_hois';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id', 'noi_dung', 'a', 'b', 'c', 'd', 'dap_an', 'chi_tiet_de'
    ];

    //Chi tiết câu hỏi thuộc chi tiết đề kiểm tra
    public function ChiTietDe()
    {
        return $this->belongsTo('App\ChiTietDe');
    }
}
