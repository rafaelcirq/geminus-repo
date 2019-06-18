//== Class definition

var DatatableDataLocalDemo = function () {
	//== Private functions


    var handleModal = function () {
        var $modal = $('#modal_equivalencias')

        $(document).on('click', '.ajax-modal', function () {
            var el = $(this);
            
            mApp.blockPage();

            setTimeout(function () {


                mApp.unblockPage();
                $modal.load(el.attr('data-href'), '', function () {
                    $modal.modal();
                });

            }, 300);
        });
    }

	// demo initializer
	var demo = function () {

		var datatable = $('.m_datatable').mDatatable({
			// datasource definition
			data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: 'disciplinas',
                        map: function (raw) {
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;

                                jQuery.each(dataSet, function(index, disciplina) {
									disciplina.cursoMatriz = disciplina.matriz.data.nome + " - " + disciplina.matriz.data.curso.data.nome;
                                })
							}
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
            
            translate:{
                toolbar:{
                    pagination:{
                        items:{
                            info: 'Mostrando {{start}} - {{end}} de {{total}} registros',
                        }
                    }
                },
                records:{
                    noRecords: 'Esta matriz não possui disciplinas cadastradas.'
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
				title: "Nome",
				width: 230,
			}, {
				field: "cursoMatriz",
				title: "Matriz",
				width: 250,
			},{
				field: "periodo",
				title: "Período",
				width: 70,
			}, {
                field: "Actions",
				title: "Disciplinas Equivalentes",
				sortable: false,
                overflow: 'visible',
                textAlign: 'center',
				template: function (row, index, datatable) {
					var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';

					return '\
						<a data-href="equivalencias/'+ row.id + '" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill ajax-modal" title="Ver Disciplinas Equivalentes">\
                            <i class="la la-eye"></i>\
                        </a>\
					';
				}
			}]
		});

        var query = datatable.getDataSourceQuery();

		$('#m_form_matriz').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'cursoMatriz');
		});

	};

	return {
		//== Public functions
		init: function () {

            handleModal();

			// init dmeo
			demo();
		}
	};
}();

jQuery(document).ready(function () {
	DatatableDataLocalDemo.init();
});