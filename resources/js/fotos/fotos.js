function addFoto(nome, base_64) {
	server.fotos.add({
		nome: nome,
		base_64: base_64,
		erro: ''
	}).done(function (item) {
		getLastFoto()
	});
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
		let btns = `<a class="btn-floating halfway-fab waves-effect waves-light white" onclick="removeFoto(${reg.id})">
		<i class="material-icons ico_red">delete</i>
		</a>`
		let html = card_painel(reg, btns)
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
