//== Class definition

var DatatableDataLocalDemo = function () {
	//== Private functions

	var handleModal = function() {
		var $modal = $('#turmas_mostrar_horarios')

		$(document).on('click', '.ajax-modal', function() {
            var el = $(this);
			console.log('clicou');
            mApp.blockPage();

            setTimeout(function() {

                
                mApp.unblockPage();
                $modal.load(el.attr('data-href'), '', function() {
                    $modal.modal();
                });
            
            }, 300);
        });
	}

	// initializer
	var init = function () {
        
		var datatable = $('.m_datatable').mDatatable({
			// datasource definition
			data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: 'turmas',
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
				input: $('#generalSearch')
			},

			// inline and bactch editing(cooming soon)
			// editable: false,

			// columns definition
			columns: [{
				field: "RecordID",
				title: "#",
				width: 50,
				sortable: false,
				textAlign: 'center',
        		selector: {class: 'm-checkbox--solid m-checkbox--brand'}
			}, {
				field: "disciplina.data.nome",
				title: "Disciplina",
				textAlign: 'center',
			},  {
				field: "nome",
				title: "Turma",
				textAlign: 'center',
			},  {
				field: "disciplina.data.matriz.data.curso.data.nome",
				title: "Curso",
				textAlign: 'center',
			}, {
				field: "professor.data.nome",
				title: "Professor",
				textAlign: 'center',
			}, {
				field: "semestre.data.semestre",
				title: "Semestre",
				textAlign: 'center',
				responsive: {visible: 'lg'}
			}, {
				field: "horarios",
				width: 110,
				title: "Horários",
				textAlign: 'center',
				sortable: false,
				overflow: 'visible',
				template: function (row, index, datatable) {
					var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';

					return '\
                        <a href="#" data-href="turma-horarios/'+ row.id +'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill ajax-modal" title="Mostrar">\
                            <i class="la la-eye"></i>\
                        </a>\
					';
				}
			}, {
				field: "Ações",
				width: 110,
				title: "Ações",
				sortable: false,
				overflow: 'visible',
				template: function (row, index, datatable) {
					var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';

					return '\
						<a href="turmas/'+ row.id + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Editar">\
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
			handleModal();
			init();
		}
	};
}();

jQuery(document).ready(function () {
	DatatableDataLocalDemo.init();
});