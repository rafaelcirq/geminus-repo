@extends('master.home')

@section('js-importados')
<script src="{{ asset('js/util/select.js') }}"></script>
<script src="{{ asset('js/matrizes/form.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
@endsection

@section('conteudo')
<div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Matrizes
                        <small>
                            Nova Matriz
                        </small>
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">

                @include('layouts.alerts')

        <form method="post" action="{{ route('matrizes.store') }}" id="save_form" class="m-form m-form--state m-form--fit">
            {{ csrf_field() }}
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}" enctype="multipart/form-data">

                @include('matrizes.form')

                <div class="m-portlet__foot">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                        
                            <button type="submit" id="enviar" class="btn m-btn--square  btn-success m-btn m-btn--custom m-btn--bolder m-btn--uppercase">
                                <i class="la la-thumbs-up"></i>
                                Salvar
                            </button>
        
                            <a href="/matrizes" type="submit" class="btn m-btn--square btn-secondary m-btn m-btn--custom m-btn--uppercase">
                                Cancelar
                            </a>

                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection