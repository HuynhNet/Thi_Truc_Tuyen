<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class GiaoVien extends Model
{

    //Giáo viên có nhiều đề kiểm tra
    public function DeKiemTra()
    {
        return $this->hasMany('App\DeKiemTra');
    }
}
