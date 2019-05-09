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
                    Disciplinas
                    <small>
                        Cadastrar nova disciplina
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
                        Curso:
                    </label>
                    <select class="form-control m-bootstrap-select" id="m_form_status">
                        <option value="">
                            Sistemas de Informação
                        </option>
                    </select>
                </div>
            {{-- </div> --}}
            {{-- <div class="form-group m-form__group"> --}}
                <div class="col-lg-6">
                    <label>
                        Matriz:
                    </label>
                    <select class="form-control m-bootstrap-select" id="m_form_status">
                        <option value="">
                            2015 / 1
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-lg-6">
                    <label>
                        Nome:
                    </label>
                    <input type="" class="form-control m-input" id="" placeholder="">
                </div>
                <div class="col-lg-3">
                    <label>
                            Período:
                        </label>
                    <select class="form-control m-bootstrap-select" id="m_form_status">
                        <option value="">
                            1º
                        </option>
                    </select>
                </div>
                <div class="col-lg-3">
                    <label>
                        Carga-Horária (em horas):
                    </label>
                    <input type="" class="form-control m-input" id="" placeholder="">
                </div>
            </div>
            <div class="form-group m-form__group">
                <label>
                    Pré-Requisitos:
                </label>    
                <select class="form-control m-select2" id="m_select2_3" name="param" multiple="multiple">
                    <option value="AK" selected>
                        Estrutura de Dados I
                    </option>
                    <option value="HI">
                        Estrutura de Dados II
                    </option>
                </select>
            </div>
            <div class="form-group m-form__group">
                <label>
                        Disciplinas Equivalentes:
                    </label>
                <select class="form-control m-select2" id="m_select2_3_validate" name="param" multiple="multiple">
                    <option value="AK" selected>
                        Programação I - Eng. Civil
                    </option>
                    <option value="HI">
                        Programação I - Eng. da Computação
                    </option>
                </select>
            </div>
            <div class="form-group m-form__group">
                <label>
                    Ementa
                </label>
                <textarea class="form-control m-input" id="Ementa" rows="3"></textarea>
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