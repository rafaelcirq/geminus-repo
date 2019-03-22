<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Cursos;

/**
 * Class CursosTransformer.
 *
 * @package namespace App\Transformers;
 */
class CursosTransformer extends TransformerAbstract
{
    /**
     * Transform the Cursos entity.
     *
     * @param \App\Entities\Cursos $model
     *
     * @return array
     */
    public function transform(Cursos $model)
    {
        return [
            'id'         => (int) $model->id,

            'nome'       => $model->nome,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
