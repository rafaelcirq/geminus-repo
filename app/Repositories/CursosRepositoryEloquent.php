<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CursosRepository;
use App\Entities\Cursos;
use App\Validators\CursosValidator;

/**
 * Class CursosRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CursosRepositoryEloquent extends BaseRepository implements CursosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Cursos::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CursosValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
