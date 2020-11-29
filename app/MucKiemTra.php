<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MucKiemTra extends Model
{
    protected $table = 'muc_kiem_tras';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id', 'ten_muc'
    ];

    //Mức kiểm tra có nhiều đề kiểm tra
    public function DeKiemTra()
    {
        return $this->hasMany('App\DeKiemTra');
    }
}
