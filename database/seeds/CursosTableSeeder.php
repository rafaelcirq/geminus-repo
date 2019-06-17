<?php

use Illuminate\Database\Seeder;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $curso = App\Entities\Cursos::create([
            'nome' => 'Arquitetura e Urbanismo'
        ]);

        $curso = App\Entities\Cursos::create([
            'nome' => 'Ciências Biológicas'
        ]);

        $curso = App\Entities\Cursos::create([
            'nome' => 'Engenharia Agrícola'
        ]);

        $curso = App\Entities\Cursos::create([
            'nome' => 'Engenharia Civil'
        ]);

        $curso = App\Entities\Cursos::create([
            'nome' => 'Farmácia'
        ]);

        $curso = App\Entities\Cursos::create([
            'nome' => 'Física'
        ]);

        $curso = App\Entities\Cursos::create([
            'nome' => 'Matemática'
        ]);

        $curso = App\Entities\Cursos::create([
            'nome' => 'Química Industrial'
        ]);

        $curso = App\Entities\Cursos::create([
            'nome' => 'Química Licenciatura'
        ]);

        $curso = App\Entities\Cursos::create([
            'nome' => 'Sistemas de Informação'
        ]);
    }
}
