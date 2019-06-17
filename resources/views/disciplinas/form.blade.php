<input value="{{ isset($disciplina) ? $disciplina->id : null }}" id="id_disciplina" hidden>

<div class="form-group m-form__group row">
    <div class="col-lg-9">
        <label>
            * Nome:
        </label>
        <input type="" class="form-control" value="{{ isset($disciplina) ? $disciplina->nome : null }}"
            name="nome" placeholder="">
    </div>
    <div class="col-lg-3">
        <label>
            * Carga horária:
        </label>
        <input type="" class="form-control" value="{{ isset($disciplina) ? $disciplina->carga_horaria : null }}"
            name="carga_horaria" placeholder="">
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-lg-9">
        <label>
            * Matriz:
        </label>
        <select class="form-control m-select2" name="matrizes_id" id="matrizes_id">
            @foreach ($matrizes as $matriz)
            <option value="{{$matriz->id}}" @isset($disciplina) @if ($disciplina->matriz->id == $matriz->id)
                selected = true
                @endif
                @endisset
                >
                {{ $matriz->nome }} - {{ $matriz->curso->nome }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-3">
        <label>
            * Período:
        </label>
        <select class="form-control m-select2" name="periodo">
            @for ($i = 1; $i < 11; $i++) <option value="{{ $i }}" @isset($disciplina) @if($i==$disciplina->periodo)
                selected
                @endif
                @endisset>
                {{ $i }} º
                </option>
                @endfor
        </select>
    </div>
</div>
<div class="form-group m-form__group">
    <label>
        Pré-Requisitos:
    </label>
    <select class="form-control m-select2" name="pre_requisitos[]" id="pre_requisitos" name="param" multiple="multiple">
        @foreach ($disciplinas as $d)
        <option value="{{ $d->id }}" id_matriz="{{ $d->matriz->id }}" @isset($disciplina) @foreach ($disciplina->
            preRequisitos as $p)
            @if ($p->id == $d->id)
            selected
            @endif
            @endforeach
            @endisset
            >
            {{ $d->nome }} - {{ $d->matriz->curso->nome }} ( {{$d->matriz->nome}} )
        </option>
        @endforeach
    </select>
</div>
<div class="form-group m-form__group">
    <label>
        Disciplinas Equivalentes:
    </label>
    <select class="form-control m-select2" name="equivalencias[]" id="equivalencias" name="param" multiple="multiple">
        @foreach ($disciplinas as $d)
        <option value="{{ $d->id }}" @isset($disciplina) @foreach ($disciplina->equivalencias as $e)
            @if ($e->id == $d->id)
            selected
            @endif
            @endforeach
            @endisset
            >
            {{ $d->nome }} - {{ $d->matriz->curso->nome }} ( {{$d->matriz->nome}} )
        </option>
        @endforeach
    </select>
</div>
<div class="form-group m-form__group">
    <label>
        Ementa
    </label>
    <textarea class="form-control" name="ementa"
        rows="3">{{ isset($disciplina) ? $disciplina->ementa : null }}</textarea>
</div>