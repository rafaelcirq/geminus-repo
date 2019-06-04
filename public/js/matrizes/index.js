//== Class definition

var DatatableDataLocalDemo = function () {
	//== Private functions

	// demo initializer
	var demo = function () {

        // var dataJSONArray = JSON.parse('[{"RecordID":1,"nome":"Programação I","curso":"Sistemas de Informação","matriz":"2015 / 1","cargaHoraria":"120 horas","periodo":"3º"},{"RecordID":100,"nome":"Estrutura de Dados I","curso":"Sistemas de Informação","matriz":"2015 / 1","cargaHoraria":"120 horas","periodo":"3º"}]');
		
		var datatable = $('.m_datatable').mDatatable({
			// datasource definition
			data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: 'matrizes',
                        map: function (raw) {
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                             console.log(dataSet);
                            return dataSet;
                        },
                    },
                },
                pageSize: 30,
                serverPaging: false,
                serverFiltering: false,
                serverSorting: false,
			},

			// layout definition
			layout: {
				theme: 'default', // datatable theme
				class: '', // custom wrapper class
				scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
				// height: 450, // datatable's body's fixed height
				footer: false // display/hide footer
			},

			// column sorting
			sortable: true,

			pagination: true,

			search: {
				input: $('#m_form_curso'),
            },
            translate:{
                toolbar:{
                    pagination:{
                        items:{
                            info: 'Mostrando {{start}} - {{end}} de {{total}} registros',
                        }
                    }
                }
            },

			// inline and bactch editing(cooming soon)
            // editable: false,
			// columns definition
			columns: [{
				field: "id",
				title: "#",
				width: 50,
				sortable: false,
				textAlign: 'center',
        		selector: {class: 'm-checkbox--solid m-checkbox--brand'}
			}, {
				field: "nome",
				title: "Semestre"
			}, {
				field: "curso.data.nome",
				title: "Curso"
			},
			{
				field: "ativa",
				title: "Status",
				responsive: {visible: 'lg'}
			}, {
				field: "Ações",
				width: 110,
				title: "Acões",
				sortable: false,
				overflow: 'visible',
				template: function (row, index, datatable) {
					var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
					return '\
						<a href="matrizes/'+ row.id + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Editar">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a data-id="'+ row.id +'" row-index="'+ index +'" class="m_sweetalert_delete m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Excluir">\
                            <i class="la la-trash"></i>\
                        </a>\
					';
				}
			}]
		});

        var query = datatable.getDataSourceQuery();
        
        var search = datatable.search($(m_form_matrizes).val());

		$('#m_form_matrizes').on('change', function() {
             datatable.search($(this).val().toLowerCase(), 'id');
        });

        $('#m_form_curso').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'curso.data.nome');
       });
       $('#m_form_status').on('change', function() {
            datatable.search($(this).val(), 'ativa');
        });

		$(document).on('click', '.m_sweetalert_delete', function() {
            // e.preventDefault();
            var id    = $(this).attr("data-id");
			var index = $(this).attr("row-index");
            deleteData(id, index, datatable);  
        });

	};

	var deleteData = function(id, index, datatable) {

        swal({
            title: 'Deseja realmente excluir?',
            text: "Após excluído, você não poderá reverter isso!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar'
        })
        .then(function(result) {

            if (result.value) {

                mApp.blockPage();
                var form = $('#delete_form_' + id);
                var formAction  = form.attr('action');
                var formData = form.serializeArray();

                // Ajax post data to server.
                $.post(formAction, formData, function (response) {

                    // console.log(response);
                    mApp.unblockPage();

                    if(response.success) {

                        // Removing the row
                        datatable.row('[data-row="'+ index +'"]').remove();
                        // $('.m_datatable').mDatatable('reload');

                        swal({
                            position: 'top-right',
                            type: 'success',
                            title: 'Deletado!',
                            text: response.message, //Registro excluído com sucesso.
                            showConfirmButton: true,
                            timer: 2300,
                            onClose: () => {
                                // Synerg.scrollTo('#app');
                            }
                        });
                    }
                    else {
                        swal("Erro!", response.message, "error");
                    }
                    
                }, 'json');
            }
        });
    };

	return {
		//== Public functions
		init: function () {
			// init dmeo
			demo();
		}
	};
}();

jQuery(document).ready(function () {
	DatatableDataLocalDemo.init();
});