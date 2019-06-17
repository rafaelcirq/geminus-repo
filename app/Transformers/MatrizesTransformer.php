<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Matrizes;

/**
 * Class MatrizesTransformer.
 *
 * @package namespace App\Transformers;
 */
class MatrizesTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['curso'];
    /**
     * Transform the Matrizes entity.
     *
     * @param \App\Entities\Matrizes $model
     *
     * @return array
     */
    public function transform(Matrizes $model)
    {
        return [
            'id'         => (int) $model->id,

            'nome'       => $model->nome,
            'ativa'      => $model->ativa == 1 ? " Ativa" : "Inativa",  
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeCurso(Matrizes $model)
    {
        return $this->item($model->curso, new CursosTransformer());
    }

    public function includeDisciplinas(Matrizes $model)
    {
        return $this->collection($model->disciplinas, new DisciplinasTransformer());
    }
}
