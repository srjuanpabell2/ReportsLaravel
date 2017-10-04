<?php

namespace App\Http\Controllers;

use App\Repositories\Criterias\FiltersCriteria;
use App\Repositories\Criterias\WithRelationshipsCriteria;
use App\Repositories\Person\PersonRepository;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;

class PersonAPIController extends AppBaseController
{
    private $personRepository;

    public function __construct(PersonRepository $personRepository) {
        $this->personRepository = $personRepository;
        $this->personRepository->pushCriteria(new WithRelationshipsCriteria(['reports', 'person_data']));
    }

    public function index(Request $request) {
        $this->personRepository->pushCriteria(new RequestCriteria($request));
        $this->personRepository->pushCriteria(new LimitOffsetCriteria($request));
        if($request->has('filters')){
            $this->personRepository->pushCriteria(new FiltersCriteria($request->get('filters')));
        }
        $people = $this->personRepository->paginate(21);

        return $this->sendResponse($people->toArray(), 'People retrieved successfully');
    }

}
