//== Class definition

var Form = function ()
{

    var setOpcoesPreRequisitos = function() {
        var idMatriz = $("#matrizes_id").val();

        $("#pre_requisitos > option").each(function() {
            var idMatrizOption = $(this).attr('id_matriz');
            if(idMatrizOption !== idMatriz) {
                $(this).prop('disabled', true);
            } else {
                $(this).prop('disabled', false);
            }
        });

        $('#pre_requisitos').select2();

        disableOpcaoDisciplina();
    }

    var disableOpcaoDisciplina = function() {
        var idDisciplina = $("#id_disciplina").val();
        console.log(idDisciplina);

        $("#pre_requisitos > option").each(function() {
            var idDisciplinaOption = $(this).val();
            if(idDisciplinaOption === idDisciplina) {
                $(this).prop('disabled', true);
            }
        });

        $("#equivalencias > option").each(function() {
            var idDisciplinaOption = $(this).val();
            if(idDisciplinaOption === idDisciplina) {
                $(this).prop('disabled', true);
            }
        });
    }

    var onMatrizChange = function() {
        $('#matrizes_id').on('change', function() {
            setOpcoesPreRequisitos(true);
            $('#pre_requisitos').val('');
            $('#pre_requisitos').select2();
		});
    }

    var validation = function() {

        var form = $('#save_form');
        form.validate({

            // define validation rules
            rules: {
                nome: {
                    required: true
                },
                carga_horaria: {
                    required: true
                },
                matrizes_id: {
                    required: true
                },
                periodo: {
                    required: true
                }
            }, messages: {
                "nome": {
                    required: "Este campo é obrigatório."
                },
                "carga_horaria": {
                    required: "Este campo é obrigatório."
                },
                "matrizes_id": {
                    required: "Este campo é obrigatório."
                },
                "periodo": {
                    required: "Este campo é obrigatório."
                }
            },
            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                var alert = $('#m_form_error_msg');
                alert.removeClass('m--hide').show();
                // Synerg.scrollTo(alert, -200);
                window.scrollTo(alert, -200);
            },
            submitHandler: function(cForm) {
                // form[0].submit();
                // console.log(cForm);                                
                mApp.blockPage();
                var formAction = form.attr('action');
                var formData = new FormData(form[0]);
                // Ajax post data to server.
                handleAjaxFormSubmit(form, formAction, formData);
                // salvarForm(form, formAction, formData);
            }
        });
    }

    var handleAjaxFormSubmit = function(form, formAction, formData) {
        return $.ajax({
            url: formAction,
            type: 'POST',
            dataType: "JSON",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response, status) {

                mApp.unblockPage();
                var alert = $('#m_form_error_msg');

                if (response.success) {
                    alert.addClass('m--hide').hide();
                    swal({
                        position: 'top-end',
                        type: 'success',
                        title: response.message,
                        showConfirmButton: true,
                        timer: 2300,
                        onClose: () => {
                            console.log('close');
                        }
                    });
                    // If not update, clear the form.
                    if (!$("input[name='_method']").val()) {
                        form.clearForm(); // clear form
                        $('#role').val(null).trigger('change');
                        $('#pre_requisitos').val('');
                        $('#pre_requisitos').select2();
                        $('#equivalencias').val('');
                        $('#equivalencias').select2();
                        form.validate().resetForm(); // reset validation states
                    }
                } else {
                    console.log('erro', response);
                    alert.removeClass('m--hide').show();
                    swal('Erro!', 'Algo deu errado, entre em contato com o administrador do sistema.', 'error');
                }
            },
            error: function(xhr, desc, err) {
                console.log(err);
            }
        });
    }

    var mask = function() {
        $('.carga').mask('000');
    }

    return {
        // public functions
        init: function() {
            mask();
            validation();
            onMatrizChange();
            setOpcoesPreRequisitos();
        },
    };
}();

jQuery(document).ready(function () {
	Form.init();
});