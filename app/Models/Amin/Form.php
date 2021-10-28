<?php

namespace App\Models\Amin;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'email',
        'mssv',
        'ten',
        'sdt',
        'ngay_muon',
    ];
}
