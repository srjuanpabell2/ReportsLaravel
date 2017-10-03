<?php

/**
 * Created by PhpStorm.
 * User: alexandra.duarte
 * Date: 3/10/2017
 * Time: 5:16 PM
 */
namespace App\Repositories\Person;

use Prettus\Repository\Eloquent\BaseRepository;

class PersonRepository extends BaseRepository
{
    public function model()
    {
        return Person::class;
    }
}