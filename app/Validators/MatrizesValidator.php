<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class MatrizesValidator.
 *
 * @package namespace App\Validators;
 */
class MatrizesValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'cursos_id' => 'required',
            'nome'      => 'required|max:191',
            'ativa'     => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'cursos_id' => 'required',
            'nome'      => 'required|max:191',
            'ativa'     => 'required'
        ],
    ];
}