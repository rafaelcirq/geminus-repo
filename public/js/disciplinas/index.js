//== Class definition

var DatatableDataLocalDemo = function () {
	//== Private functions

	// demo initializer
	var demo = function () {

        var dataJSONArray = JSON.parse('[{"RecordID":1,"nome":"Programação I","curso":"Sistemas de Informação","matriz":"2015 / 1","cargaHoraria":"120 horas","periodo":"3º"},{"RecordID":100,"nome":"Estrutura de Dados I","curso":"Sistemas de Informação","matriz":"2015 / 1","cargaHoraria":"120 horas","periodo":"3º"}]');
		
		var datatable = $('.m_datatable').mDatatable({
			// datasource definition
			data: {
				type: 'local',
				source: dataJSONArray,
				pageSize: 10
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
				field: "nome",
				title: "Nome"
			}, {
				field: "curso",
				title: "Curso"
			}, {
				field: "matriz",
				title: "Matriz"
			}, {
				field: "cargaHoraria",
				title: "Carga Horária",
				responsive: {visible: 'lg'}
			}, {
				field: "periodo",
				title: "Período",
				responsive: {visible: 'lg'}
			}, {
				field: "Actions",
				width: 110,
				title: "Actions",
				sortable: false,
				overflow: 'visible',
				template: function (row, index, datatable) {
					var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';

					return '\
                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Mostrar">\
                            <i class="la la-eye"></i>\
                        </a>\
						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Editar">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Excluir">\
                            <i class="la la-trash"></i>\
                        </a>\
					';
				}
			}]
		});

		var query = datatable.getDataSourceQuery();

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