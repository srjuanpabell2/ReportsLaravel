<?php

/**
 * Created by PhpStorm.
 * User: alexandra.duarte
 * Date: 3/10/2017
 * Time: 5:20 PM
 */
namespace App\Repositories\ReportType;

use App\Models\ReportType\ReportType;
use Prettus\Repository\Eloquent\BaseRepository;

class ReportTypeRepository extends BaseRepository
{
    public function model() {
        return ReportType::class;
    }
}