$(document).ready(function() {
	$('form').h5Validate();
	
	$(document).on('click', '#deleteProjectBtn', function (e) {
		var id = $(this).data('projectid');
		$(document).on('click', '#reallyDelete', function (e) {
			var url = location.origin + location.pathname + '?deleteid='+ id;
			location.href = url;
		});
	});


	$(document).on('click', '#deleteCompanyBtn', function (e) {
		var id = $(this).data('companyid');
		$(document).on('click', '#reallyDelete', function (e) {
			var url = location.origin + location.pathname + '?deleteid='+ id;
			location.href = url;
		});
	});
});