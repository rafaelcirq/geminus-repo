<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsuarioTableSeeder::class);

         $this->call(CursosTableSeeder::class);

         $this->call(MatrizesTableSeeder::class);

         $this->call(DisciplinasTableSeeder::class);

         $this->call(ProfessoresTableSeeder::class);

         $this->call(SemestresTableSeeder::class);

         $this->call(TurmasTableSeeder::class);

         $this->call(HorariosTableSeeder::class);
    }
}
