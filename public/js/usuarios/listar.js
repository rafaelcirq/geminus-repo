//== Class definition

var Index = function ()
{
    //== Private functions

    // index initializer
    var index = function ()
    {
        var dataJSONArray = JSON.parse('[{"RecordID":1,"OrderID":"54473-251","ShipCountry":"GT","ShipCity":"San Pedro Ayampuc","ShipName":"Sanford-Halvorson","ShipAddress":"897 Magdeline Park","CompanyEmail":"sgormally0@dot.gov","CompanyAgent":"Shandra Gormally","CompanyName":"Eichmann, Upton and Homenick","Currency":"GTQ","Notes":"sit amet cursus id turpis integer aliquet massa id lobortis convallis","Department":"Computers","Website":"house.gov","Latitude":"14.78667","Longitude":"-90.45111","ShipDate":"5/21/2016","TimeZone":"America/Guatemala","Status":1,"Type":2}]   ');
        
        $.ajax({
            url: "UsuarioController.php",
            success: function(data){
                alert(data)
             }
          });

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
                selector: { class: 'm-checkbox--solid m-checkbox--brand' }
            }, {
                field: "cpf",
                title: "CPF"
            }, {
                field: "email",
                title: "Email",
                responsive: { visible: 'lg' }
            }, {
                field: "Ações",
                width: 110,
                title: "Ações",
                sortable: false,
                overflow: 'visible',
                template: function (row, index, datatable)
                {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';

                    return '\
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
       

        $('#m_form_status').on('change', function ()
        {
            datatable.search($(this).val(), 'Status');
        }).val(typeof query.Status !== 'undefined' ? query.Status : '');

        $('#m_form_type').on('change', function ()
        {
            datatable.search($(this).val(), 'Type');
        }).val(typeof query.Type !== 'undefined' ? query.Type : '');

    };

    return {
        //== Public functions
        init: function ()
        {
            // init dmeo
            index();
        }
    };
}();

jQuery(document).ready(function ()
{
    Index.init();
});