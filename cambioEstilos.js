function setCookie(c_name, value, expiredays) {
	var exdate = new Date();
	exdate.setDate(exdate.getDate() + expiredays);
	document.cookie = c_name + "=" + value + ((expiredays == null) ? "" : ";expires="+ exdate.toGMTString());
}

function getCookie(c_name) {
	if(document.cookie.length > 0) {
		c_start = document.cookie.indexOf(c_name + "=");
		if(c_start != -1) {
			c_start = c_start + c_name.length + 1;
			c_end = document.cookie.indexOf(";", c_start);
			if(c_end == -1)
				c_end = document.cookie.length;
			return document.cookie.substring(c_start, c_end);
		}
	}
	return "";
}

function estilo() {
	var estiloSeleccionado = document.getElementById("selectorEstilo").value;

	var arrayLink = document.getElementsByTagName('link');
	for(var i = 0; i < arrayLink.length; i++) {
		// Sólo aquellas etiquetas link que hacen referencia a un estilo
		// y que no sea para impresión
		if(arrayLink[i].getAttribute('rel') != null &&
			arrayLink[i].getAttribute('rel').indexOf('stylesheet') != -1 &&
			arrayLink[i].getAttribute('media') != 'print') {
			// Si tiene título es un estilo preferido o alternativo,
			// si no tiene título es un estilo
			// predeterminado y siempre tiene que utilizarse
			if(arrayLink[i].getAttribute('title') != null && arrayLink[i].getAttribute('title').length > 0) {
				if(arrayLink[i].getAttribute('title') == estiloSeleccionado)
					arrayLink[i].disabled = false;
				else
					arrayLink[i].disabled = true;
			}
		}
	}

	setCookie('estilo', estiloSeleccionado, 365);
}


function estilo1(est) {
	//var estiloSeleccionado = document.getElementById("selectorEstilo").value;

	var estiloSeleccionado = est;

	var arrayLink = document.getElementsByTagName('link');
	for(var i = 0; i < arrayLink.length; i++) {
		// Sólo aquellas etiquetas link que hacen referencia a un estilo
		// y que no sea para impresión
		if(arrayLink[i].getAttribute('rel') != null &&
			arrayLink[i].getAttribute('rel').indexOf('stylesheet') != -1 &&
			arrayLink[i].getAttribute('media') != 'print') {
			// Si tiene título es un estilo preferido o alternativo,
			// si no tiene título es un estilo
			// predeterminado y siempre tiene que utilizarse
			if(arrayLink[i].getAttribute('title') != null && arrayLink[i].getAttribute('title').length > 0) {
				if(arrayLink[i].getAttribute('title') == estiloSeleccionado)
					arrayLink[i].disabled = false;
				else
					arrayLink[i].disabled = true;
			}
		}
	}

	setCookie('estilo', estiloSeleccionado, 365);
}


function cargaEstilo(){
	var varEstilo = getCookie('estilo');

	if(varEstilo != null && varEstilo != "") {
		estilo1(varEstilo);
		document.getElementById("selectorEstilo").value=varEstilo;
	}
}

