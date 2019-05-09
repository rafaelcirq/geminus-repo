@extends('master.home') 
@section('js-importados')
<script src="{{ asset('js/util/select.js') }}"></script>
@endsection
 
@section('conteudo')
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Turmas
                    <small>
                        Cadastrar nova turma
                    </small>
                </h3>
            </div>
        </div>
    </div>

    <form class="m-form m-form--fit m-form--label-align-right">
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <div class="col-lg-6">
                    <label>
                        Disciplina:
                    </label>
                    <select class="form-control m-bootstrap-select" id="m_form_status">
                        <option value="">
                            Programação I
                        </option>
                    </select>
                </div>
                <div class="col-lg-6">
                    <label>
                        Nome:
                    </label>
                    <input type="" class="form-control m-input" id="" placeholder="">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-lg-2">
                    <label>
                        Semestre:
                    </label>
                    <select class="form-control m-bootstrap-select" id="m_form_status">
                        <option value="">
                            2019 / 1
                        </option>
                    </select>
                </div>
                <div class="col-lg-10">
                    <label>
                        Professor:
                    </label>
                    <select class="form-control m-bootstrap-select" id="m_form_status">
                        <option value="">
                            Ronaldo de Castro Del-Fiaco
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group m-form__group">
                    <div class="m-form__seperator m-form__seperator--dashed  m-form__seperator--space m--margin-bottom-40"></div>
                <div id="m_repeater_1">
                    <label  class="col-lg-2 col-form-label">
                        Horários:
                    </label>
                    <div class="form-group  m-form__group row" id="m_repeater_1">
                        <div data-repeater-list="" class="col-lg-10">
                            <div data-repeater-item class="form-group m-form__group row align-items-center">

                                <div class="col-lg-3">
                                    <label>
                                        Dia da semana:
                                    </label>
                                    <input type="" class="form-control m-input" id="" placeholder="">
                                </div>
                                <div class="col-lg-3">
                                    <label>
                                        Horário de Início:
                                    </label>
                                    <input type="" class="form-control m-input" id="" placeholder="">
                                </div>
                                <div class="col-lg-3">
                                    <label>
                                        Horário de Fim:
                                    </label>
                                    <input type="" class="form-control m-input" id="" placeholder="">
                                </div>
                                <div class="col-lg-3" style="margin-top: 24px;">
                                    <div data-repeater-delete="" class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
                                        <span>
                                            <i class="la la-trash-o"></i>
                                            <span>
                                                Delete
                                            </span>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="m-form__group form-group row">
                        {{-- <label class="col-lg-2 col-form-label"></label> --}}
                        {{-- <div class="col-lg-4"> --}}
                            <div data-repeater-create="" class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>
                                        Adicionar Horário
                                    </span>
                                </span>
                            </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions">
                <button type="reset" class="btn btn-success">
                    Salvar
                </button>
                <button type="reset" class="btn btn-secondary">
                    Cancelar
                </button>
            </div>
        </div>
    </form>

</div>
@endsection