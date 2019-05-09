<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Semestres;

/**
 * Class SemestresTransformer.
 *
 * @package namespace App\Transformers;
 */
class SemestresTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [];

    /**
     * Transform the Semestres entity.
     *
     * @param \App\Entities\Semestres $model
     *
     * @return array
     */
    public function transform(Semestres $model)
    {
        return [
            'id'         => (int) $model->id,

            'semestre'   => $model->semestre, 

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
