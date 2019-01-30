

	db.open({
		server: 'ajinomoto',
		version: 4,
		schema: {
			fotos: {
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

	$('.sidenav').sidenav();
	$('.fixed-action-btn').floatingActionButton();

	// let tela = $(document).width();
	// $('.fixed-action-btn').css('right',tela/2.3+'px')


// $( window ).resize(function() {
//    let tela = $(document).width();
//     $('.fixed-action-btn').css('right',tela/2+'px')
// });

function addFoto(nome, base_64) {
	server.fotos.add({
		nome: nome,
		base_64: base_64,
		sinc: 0
	}).done(function (item) {
		getLastFoto()
	});
}

function toast() {
	M.toast({
		html: localStorage.lastMessage
	})
	localStorage.setItem('lastMessage', '')
}

function removeFoto(id) {
	toastHTML = '<span>Foto Removida</span><button class="btn-flat toast-action" onclick="undoFoto()">Desfazer</button>'
	regFoto('id', id)
	server.fotos.remove(id).done(function (key) {
		M.toast({
			html: toastHTML
		})
		$('#card_' + id).fadeOut()
	});
}

function getLastFoto() {
	server.fotos.query().filter().execute().done(function (r) {
		let reg = r[r.length - 1]
		let html = card(reg)
		$('#imagens').append(html);
	});
}

function regFoto(campo, valor) {
	server.fotos.query().filter(campo, valor).execute().done(function (r) {
		localStorage.setItem('nome', r[0].nome)
		localStorage.setItem('base_64', r[0].base_64)
	});
}


function undoFoto() {
	if (typeof (localStorage.getItem('nome')) == "undefined" && typeof (localStorage.getItem('base_64')) == "undefined") return
	addFoto(localStorage.getItem('nome'), localStorage.getItem('base_64'))
	toastHTML = '<span>Foto Removida</span><button class="btn-flat toast-action">Fechar</button>'
	localStorage.removeItem('lastMessage')
	localStorage.removeItem('nome')
	localStorage.removeItem('base_64')
	toast()

}

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

function getAll() {

	server.fotos.query().filter().execute().done(function (r) {
		$('#imagens').html('')
		$.each(r, function (index, value) {
			let html = card(value)
			$('#imagens').append(html);

		});
	});
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

function encodeImageFileAsURL(element) {
	var file = element.files[0];
	var reader = new FileReader();
	reader.onloadend = function () {
		addFoto(file.name, reader.result)
		localStorage.setItem('lastMessage', 'Foto adicionada')
		toast()

	}
	reader.readAsDataURL(file);
}


function callFile() {
	$('#btn_file').click()
}
