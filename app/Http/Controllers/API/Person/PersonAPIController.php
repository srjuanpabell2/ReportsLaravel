<?php

namespace App\Http\Controllers\API\Person;

use App\Http\Controllers\Controller;
use App\Repositories\Criterias\FiltersCriteria;
use App\Repositories\Criterias\WithRelationshipsCriteria;
use App\Repositories\Person\PersonRepository;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Http\Response;

class PersonAPIController extends Controller
{
    private $personRepository;

    public function __construct(PersonRepository $personRepository) {
        $this->personRepository = $personRepository;
        $this->personRepository->pushCriteria(new WithRelationshipsCriteria(['reports', 'person_data']));
    }

    public function index(Request $request) {
        $this->personRepository->pushCriteria(new RequestCriteria($request));
        if($request->has('filters')){
            $this->personRepository->pushCriteria(new FiltersCriteria($request->get('filters')));
        }
        $people = $this->personRepository->paginate(21);

        return response()->json($people->toArray());
    }

}
