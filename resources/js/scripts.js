function toast() {
	M.toast({
		html: localStorage.lastMessage
	})
	localStorage.setItem('lastMessage', '')
}

function card_painel(reg, btns = null) {

	html = `<div class="col s12 m4" id="card_${reg.id}">
                <div class="card hoverable">
                    <div class="card-image">
                        <img src="${reg.base_64}" id="img_${reg.id}" class="responsive-img">
                        ${btns}
                    </div>
                    <div class="card-content">
					<span class="green-text truncate"> ${reg.nome}</span>
                    </div>
                      <div class="progress" id="bar_${reg.id}" style="display:none">
                        <div  class="determinate" ></div>
                    </div>
                </div>
            </div>`
	return html
}

function getAll() {

	server.fotos.query().filter().execute().done(function (r) {
		$('#imagens').html('')
		$.each(r, function (index, value) {
			let btns = `<a class="btn-floating halfway-fab waves-effect waves-light white" onclick="removeFoto(${value.id})">
			<i class="material-icons ico_red">delete</i>
			</a>`
			let html = card_painel(value, btns)
			$('#imagens').append(html);

		});
		$('.materialboxed').materialbox();
	});
}

db.open({
	server: 'ajinomoto',
	version: 4,
	schema: {
		fotos: {
			key: {
				keyPath: 'id',
				autoIncrement: true
			},
		},
		lojas: {
			key: {
				keyPath: 'id',
				autoIncrement: true
			},
		}
	}
}).done(function (s) {
	server = s
	getAll()
});



function sincronizaFotos() {

	var formData = new FormData();
	//server.fotos.query().filter('sinc', 0).execute().done(function (r) {
	server.fotos.query().filter().execute().done(function (r) {
		if (!r.length) {
			M.toast({
				html: 'Nada para sincronizar. Parabéns!'
			})
			return // se não tem nenhuma foto,  faz nada
		}
		let id = r[0].id
		let nome = r[0].nome
		let base_64 = r[0].base_64

		formData.append('foto', base_64)
		formData.append('nome', nome)

		var url = 'sincronia-fotos';
		$('#bar_' + id).css('display', 'block')
		$.ajax({
			url: url,
			type: 'POST',
			data: formData,
			dataType: 'json',
			beforeSend: function() {
	
			},
			success: function (data) {
				if (data.success) {
					$(`#card_${id} .material-icons` ).removeClass('ico_red')
					server.fotos.remove(id).done(function () {
						$(`#card_${id} .material-icons` ).html('done_all').addClass('ico_blue')
						$('#card_' + id).fadeOut('10000')
						sincroniza()
					})
				} else {
					$(`#card_${id} .material-icons` ).removeClass('ico_blue')
					if (data.erro == 1) {
						$(`#card_${id} .material-icons` ).html('sync_disabled').addClass('ico_red')
						$(`#card_${id} .card-content` ).html(`<p>${data.message}</p>`)
						$(`#card_${id} .progress` ).remove()
						server.fotos.remove(id).done(function () {
							sincroniza()
						})
					} else {
						// Ocorreu um problema não esperado na sincronização
						$(`#card_${id} .material-icons` ).html('sync_problem').addClass('ico_red')
						
					}
				}
			},
			cache: false,
			contentType: false,
			processData: false,
			xhr: function () { // Custom XMLHttpRequest
				var myXhr = $.ajaxSettings.xhr();
				if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
					myXhr.upload.addEventListener('progress', function (e) {
						var progress = (e.loaded / e.total) * 100
						var progress_ = progress.toFixed();
						$('#bar_' + id + ' .determinate').css('width', progress_ + '%')
					}, false);
				} else {
					alert('Sem suporte a propriedade upload!')
				}
				return myXhr;
			}
		});
	})
}


$(document).ready(function(){
	M.AutoInit();
})

