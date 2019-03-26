@section('CPF-erro')
@if ($errors->has('CPF'))
        @foreach( $errors->get('CPF') AS $error )
            <div id="name-error" class="form-control-feedback">{{ $error }}</div>
        @endforeach
    <script type="text/javascript">
        
        document.getElementById('cpfholder').setAttribute("class","form-group m-form__group row has-danger");
       
    </script>

@endif
@endsection

@section('email-erro')
@if ($errors->has('email'))
        @foreach( $errors->get('email') AS $error )
            <div id="email-error" class="form-control-feedback">{{ $error }}</div>
        @endforeach
    <script type="text/javascript">
    //$("#emailholder").attr("class","form-group m-form__group row has-danger" );
        document.getElementById('emailholder').setAttribute("class","form-group m-form__group row has-danger");
       
    </script>

@endif
@endsection

@section('password-erro')
@if ($errors->has('password'))
        @foreach( $errors->get('password') AS $error )
            <div id="password-error" class="form-control-feedback">{{ $error }}</div>
        @endforeach
    <script type="text/javascript">
    //$("#emailholder").attr("class","form-group m-form__group row has-danger" );
        document.getElementById('passwordholder').setAttribute("class","form-group m-form__group row has-danger");
       
    </script>

@endif
@endsection

@section('senhaatual-erro')
@if ($errors->has('senhaantiga'))
        @foreach( $errors->get('senhaantiga') AS $error )
            <div id="senhaatual-error" class="form-control-feedback">{{ $error }}</div>
        @endforeach
    <script type="text/javascript">
        
        document.getElementById('senhaatualholder').setAttribute("class","form-group m-form__group row has-danger");
       
    </script>

@endif
@endsection

@section('novasenha-erro')
@if ($errors->has('novasenha'))
        @foreach( $errors->get('novasenha') AS $error )
            <div id="email-error" class="form-control-feedback">{{ $error }}</div>
        @endforeach
    <script type="text/javascript">
    //$("#emailholder").attr("class","form-group m-form__group row has-danger" );
        document.getElementById('novasenhaholder').setAttribute("class","form-group m-form__group row has-danger");
       
    </script>

@endif
@endsection

@section('confirmarsenha-erro')
@if ($errors->has('confirmarsenha'))
        @foreach( $errors->get('confirmarsenha') AS $error )
            <div id="password-error" class="form-control-feedback">{{ $error }}</div>
        @endforeach
    <script type="text/javascript">
    //$("#emailholder").attr("class","form-group m-form__group row has-danger" );
        document.getElementById('confirmarsenhaholder').setAttribute("class","form-group m-form__group row has-danger");
       
    </script>

@endif
@endsection

@section('mensagem')
@if ($message = Session::get('main'))
    <div class="m-alert m-alert--outline alert alert-danger "  style="font-weight: bold; width:50%;
    text-align:center;margin-left:160px">
        <button type="button" class="close" data-dismiss="alert"></button>
        <strong>{{ $message}}</strong>
    </div>

@endif
@endsection

