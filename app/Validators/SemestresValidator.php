<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class SemestresValidator.
 *
 * @package namespace App\Validators;
 */
class SemestresValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
        	'nome' => 'required|min:6|max:6'
        ],
        ValidatorInterface::RULE_UPDATE => [
        	'nome' => 'required|min:6|max:6'
        ],
    ];
}
