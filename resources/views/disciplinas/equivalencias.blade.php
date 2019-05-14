@extends('master.home')

@section('js-importados')
<script src="{{ asset('js/util/select.js') }}"></script>
<script src="{{ asset('js/turmas/form.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
@endsection

@section('conteudo')
<div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Turmas
                        <small>
                            Nova turma
                        </small>
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">

        

        </div>
    </div>
@endsection