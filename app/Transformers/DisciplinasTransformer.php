<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Disciplinas;

/**
 * Class DisciplinasTransformer.
 *
 * @package namespace App\Transformers;
 */
class DisciplinasTransformer extends TransformerAbstract
{
    /**
     * Transform the Disciplinas entity.
     *
     * @param \App\Entities\Disciplinas $model
     *
     * @return array
     */
    public function transform(Disciplinas $model)
    {
        return [
            'id'            => (int) $model->id,

            'nome'          => $model->nome,
            'cargaHoraria'  => $model->carga_horaria,
            'ementa'        => $model->ementa,
            'periodo'       => $model->periodo,

            'created_at'    => $model->created_at,
            'updated_at'    => $model->updated_at
        ];
    }

    public function includeMatriz(Disciplinas $model)
    {
        return $this->item($model->matriz, new MatrizesTransformer());
    }

    public function includePreRequisitos(Disciplinas $model)
    {
        return $this->collection($model->preRequisitos, new DisciplinasTransformer());
    }

    public function includeEquivalencias(Disciplinas $model)
    {
        return $this->collection($model->equivalencias, new DisciplinasTransformer());
    }
}
