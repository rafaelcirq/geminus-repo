<?php

use Illuminate\Database\Seeder;

class MatrizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matriz = App\Entities\Matrizes::create([
            'nome' => '2015/1',
            'cursos_id' => 1,
            'ativa' => 1
        ]);

        $matriz = App\Entities\Matrizes::create([
            'nome' => '2015/1',
            'cursos_id' => 2,
            'ativa' => 1
        ]);

        $matriz = App\Entities\Matrizes::create([
            'nome' => '2015/1',
            'cursos_id' => 3,
            'ativa' => 1
        ]);

        $matriz = App\Entities\Matrizes::create([
            'nome' => '2015/1',
            'cursos_id' => 4,
            'ativa' => 1
        ]);

        $matriz = App\Entities\Matrizes::create([
            'nome' => '2008/1',
            'cursos_id' => 4,
            'ativa' => 0
        ]);

        $matriz = App\Entities\Matrizes::create([
            'nome' => '2015/1',
            'cursos_id' => 5,
            'ativa' => 1
        ]);

        $matriz = App\Entities\Matrizes::create([
            'nome' => '2015/1',
            'cursos_id' => 6,
            'ativa' => 1
        ]);

        $matriz = App\Entities\Matrizes::create([
            'nome' => '2015/1',
            'cursos_id' => 7,
            'ativa' => 1
        ]);

        $matriz = App\Entities\Matrizes::create([
            'nome' => '2015/1',
            'cursos_id' => 8,
            'ativa' => 1
        ]);

        $matriz = App\Entities\Matrizes::create([
            'nome' => '2015/1',
            'cursos_id' => 9,
            'ativa' => 1
        ]);

        $matriz = App\Entities\Matrizes::create([
            'nome' => '2009/1',
            'cursos_id' => 10,
            'ativa' => 1
        ]);

        $matriz = App\Entities\Matrizes::create([
            'nome' => '2015/1',
            'cursos_id' => 10,
            'ativa' => 1
        ]);

        $matriz = App\Entities\Matrizes::create([
            'nome' => '2019/1',
            'cursos_id' => 10,
            'ativa' => 1
        ]);
    }
}
