function getAllServer(aprovada = -1){ 
	$.ajax({
		url: `fotos/${aprovada}`,
		type: 'GET',
		dataType: 'json',
		success: function (data) {
			let reg=[]
			uri = data.uri
			if (data.success) {
				$.each(data.data, function (index, value) {
					reg.id = value.id
					reg.base_64 = uri+value.nome
					reg.nome =value.nome
					let btns = `<a class="btn-floating halfway-fab waves-effect waves-light white" onclick="aprova(${value.id}, 1)">
								<i class="material-icons ico_blue">check</i>
								</a>
								<a class="btn-floating halfway-fab waves-effect waves-light white left" onclick="aprova(${value.id}, 0)">
								<i class="material-icons ico_red">close</i>
								</a>`
								
					let html = card_painel(reg, btns)
					
					$('#imagens_painel').append(html);
		
				});
				$('.materialboxed').materialbox();
			} else {
				console.log('erro')
			}
		}
	});
}
getAllServer()