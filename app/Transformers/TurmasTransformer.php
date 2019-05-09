<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Turmas;

/**
 * Class TurmasTransformer.
 *
 * @package namespace App\Transformers;
 */
class TurmasTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['disciplina', 'professor', 'semestre', 'horarios'];
    /**
     * Transform the Turmas entity.
     *
     * @param \App\Entities\Turmas $model
     *
     * @return array
     */
    public function transform(Turmas $model)
    {
        return [
            'id'         => (int) $model->id,

            'nome'       => $model->nome,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeDisciplina(Turmas $model)
    {
        return $this->item($model->disciplina, new DisciplinasTransformer());
    }

    public function includeProfessor(Turmas $model)
    {
        return $this->item($model->professor, new ProfessoresTransformer());
    }

    public function includeSemestre(Turmas $model)
    {
        return $this->item($model->semestre, new SemestresTransformer());
    }

    public function includeHorarios(Matrizes $model)
    {
        return $this->collection($model->horarios, new HorariosTransformer());
    }
}
