@extends('master.home')
<!-- /include mensagens talvez -->
@include('util.validation')
@section('js-importados')
   
    <script src="{{ asset('js/util/select.js') }}"></script>
     <script src="{{asset('js/util/form-controls.js')}}" type="text/javascript"></script> 
@endsection

@section('conteudo')
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                {{isset($resource) ? 'Alteração de Usuário' : 'Cadastro de Usuário'}}
                </h3>
            </div>
        </div>
    </div>
    <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="m_form_2" 
    method="POST" action="{{ isset($resource) ? '/alterarusuario' : '/cadastrarusuario' }}">
    {{ csrf_field() }}
		<div class="m-portlet__body">
            @yield('mensagens')
			<div class="m-form__content">
            <input type="hidden" id="id" name="id" value="{{ old('', isset($resource) ? $resource->id : '') }}">
                <div id="cpfholder" class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">CPF *</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="CPF" placeholder="CPF"
                         data-toggle="m-tooltip" title="Insira seu CPF" autocomplete="off"
                         value="{{ old('CPF', isset($resource) ? $resource->CPF : '') }}">
                         @yield('CPF-erro')
                        
                    </div>
                </div>
          
                <div id="emailholder" class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Email *</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="email" placeholder="Email"
                         data-toggle="m-tooltip" title="Insira seu email" autocomplete="off"
                         value="{{ old('email', isset($resource) ? $resource->email : '') }}">
                         @yield('email-erro')
                    </div>
                </div>
                <div id="passwordholder" class="form-group m-form__group row"
                @if(isset($resource) ) style="display:none" @else   @endif>
                    <label class="col-form-label col-lg-3 col-sm-12">Senha *</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="password" class="form-control m-input" name="password" placeholder="Senha" 
                        data-toggle="m-tooltip" title="Insira sua Senha" autocomplete="off"
                        value="{{ old('password', isset($resource) ? $resource->password : '') }}">
                        @yield('password-erro')
                    </div>
                </div>
            </div>
        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions">
                <div class="row">
                    <div class="col-lg-9 ml-lg-auto">
                        <button type="submit" class="btn btn-accent">Salvar</button>
                        <a href="{{url('/listarusuario}')}">
                        <button type="reset" class="btn btn-secondary">Voltar</button></a>
                    </div>
                </div>
            </div>
        </div>
    </form>
        <!--end: Datatable -->


</div>
@endsection

