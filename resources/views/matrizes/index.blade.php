@foreach ($matrizes as $m)
    Matriz: {{$m->nome}}<br>
    Curso: {{$m->curso->nome}}
    <br>====================<br>
@endforeach