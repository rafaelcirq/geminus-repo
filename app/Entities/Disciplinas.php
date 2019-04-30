<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Disciplinas.
 *
 * @package namespace App\Entities;
 */
class Disciplinas extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['matrizes_id', 'nome', 'carga_horaria', 'ementa', 'periodo'];

    public function matriz() {
        return $this->belongsTo(Matrizes::class, 'matrizes_id');
    }

    public function preRequisitos() {
        return $this->belongsToMany(Disciplinas::class, 'pre_requisitos', 'disciplinas_id', 'pre_requisito_id');
    }

    public function equivalencias() {
        $equivalencias = $this->belongsToMany(Disciplinas::class, 'equivalencias', 'disciplinas_id_1', 'disciplinas_id_2');
        if($equivalencias->count() == 0) {
            $equivalencias = $this->belongsToMany(Disciplinas::class, 'equivalencias', 'disciplinas_id_2', 'disciplinas_id_1');
        }
        return $equivalencias;
    }

    public function turmas()
    {
        return $this->hasMany(Turmas::class);
    }
}
