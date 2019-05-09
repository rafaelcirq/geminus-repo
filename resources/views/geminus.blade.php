<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			Geminus
		</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->
		<link href="{{ asset('css/vendors.bundle.css') }}" rel="stylesheet"/>
		<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet"/>
		<link rel="stylesheet" href="{{ asset('css/style1.css ')}}">
		<!--end::Base Styles -->
		<link rel="shortcut icon" href=" {{ asset('media/favicon.ico') }} " />
	</head>
    <body  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<link href="{{ asset('css/navbar.css') }}" rel="stylesheet" />
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(media/bg-image.jpg);     background-size: 112%;
    background-position: center;">
				<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
					<div class="m-login__container">
						<div class="m-login__logo">
							<a href="#">
								<img src="media/geminus.png" style="width: 300px">
							</a>
							<H2> PÁGINA INICIAL</H2>
						</div>
						
                    </div>
				</div>

		  

			</div>
		</div>
		<style type="text/css">
h2 {
    color:#FFFFFF;
}
</style>
    </body>
<!DOCTYPE html>