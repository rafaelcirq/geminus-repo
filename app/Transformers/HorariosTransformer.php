<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Horarios;

/**
 * Class HorariosTransformer.
 *
 * @package namespace App\Transformers;
 */
class HorariosTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['turma'];
    /**
     * Transform the Horarios entity.
     *
     * @param \App\Entities\Horarios $model
     *
     * @return array
     */
    public function transform(Horarios $model)
    {
        return [
            'id'         => (int) $model->id,

            'dia'        => $model->dia,
            'horaInicio' => $model->hora_inicio,
            'horaFim'    => $model->hora_fim,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeTurmas(Horarios $model)
    {
        return $this->collection($model->turma, new TurmasTransformer());
    }
}
