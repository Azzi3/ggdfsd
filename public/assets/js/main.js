
$(document).on('click', '#deleteBtn', function (e) {
	var id = $(this).data('projectid');
	$(document).on('click', '#reallyDelete', function (e) {
		var url = location.origin + location.pathname + '?deleteid='+ id;
		location.href = url;
	});
});