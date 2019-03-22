//== Class definition

var Select = function ()
{
	
	var select = function ()
	{

		$('.m-bootstrap-select').selectpicker();

		$('#m_select2_3, #m_select2_3_validate').select2({
			
		});

	};

	return {

		init: function ()
		{
			select();
		}
	};
}();

jQuery(document).ready(function () {
	Select.init();
});