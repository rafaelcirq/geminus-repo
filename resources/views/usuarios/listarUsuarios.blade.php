@extends('master.home')
@include('util.validation')
@section('js-importados')
    <script src="{{ asset('js/usuarios/listar.js') }}"></script>
    <script src="{{ asset('js/util/select.js') }}"></script>
@endsection

@section('conteudo')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Usuários
                    <small>
                        Lista de usuários cadastrados
                    </small>
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">
    @yield('mensagem')
        <!--begin: Search Form -->
        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
            <div class="row align-items-center">
                <div class="col-xl-8 order-2 order-xl-1">
                    <div class="form-group m-form__group row align-items-center">
                        <div class="col-md-4">
                            <div class="m-input-icon m-input-icon--left">
                                <input type="text" class="form-control m-input m-input--solid" placeholder="Procurar..." id="generalSearch">
                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                    <span>
                                        <i class="la la-search"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    <a href="/cadastrarusuario" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                        <span>
                            <i class="flaticon-plus"></i>
                            <span>
                                Novo Usuário
                            </span>
                        </span>
                    </a>
                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
            </div>
        </div>
        <!--end: Search Form -->
        <!--begin: Datatable -->
        <div class="m_datatable" id="local_data">
            <!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
          
        
        Deseja excluir esse registro?
      </div>

      <!--Body-->
      <div class="modal-body">
    <label for="cpf">CPF:</label>   
      <h6 id="cpf"> CPF</h6>
    <label for="email">Email:</label>        
      <h6 id="email"> email</h6>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        <a href="#" id="confirmar" class="btn  btn-outline-danger" style="background-color: red;
        color: white;">Sim</a>
        <a class="btn btn-primary" href="#" data-dismiss="modal" role="button">Não</a>
        
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalConfirmDelete-->
        </div>
        <!--end: Datatable -->

    </div>
</div>
@endsection