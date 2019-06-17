<div class="form-group m-form__group row">
    <div class="col-lg-5">
        <label>
            * Disciplina:
        </label>
        <select class="form-control m-select2" name="disciplinas_id">
            @foreach ($disciplinas as $disciplina)
            <option value="{{ $disciplina->id }}" @isset($turma) @if ($turma->disciplina->id == $disciplina->id)
                selected
                @endif
                @endisset
                >
                {{ $disciplina->nome }} - {{ $disciplina->matriz->curso->nome }} ({{ $disciplina->matriz->nome }})
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-2">
        <label>
            * Turma:
        </label>
        <input value="{{ isset($turma) ? $turma->nome : null }}" class="form-control m-input nome" name="nome"
            placeholder="">
    </div>
    <div class="col-lg-3">
        <label>
            * Professor:
        </label>
        <select class="form-control m-select2" name="professores_id">
            @foreach ($professores as $professor)
            <option value="{{ $professor->id }}" @isset($turma) @if($turma->professor->id == $professor->id)
                selected
                @endif
                @endisset
                >
                {{ $professor->nome }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-2">
        <label>
            * Semestre:
        </label>
        <select class="form-control m-select2" name="semestres_id">
            @foreach ($semestres as $s)
            <option value="{{ $s->id }}" @isset($turma) @if ($turma->semestre->id == $s->id)
                selected
                @endif

                @endisset

                >
                {{$s->semestre}}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group m-form__group row">
    <div class="col-lg-12">
        <label>
            Horários:
        </label>
        <select class="form-control m-select2" name="horarios[]" multiple="multiple">
            @foreach ($horarios as $horario)
            <option value="{{ $horario->id }}" @isset($turma) @foreach ($turma->horarios as $h)
                @if ($h->id == $horario->id)
                selected
                @endif
                @endforeach
                @endisset
                >
                {{ $horario->dia }}, {{ $horario->hora_inicio }} às {{ $horario->hora_fim }}
            </option>
            @endforeach
        </select>
    </div>
</div>