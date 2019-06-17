@extends('master.home')

@section('js-importados')
<script src="{{ asset('js/util/select.js') }}"></script>
<script src="{{ asset('js/equivalencias/index.js') }}"></script>
@endsection

@section('conteudo')
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Equivalências
                    <small>
                        Consulta
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

                        <div class="form-group m-form__group row align-items-center">
                            <div class="col-md-7">
                                <div class="m-form__group m-form__group--inline">
                                    <div class="m-form__label">
                                        <label class="m-label m-label--single">
                                            Matriz:
                                        </label>
                                    </div>
                                    <div class="m-form__control">
                                        <select class="form-control m-select2" id="m_form_matriz">
                                            <option value="">
                                            Todos
                                        </option>
                                        @foreach ($matrizes as $matriz)
                                            <option value="{{ $matriz->nome }} - {{ $matriz->curso->nome }}">
                                                {{ $matriz->nome }} - {{ $matriz->curso->nome }}
                                            </option>
                                        @endforeach
                                        </select>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-md-none m--margin-bottom-10"></div>
                            </div>
                            <div class="col-md-5">
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
            </div>
        </div>
        <!--end: Search Form -->

        <!--begin: Datatable -->
        <div class="m_datatable" id="local_data"></div>
        <!--end: Datatable -->

        {{-- begin: Modal Horarios --}}
        <div class="modal fade" id="modal_equivalencias" tabindex="-1" role="dialog"></div>
        {{-- end: Modal Horarios --}}

    </div>
</div>
@endsection