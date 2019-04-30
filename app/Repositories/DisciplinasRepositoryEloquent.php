<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DisciplinasRepository;
use App\Entities\Disciplinas;
use App\Validators\DisciplinasValidator;

/**
 * Class DisciplinasRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DisciplinasRepositoryEloquent extends BaseRepository implements DisciplinasRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Disciplinas::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return DisciplinasValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
