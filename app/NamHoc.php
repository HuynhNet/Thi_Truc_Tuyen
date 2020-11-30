<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class NamHoc extends Model
{
    protected $table = 'nam_hocs';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id', 'nam'
    ];

    //Năm học có nhiều đề kiểm tra
    public function DeKiemTra()
    {
        return $this->hasMany('App\DeKiemTra');
    }
}
