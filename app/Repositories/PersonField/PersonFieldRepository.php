<?php

/**
 * Created by PhpStorm.
 * User: alexandra.duarte
 * Date: 3/10/2017
 * Time: 5:18 PM
 */
namespace App\Repositories\PersonField;

use Prettus\Repository\Eloquent\BaseRepository;

class PersonFieldRepository extends BaseRepository
{
    public function model()
    {
        return PersonField::class;
    }
}