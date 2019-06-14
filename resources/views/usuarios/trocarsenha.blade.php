@extends('master.home')

@include('util.validation')
@section('js-importados')
    <!-- <script src="{{ asset('js/usuarios/listar.js') }}"></script> -->
    <script src="{{ asset('js/util/select.js') }}"></script>
     <script src="{{asset('js/util/form-controls.js')}}" type="text/javascript"></script> 
@endsection

@section('conteudo')
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Troca de senhas
                </h3>
            </div>
        </div>
    </div>
    <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="m_form_2" 
    method="POST" action="/trocarsenha">
    {{ csrf_field() }}
		<div class="m-portlet__body">
            @yield('mensagem')
			<div class="m-form__content">
                <div id="senhaatualholder" class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Senha Atual *</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="password" class="form-control m-input" name="senhaantiga" placeholder="Senha Atual"
                         data-toggle="m-tooltip" title="Insira sua Senha Atual" autocomplete="off">
                         @yield('senhaatual-erro')
                    </div>
                </div>
          
                <div id="novasenhaholder" class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Nova Senha *</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="password" class="form-control m-input" name="novasenha" placeholder="Nova Senha"
                         data-toggle="m-tooltip" title="Insira sua Nova Senha" autocomplete="off">
                         @yield('novasenha-erro')
                    </div>
                </div>
       
                <div id="confirmarsenhaholder" class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Confirmar Senha *</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="password" class="form-control m-input" name="confirmarsenha" placeholder="Confirmar Senha" 
                        data-toggle="m-tooltip" title="Confirme sua senha" autocomplete="off">
                        @yield('confirmarsenha-erro')
                    </div>
                </div>
            </div>
        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions">
                <div class="row">
                    <div class="col-lg-9 ml-lg-auto">
                        <button type="submit" class="btn m-btn--square  btn-success m-btn m-btn--custom m-btn--bolder m-btn--uppercase">
                                <i class="la la-thumbs-up"></i>Salvar</button>
                        <a class="btn m-btn--square btn-secondary m-btn m-btn--custom m-btn--uppercase" href=" {{ url('/listarusuario') }}">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
        <!--end: Datatable -->


</div>
@endsection

