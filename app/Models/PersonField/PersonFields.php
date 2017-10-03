<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonField extends Model
{
    use SoftDeletes;

    public $table = 'person_fields';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name'
    ];

    public static $rules = [
        'name' => 'required'
    ];
}
