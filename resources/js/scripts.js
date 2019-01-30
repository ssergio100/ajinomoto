function card(reg) {
	html = `<div class="col s12 m4" id="card_${reg.id}">
                <div class="card">
                    <div class="card-image">
                        <img src="${reg.base_64}">
                        <a class="btn-floating halfway-fab waves-effect waves-light white" onclick="removeFoto(${reg.id})">
                        <i class="material-icons" style="color:red">delete</i></a>
                    </div>
                    <div class="card-content">
                        <p> ${reg.nome}</p>
                    </div>
                      <div class="progress" id="bar_${reg.id}" style="display:none">
                        <div  class="determinate" ></div>
                    </div>
                </div>
            </div>`
	return html
}

function sincroniza() {

	var formData = new FormData();
	server.fotos.query().filter('sinc', 0).execute().done(function (r) {
		if (!r.length) return // se não tem nenhuma foto,  faz nada
		let id = r[0].id
		let nome = r[0].nome
		let base_64 = r[0].base_64

		formData.append('foto', base_64)
		formData.append('nome', nome)

		var url = 'sincronia/index';
		$('#bar_' + id).css('display', 'block')
		$.ajax({
			url: url,
			type: 'POST',
			data: formData,
			dataType: 'json',
			success: function (data) {
				if (data.success) {
					console.log('successo')
					server.fotos.remove(id).done(function () {
						$('#card_' + id).css('display', 'none')
						sincroniza()
					})
				} else {
					console.log('erro')
					$('#card_' + id).fadeOut()
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