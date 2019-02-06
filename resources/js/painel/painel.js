$.ajax({
	url: 'fotos',
	type: 'GET',
	dataType: 'json',
	success: function (data) {
		console.log(data)
		let reg=[]
		uri = data.uri
		if (data.success) {
			$.each(data.data, function (index, value) {
				reg.id = value.id
				reg.base_64 = uri+value.nome
				reg.nome =value.nome

				let html = card_painel(reg)
				$('#imagens_painel').append(html);
	
			});
		} else {
			console.log('erro')
		}
	}
});
