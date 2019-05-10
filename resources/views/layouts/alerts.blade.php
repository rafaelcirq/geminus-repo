{{-- ALERTS --}}
@if($errors->any())
<div class="m-form__content">    
    <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show m--margin-bottom-30" role="alert">
        <div class="m-alert__icon">
            <i class="la la-warning"></i>
            <span></span>
        </div>
        <div class="m-alert__text">
            <strong>
                    Existem campos sem preencher.
                </strong>
                Por favor, verifique-os antes de salvar
            <ul class="m--margin-top-10">
                @foreach ($errors->all() as $error)
                <li class="small">
                    {!! $error !!}
                </li>
                @endforeach
            </ul>
        </div>
        <div class="m-alert__close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>
@endif

<div class="m-form__content">
    <div class="m-alert m-alert--outline m-alert--square m-alert--outline-2x alert alert-danger alert-dismissible fade show m--margin-bottom-30 m--hide" id="m_form_error_msg" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        <strong>
            Existem campos sem preencher.
        </strong>
        Por favor, verifique-os antes de salvar
    </div>
    
    @if(Session::get('response')['success'])
    <div class="m-alert m-alert--outline m-alert--square m-alert--outline-2x alert alert-success alert-dismissible fade show m--margin-bottom-30" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        <strong>
            Muito Bem!
        </strong>
        {{ Session::get('response')['message'] }}
    </div>
    @endif

</div>


