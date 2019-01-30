var url = 'fotos';
$.ajax({
	url: url,
	type: 'GET',
	dataType: 'json',
	success: function (data) {
		console.log(data)
		if (data.success) {
		
		} else {
			console.log('erro')
		}
	}
});