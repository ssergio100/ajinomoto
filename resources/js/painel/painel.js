function getAllServer(aprovada = -1){ 
	$.ajax({
		url: `fotos/${aprovada}`,
		type: 'GET',
		dataType: 'json',
		success: function (data) {
			let reg=[]
	
			if (data.success) { console.log(data);
				$.each(data.data, function (index, value) {
					reg.id = value.id
					reg.base_64 = data.url+value.imagem_path+value.nome_md5+'_thumb.'+value.ext

					reg.nome =value.nome
					let btns = `<a class="btn-floating halfway-fab waves-effect waves-light white" onclick="aprovar(${value.id}, 1)">
								<i class="material-icons ico_blue">check</i>
								</a>
								<a class="btn-floating halfway-fab waves-effect waves-light white left" onclick="aprovar(${value.id}, 0)">
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

function aprovar(id_foto, status) {
	$.ajax({
		type: "post",
		url: "aprovar",
		data: {id_foto:id_foto,status:status},
		dataType: "json",
		success: function (data) {
			if(data.success) {
				$('#card_'+id_foto).fadeOut(1000)
			}
		}
	});
}
getAllServer()