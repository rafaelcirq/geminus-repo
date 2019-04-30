<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class HorariosValidator.
 *
 * @package namespace App\Validators;
 */
class HorariosValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'turmas_id'       => 'required',
            'dia'             => 'required|max:13',
            'hora_inicio'     => 'required',
            'hora_fim   '     => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
