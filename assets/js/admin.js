(function($) {
	$(document).ready(function() { 
		$('#ms-popup-elist').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				'copy', 'csv', 'excel', 'print'
			]
		} );
		$('#ms-feedback-elist').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				'copy', 'csv', 'excel', 'print'
			]
		} );
	} );
})(jQuery);