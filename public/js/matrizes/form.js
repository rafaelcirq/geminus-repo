//== Class definition

var Form = function ()
{
    var validation = function() {

        var form = $('#save_form');
        form.validate({

            // define validation rules
            rules: {
                ano: {
                    required: true,
                },
                semestre: {
                    required: true,
                },
                curso:{
                    required: true,
                },
                status:{
                    required: true,
                }
            }, messages: {
                "ano": {
                    required: "O campo ano  é obrigatório.",
                },
                "semestre": {
                    required: "O campo semestre é obrigatório.",
                },
                "cursos_id": {
                    required: "O campo curso é obrigatório.",
                },
                "status": {
                    required: "O campo status é obrigatório.",
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
                 form[0].submit();
                // console.log(cForm);                                
                // mApp.blockPage();
                // var formAction = form.attr('action');
                // var formData = new FormData(form[0]);
                // // Ajax post data to server.
                // handleAjaxFormSubmit(form, formAction, formData);
                // // salvarForm(form, formAction, formData);
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
        $('.horario').mask('00:00:00');
        $('.nome').mask('A');
    }

    return {
        // public functions
        init: function() {
            validation();
            mask();
        },
    };
}();

jQuery(document).ready(function () {
	Form.init();
});