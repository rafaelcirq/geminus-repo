<input value="{{ isset($matrizes) ? $matrizes->id : null }}" name="id" hidden>        
<div class="form-group m-form__group row">
    <div class="col-lg-3 m-form__group-sub">
        <label >Ano*:</label>
        <select class="form-control m-select2" name="ano" id="ano" data-toggle="m-tooltip" title="Selecione o ano da matriz">
            <option value="">Selecione o ano</option>
            {{$ano=date("Y")+1}}
                @for ($i = $ano; $i >=2000;  $i--)
                    <option value="{{ $i }}"
                    @isset($matrizes)
                        @if($i == substr($matrizes->nome,0,4))
                            selected
                        @endif
                    @endisset>
                        {{ $i }}
                    </option>
                @endfor
            </select>
    </div>
    <div class="col-lg-3 m-form__group-sub">
        <label >Semestre*:</label>
        <select class="form-control m-select2" name="semestre" id="semestre">
            <option value="">Selecione o semestre</option>
                @for ($i = 1; $i < 3;  $i++)
                    <option value="{{ $i }}"   
                    @isset($matrizes)
                        
                        @if($i == substr($matrizes->nome,5))
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
            Curso*:
        </label>
        <select class="form-control m-select2" name="cursos_id" id="curso">
        <option value="">Selecione o curso</option>
            @foreach ($cursos as $curso)
                <option value="{{ $curso->id }}" 
                    @isset($matrizes)
                    @if($matrizes->cursos_id == $curso->id)
                        selected
                    @endif
                    @endisset
                    >
                        {{ $curso->nome }}
                    </option>
            @endforeach
        <select>
    </div>
    <div class="col-lg-3 m-form__group-sub">
        <label>Status*:</label>
        <select class="form-control m-select2" name="ativa" id="status">
            <option value="">Selecione o status</option>
                    <option value="1"
                        @isset($matrizes)
                            @if($matrizes->ativa == 1) selected  @endif
                    @endisset
                    > Ativa </option>
                    <option value="0"
                    @isset($matrizes)
                            @if($matrizes->ativa == 0) selected  @endif
                    @endisset
                    >Inativa </option>
                
            </select>
    </div>
</div>