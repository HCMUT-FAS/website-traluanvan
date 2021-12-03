<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'email',
        'mssv',
        'luanvan',
        'ten',
        'sdt',
        'ngay_muon',
    ];
}
