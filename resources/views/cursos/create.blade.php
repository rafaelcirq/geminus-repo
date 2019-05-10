@extends('master.home')

@section('conteudo')
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Cursos
                    <small>
                        Cadastro de curso
                    </small>
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">

    <form name="" class="m-form m-form--state m-form--fit" action="{{ route('cursos.store') }}" method="post">
         
    </form>

    </div>
</div>
@endsection