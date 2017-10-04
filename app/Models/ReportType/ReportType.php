<?php

namespace App\Models\ReportType;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportType extends Model
{
    use SoftDeletes;

    public $table = 'report_types';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'email'
    ];

    public static $rules = [
        'name' => 'required',
        'email' => 'required|unique:users|email'
    ];

}
