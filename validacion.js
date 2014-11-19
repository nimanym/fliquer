

function esLetrasyNumeros(texto)
{
	var letrasynumeros = /^[0-9A-Za-z]+$/;
	if(texto.match(letrasynumeros)) return true;
	else return false;
}

function esLetrasyNumerosSub(texto)
{
	var letrasynumerossub = /^[A-Za-z0-9_]+$/;
	if(texto.match(letrasynumerossub)) return true;
	else return false;
}

function contieneMayMinNum(texto)
{
	var pass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,15}$/;  
	if(texto.match(pass)) return true;
	else return false;
}

function esLongitud(texto, min, max)
{
	if (texto.length < min || texto.length > max ) return false;
	else return true;
}

function esEmail(texto)
{
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(texto)) return (true)  
	else return (false)  
}


function esEspacios(texto)
{
	if(texto.replace(/\s/g,'')=="") return true;
	else return false;
}


