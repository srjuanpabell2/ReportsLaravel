<?php

namespace App\Models\Person;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes;

    public $table = 'people';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'last_name',
        'gender'
    ];

    public static $rules = [
        'name' => 'required',
        'last_name' => 'required',
        'gender' => 'required'
    ];

    public function reports() {
        return $this->belongsToMany(ReportType::class, 'reports');
    }

    public function person_data() {
        return $this->belongsToMany(PersonFields::class, 'person_data');
    }

}
