<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Professores;

/**
 * Class ProfessoresTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProfessoresTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['turmas'];

    /**
     * Transform the Professores entity.
     *
     * @param \App\Entities\Professores $model
     *
     * @return array
     */
    public function transform(Professores $model)
    {
        return [
            'id'         => (int) $model->id,

            'nome'       => $model->nome,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeTurmas(Professores $model)
    {
        return $this->collection($model->turmas, new TurmasTransformer());
    }
}
