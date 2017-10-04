<?php
/**
 * Created by PhpStorm.
 * User: Juan Paz
 * Date: 16/05/2017
 * Time: 2:36 PM
 */

namespace App\Repositories\Criterias;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FiltersCriteria implements CriteriaInterface
{

    private $filters, $model;

    //
    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $this->model = $model;

        $relations = $model->getEagerLoads();
        $filters = $this->getFilters();
        $this->makeFilter($filters, $relations);

        return $this->model;
    }

    private function getFilters()
    {
        $f = explode(';', $this->filters);
        $filters = array();
        foreach ($f AS $filter) {
            if (!empty($filter))
                $filters[] = $filter;
        }
        return $filters;
    }

    private function makeFilter($filters, $relations)
    {
        foreach ($filters AS $filter) {
            $parts = explode('|', $filter);
            list($field, $comparator, $value) = $parts;
            $fieldArray = explode('.', $field);
            $fieldName = array_pop($fieldArray);
            $relation = implode('.', $fieldArray);
            if (empty($relation)) {
                $value = ($comparator == 'like' ? '%' . $value . '%' : $value);
                $this->model = $this->model->where($field, $comparator, $value);
            } elseif (array_key_exists($relation, $relations)) {
                $this->model = $this->model->whereHas($relation, function ($q) use ($fieldName, $comparator, $value) {
                    $value = ($comparator == 'like' ? '%' . $value . '%' : $value);
                    $q->where($fieldName, $comparator, $value);
                });
            }
        }

    }
}