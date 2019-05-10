@extends('master.home')

@section('js-importados')
<script src="{{ asset('js/util/select.js') }}"></script>
{{-- <script src="{{ asset('js/turmas/form.js') }}"></script> --}}
@endsection

@section('conteudo')
<div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Turmas
                        <small>
                            Editar turma
                        </small>
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">

            @include('layouts.alerts')

            {{ Form::open(['method' => 'PUT', 'id' => "save_form", 'route' => ['turmas.update', $turma->id]]) }}

            @include('turmas.form')

            <div class="m-portlet__foot">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                    
                        <button type="submit" class="btn m-btn--square  btn-success m-btn m-btn--custom m-btn--bolder m-btn--uppercase">
                            <i class="la la-thumbs-up"></i>
                            Salvar
                        </button>
    
                        <a href="/turmas" class="btn m-btn--square btn-secondary m-btn m-btn--custom m-btn--uppercase">
                            Cancelar
                        </a>

                    </div>
                </div>
            </div>

            {{ Form::close() }}

        </div>
    </div>
@endsection