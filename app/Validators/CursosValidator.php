<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class CursosValidator.
 *
 * @package namespace App\Validators;
 */
class CursosValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
        	'nome' => 'required|max:191'
        ],
        ValidatorInterface::RULE_UPDATE => [
        	'nome' => 'required|max:191'
        ],
    ];
}
