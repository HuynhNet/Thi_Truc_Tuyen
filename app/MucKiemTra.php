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
}
