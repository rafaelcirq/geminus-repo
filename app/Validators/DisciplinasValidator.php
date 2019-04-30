<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class DisciplinasValidator.
 *
 * @package namespace App\Validators;
 */
class DisciplinasValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'matrizes_id'       => 'required',
            'nome'              => 'required|max:191',
            'carga_horaria'     => 'required',
            'periodo'           => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'matrizes_id'       => 'required',
            'nome'              => 'required|max:191',
            'carga_horaria'     => 'required',
            'periodo'           => 'required'
        ],
    ];
}
