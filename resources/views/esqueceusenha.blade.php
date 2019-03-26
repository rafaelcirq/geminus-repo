@extends('main')
@include('util.mensagens')
@section('content')
<div class="m-grid m-grid--hor m-grid--root m-page" style="margin-top:-10%;">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(media/bg-image.jpg);     background-size: 112%;
    background-position: center;">
				<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
					<div class="m-login__container">
                        <div class="m-login__logo" style="margin-bottom:-8%">
						<a href="#"> <img src="{{asset('media/geminus.png')}}" style="margin-top:25%; width: 300px"></a>
</div>

<div class="sm-login__forget-password" >
	<div class="m-login__head">
		<h3 class="m-login__title">
			Esqueceu a senha ?
		</h3>
	    <div class="m-login__desc">
			Insira seu email para trocar a senha:
		</div>
	</div>
    <div style="width:200%; margin-left:-160px">
	@yield('mensagens')
    </div>
	<form class="m-login__form m-form" method="post" action="{{ url('/esqueceusenha') }}">
        {{ csrf_field() }}
        <div class="form-group m-form__group" style="margin-top:-40px">
            <input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
        </div>
        <div class="m-login__form-action" style="margin-top:1px">
            <button id="m_login_forget_password_submit" style="background-color: #0d123c" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primaryr">
                Enviar
            </button>
            &nbsp;&nbsp;
            <a id="m_login_forget_password_cancel" href="{!! route('entrar') !!}" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom m-login__btn">
                Voltar
            </a>  
        </div>
    </form>			
</div>
@endsection