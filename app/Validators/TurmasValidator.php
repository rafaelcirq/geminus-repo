<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class TurmasValidator.
 *
 * @package namespace App\Validators;
 */
class TurmasValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'nome'              => 'required',
            'disciplinas_id'    => 'required',
            'professores_id'    => 'required',
            'semestres_id'      => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'nome'              => 'required',
            'disciplinas_id'    => 'required',
            'professores_id'    => 'required',
            'semestres_id'      => 'required'
        ],
    ];
}
