<input value="{{ isset($matriz) ? $matriz->id : null }}" name="id" hidden>

<div class="form-group m-form__group row">
    <div class="col-lg-3">
        <label>
            Ano:
        </label>
        <select class="form-control m-select2" name="ano">
            {{$ano=date("Y")}}
                @for ($i = 2000; $i <= $ano+1;  $i++)
                    <option value="{{ $i }}"
                    @isset($matriz)
                        @if($i == substring($matriz->nome(),4))
                            selected
                        @endif
                    @endisset>
                        {{ $i }}
                    </option>
                @endfor
            </select>
    </div>
    <div class="col-lg-3">
            <label>
                Semestre:
                </label>
            <select class="form-control m-select2" name="semestre">
                @for ($i = 1; $i < 11;  $i++)
                    <option value="{{ $i }}"
                    @isset($matriz)
                        @if($i == substring($matriz->nome(),4,1))
                            selected
                        @endif
                    @endisset>
                        {{ $i }} º
                    </option>
                @endfor
            </select>
        </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-lg-6">
        <label>
            Curso:
        </label>
        <select class="form-control m-select2" name="cursos_id">
            @foreach ($cursos as $curso)
                <option value="{{ $curso->id }}" 
                    @isset($matriz)
                    @if($matriz->cursos->id == $cursos->id)
                        selected
                    @endif
                    @endisset
                    >
                        {{ $curso->nome }}
                    </option>
            @endforeach
        <select>
    </div>
    <div class="col-lg-3">
        <label>
            Status:
        </label>
        <select class="form-control m-bootstrap-select" name="ativa">
               
                    <option value="1"> Ativa </option>
                    <option value="0">Inativa </option>
                
            </select>
    </div>
</div>