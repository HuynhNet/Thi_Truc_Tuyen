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
}
