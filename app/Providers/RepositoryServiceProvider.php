<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\CursosRepository::class, \App\Repositories\CursosRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MatrizesRepository::class, \App\Repositories\MatrizesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\DisciplinasRepository::class, \App\Repositories\DisciplinasRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProfessoresRepository::class, \App\Repositories\ProfessoresRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SemestresRepository::class, \App\Repositories\SemestresRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TurmasRepository::class, \App\Repositories\TurmasRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\HorariosRepository::class, \App\Repositories\HorariosRepositoryEloquent::class);
        //:end-bindings:
    }
}
