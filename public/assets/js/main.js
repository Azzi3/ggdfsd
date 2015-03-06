$(document).ready(function() {
	$('form').h5Validate();
	
	$(document).on('click', '#deleteProjectBtn', function (e) {
		var id = $(this).data('projectid');
		var name = $(this).data('name');
		$('#myModalLabel span').html(name);
		$(document).on('click', '#reallyDelete', function (e) {
			var url = location.origin + location.pathname + '?deleteid='+ id;
			location.href = url;
		});
	});

	$(document).on('click', '#deleteTagBtn', function (e) {
		var id = $(this).data('tagid');
		var name = $(this).data('name');
		$('#myModalLabel span').html(name);
		$(document).on('click', '#reallyDelete', function (e) {
			var url = location.origin + location.pathname + '?deleteid='+ id;
			location.href = url;
		});
	});

	$(document).on('click', '#deleteCourseBtn', function (e) {
		var id = $(this).data('courseid');
		var name = $(this).data('name');
		$('#myModalLabel span').html(name);

		$(document).on('click', '#reallyDelete', function (e) {
			var url = location.origin + location.pathname + '?deleteid='+ id;
			location.href = url;
		});
	});

	$(document).on('click', '#deleteApplicationBtn', function (e) {
		var id = $(this).data('applicationid');
		var name = $(this).data('name');

		$('#myModalLabel span').html(name);
		$(document).on('click', '#reallyDelete', function (e) {
			var url = location.origin + location.pathname + '?deleteid='+ id;
			location.href = url;
		});
	});

});