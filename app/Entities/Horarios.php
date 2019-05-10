<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Horarios.
 *
 * @package namespace App\Entities;
 */
class Horarios extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['turmas_id', 'dia', 'hora_inicio', 'hora_fim'];

    public function turmas() {
        return $this->hasMany(Turmas::class, 'turmas_id');
    }

}
