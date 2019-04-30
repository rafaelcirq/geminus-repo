<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Matrizes.
 *
 * @package namespace App\Entities;
 */
class Matrizes extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cursos_id', 'nome', 'ativa'];
    
    public function curso() {
        return $this->belongsTo(Cursos::class, 'cursos_id');
    }

    public function disciplinas() {
        return $this->hasMany(Disciplinas::class);
    }

}
