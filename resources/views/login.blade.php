@extends('main')
@include('util.mensagens')
@section('content')
<div class="m-grid m-grid--hor m-grid--root m-page" style="margin-top:-10%;">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid-hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(media/bg-image.jpg);     background-size: 112%;
    background-position: center;">
				<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
					<div class="m-login__container">
                        <div class="m-login__logo" style="margin-bottom:-8%">
						<a href="#"> <img src="{{asset('media/geminus.png')}}" style=" margin-top:25%; width: 300px"></a>
</div>
<div style="width:200%; margin-left:-160px">
	@yield('mensagens')
</div>
<div class="m-login__signin"style="margin-top:-50px;">
	<form class="m-login__form m-form" method="POST" action="{{ url('/login/checklogin') }}">
		{{ csrf_field() }}
		<div class="form-group m-form__group">
		    <input class="form-control m-input"  id="cpf" type="text" placeholder="CPF" name="cpf" autocomplete="off">
		</div>
		<div class="form-group m-form__group">
			<input class="form-control m-input m-login__form-input--last" type="password" id="password" placeholder="Senha" name="password">
		</div>
		<div class="row m-login__form-sub">
			<div class="col m--align-left m-login__form-left">
				<label class="m-checkbox  m-checkbox--focus">
					<input type="checkbox" name="remember">
						Lembrar
				</label>
			</div>
		    <div class="col m--align-right m-login__form-right">
				 <a href="/esqueceusenha" id="m_login_forget_password" class="m-link">
					Esqueceu a senha ?
                </a>
		     </div>
		</div>
		<div class="m-login__form-action" style="margin-top:-20px;">
			<button  type="submit" id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary" style="background-color: #0d123c">
				Login
			</button>
		</div>
	</form>
</div>
@endsection