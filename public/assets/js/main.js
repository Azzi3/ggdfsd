$(document).ready(function() {
	$('form').h5Validate();
	
	$(document).on('click', '#deleteProjectBtn', function (e) {
		var id = $(this).data('projectid');
		var name = $(this).data('name');
		$('#myModalLabel').append('"' + name + '"');
		$(document).on('click', '#reallyDelete', function (e) {
			var url = location.origin + location.pathname + '?deleteid='+ id;
			location.href = url;
		});
	});


	$(document).on('click', '#deleteCompanyBtn', function (e) {
		var id = $(this).data('companyid');
		var name = $(this).data('name');
		if(!name){
			name = "Lägg till data-name på deleteknappen";
		}
		$('#myModalLabel').append('"' + name + '"');
		$(document).on('click', '#reallyDelete', function (e) {
			var url = location.origin + location.pathname + '?deleteid='+ id;
			location.href = url;
		});
	});

	/**
	*
	*
	*/
	$(document).on('click', '#deleteCourseBtn', function (e) {
		var id = $(this).data('courseid');
		var name = $(this).data('name');
		if(!name){
			name = "Lägg till data-name på deleteknappen";
		}
		$('#myModalLabel').append('"' + name + '"');

		$(document).on('click', '#reallyDelete', function (e) {
			var url = location.origin + location.pathname + '?deleteid='+ id;
			location.href = url;
		});
	});

	$(document).on('click', '#deleteApplicationBtn', function (e) {
		var id = $(this).data('applicationid');
		var name = $(this).data('name');
		if(!name){
			name = "Lägg till data-name på deleteknappen";
		}
		$('#myModalLabel').append(name);
		$(document).on('click', '#reallyDelete', function (e) {
			var url = location.origin + location.pathname + '?deleteid='+ id;
			location.href = url;
		});
	});

});