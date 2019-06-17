@extends('master.home')

@section('js-importados')
    <script src="{{ asset('js/professores/index.js') }}"></script>
    <script src="{{ asset('js/util/select.js') }}"></script>
@endsection

@section('conteudo')

<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Professores
                    <small>
                        Lista de professores cadastradas
                    </small>
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">
        
        <!--begin: Search Form -->
        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
            <div class="row align-items-center">
                <div class="col-xl-8 order-2 order-xl-1">
                    <div class="form-group m-form__group row align-items-center">

                        <div class="col-md-6">
                            <div class="m-input-icon m-input-icon--left">
                                <input type="text" class="form-control m-input m-input--solid" placeholder="Buscar..." id="generalSearch">
                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                    <span>
                                        <i class="la la-search"></i>
                                    </span>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-1 order-1 order-xl-2 m--align-right">
                    <a href="{{ route('professores.create') }}" href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                        <span>
                            <i class="flaticon-plus"></i>
                            <span>
                                Novo Professor
                            </span>
                        </span>
                    </a>
                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
            </div>
        </div>
        <!--end: Search Form -->

        <!--begin: Datatable -->
        <div class="m_datatable" id="local_data"></div>
        <!--end: Datatable -->

        <div id="rel_delete_forms">
            @foreach($professores as $professor)
                {{ Form::open(['method' => 'DELETE', 'id' => "delete_form_".$professor->id, 'route' => ['professores.destroy', $professor->id]]) }}
                    {{-- <button>delete</button> --}}
                {{ Form::close() }}
            @endforeach
        </div>

    </div>
</div>
@endsection