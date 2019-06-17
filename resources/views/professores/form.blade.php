<div class="form-group m-form__group row">
    <div class="col-lg-12">
        <label>
            Nome:
        </label>
        <input value="{{ isset($professor) ? $professor->nome : null }}" class="form-control m-input nome" name="nome"
            placeholder="">
    </div>
</div>