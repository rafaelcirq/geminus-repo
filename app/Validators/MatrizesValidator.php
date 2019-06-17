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
    protected $messages = [
        'nome.unique' => 'Matriz já cadastrada',
    ];
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'cursos_id' => 'required',
            'nome'      => 'required|max:191'
           // .'|unique:matrizes,nome,$this->nome,NULL,nome,cursos_id,$this->curso'
            ,
            'ativa'     => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'cursos_id' => 'required',
            'nome'      => 'required|max:191',
            'ativa'     => 'required'
        ],
    ];
}