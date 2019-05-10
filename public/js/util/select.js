//== Class definition

var Select = function ()
{
	
	var select = function ()
	{

		$('.m-bootstrap-select').selectpicker();

		$('.m-select2').select2({
			
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