<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SemestresRepository;
use App\Entities\Semestres;
use App\Validators\SemestresValidator;

/**
 * Class SemestresRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SemestresRepositoryEloquent extends BaseRepository implements SemestresRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Semestres::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SemestresValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
