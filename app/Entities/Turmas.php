<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Turmas.
 *
 * @package namespace App\Entities;
 */
class Turmas extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['disciplinas_id', 'professores_id', 'semestres_id', 'nome'];

    public function disciplina() {
        return $this->belongsTo(Disciplinas::class, 'disciplinas_id');
    }

    public function professor() {
        return $this->belongsTo(Professores::class, 'professores_id');
    }

    public function semestre() {
        return $this->belongsTo(Semestres::class, 'semestres_id');
    }

    public function horarios() {
        return $this->belongsToMany(Horarios::class);
    }

}
