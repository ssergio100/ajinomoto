
// LOJAS

obj = {}
arr = []
$.ajax({
	type: "get",
	url: "lojas",
	dataType: "json",
	beforeSend: function() {
     $('body').html('<b>Sincronizando...</b>')
	},
	success: function (data) {
		total_lojas = data.data.length
		console.log(total_lojas);
		$.each(data.data, function (index, value) {
		
			obj = {id:value.id,razao_social:value.razao_social,cnpj:value.cnpj}
			console.log(value)
			if (getLojaByCnpj('cnpj', value.cnpj) < 0) 
			addLoja(obj)
		})
		window.location.replace('home');
	},
	done:function() { 
		window.location.replace('home');
	}
	
});

function addLoja(obj) {
	console.log(obj)
	server.lojas.add(obj).done(function (item) {
		console.log(obj)
	});
}

function getLojaByCnpj(campo, valor) {
	server.lojas.query().filter(campo, valor).execute().done(function (r) {
		return r.length;
	});
}
