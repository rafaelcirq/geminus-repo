<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\HorariosRepository;
use App\Entities\Horarios;
use App\Validators\HorariosValidator;

/**
 * Class HorariosRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class HorariosRepositoryEloquent extends BaseRepository implements HorariosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Horarios::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return HorariosValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
