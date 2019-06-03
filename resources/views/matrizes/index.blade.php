@extends('master.home')

@section('js-importados')
    <script src="{{ asset('js/matrizes/index.js') }}"></script>
    <script src="{{ asset('js/util/select.js') }}"></script>
@endsection

@section('conteudo')

<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Matrizes
                    <small>
                        Lista de matrizes cadastradas
                    </small>
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">

        <!--begin: Search Form -->
        <!-- <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
            <div class="row align-items-center">
                <div class="col-xl-8 order-2 order-xl-1">
                    <div class="form-group m-form__group row align-items-center">

                        <div class="form-group m-form__group row align-items-center">
                            <div class="col-md-8">
                                <div class="m-form__group m-form__group--inline">
                                        <div class="m-form__label">
                                        <label>
                                            Matriz:
                                        </label>
                                    </div>
                                    <div class="m-form__control">
                                        <select class="form-control m-bootstrap-select" id="m_form_matrizes">
                                            <option value="">
                                                Todos
                                            </option>
                                            @foreach ($matrizes as $matriz)
                                            <option value={{ $matriz->nome }}>
                                                    {{ $matriz->nome }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="d-md-none m--margin-bottom-10"></div>
                            </div>
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
                </div>
                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    <a href="{{ route('matrizes.create') }}" href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                        <span>
                            <i class="flaticon-plus"></i>
                            <span>
                                Nova Matriz
                            </span>
                        </span>
                    </a>
                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
            </div>
        </div> -->
        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
            <div class="row align-items-center row align-items-center m--margin-left-10">
                <div class="col-xl-8 order-2 order-xl-1">
                    <div class="form-group m-form__group row align-items-center">

                        <div class="form-group m-form__group row align-items-center" style="width: 100%">
                            <div class="col-md-4">
                                <div class="m-form__group m-form__group--inline">
                                        <div class="m-form__label">
                                        <label>
                                            Curso:
                                        </label>
                                    </div>
                                    <div class="m-form__control">
                                        <select class="form-control m-bootstrap-select" id="m_form_curso">
                                        <option value="">
                                            Todos
                                        </option>
                                        @foreach ($cursos as $curso)
                                            <option value="{{ $curso->nome }}">
                                                {{ $curso->nome }}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="d-md-none m--margin-bottom-10"></div>
                            </div>
                            <div class="col-md-5">
                                <div class="m-form__group m-form__group--inline">
                                    <div class="m-form__label">
                                        <label class="m-label m-label--single">
                                            Matriz:
                                        </label>
                                    </div>
                                    <div class="m-form__control">
                                        <select class="form-control m-bootstrap-select" id="m_form_matrizes">
                                            <option value="">
                                            Todos
                                        </option>
                                        @foreach ($matrizes as $matriz)
                                            <option value="{{ $matriz->nome }}">
                                                {{ $matriz->nome }} - {{ $matriz->curso->nome }}
                                            </option>
                                        @endforeach
                                        </select>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-md-none m--margin-bottom-10"></div>
                            </div>
                            <!-- <div class="col-md-3">
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input m-input--solid" placeholder="Buscar..." id="generalSearch">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                        <span>
                                            <i class="la la-search"></i>
                                        </span>
                                    </span>
                                </div>
                            </div> -->
                            <div class="col-md-3">
                                <div class="m-form__group m-form__group--inline">
                                    <div class="m-form__label">
                                        <label class="m-label m-label--single">
                                           Status:
                                        </label>
                                    </div>
                                    <div class="m-form__control">
                                        <select class="form-control m-bootstrap-select" id="m_form_status">
                                            <option value="">
                                            Todos
                                        </option>
                                       
                                            <option value=" Ativa"> Ativa </option>
                                            <option value="Inativa"> Inativa </option>
                                       
                                       
                                        </select>
                                    </div>
                                </div>
                                <div class="d-md-none m--margin-bottom-10"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-1 order-1 order-xl-2 m--align-right">
                    <a href="{{ route('matrizes.create') }}" href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                        <span>
                            <i class="flaticon-plus"></i>
                            <span>
                                Nova Matriz
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
            @foreach($matrizes as $matriz)
                {{ Form::open(['method' => 'DELETE', 'id' => "delete_form_".$matriz->id, 'route' => ['matrizes.destroy', $matriz->id]]) }}
                    {{-- <button>delete</button> --}}
                {{ Form::close() }}
            @endforeach
        </div>

    </div>
</div>
@endsection