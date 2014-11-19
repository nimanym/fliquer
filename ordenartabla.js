

function ordenarTabla(tabla, columna, lado) {
    var tb = tabla.tBodies[0], tr = Array.prototype.slice.call(tb.rows, 0), i; //Ignora el encabezado de la tabla, solo se ordena el contenido
    lado = -((+lado) || -1);       //Dependiendo de el orden, se invierte
    tr = tr.sort(       //ordena las tablas
                    function (a, b) {   //Esta funcion comprueba si se debe reordenar
                    return lado
                        * (a.cells[columna].textContent.trim().localeCompare(b.cells[columna].textContent.trim())
                           );
                    }
                );
    for(i = 0; i < tr.length; ++i) tb.appendChild(tr[i]);
}

function hacerOrdenable(table) {
    var th = table.tHead, i;
    th && (th = th.rows[0]) && (th = th.cells);  // Si la tabla tiene encabezado (head)
    if (th) i = th.length;
    else return;
    while (--i >= 0) (function (i) {        //Hacer que el head llame la funcion ordenarTabla al hacer click
        var dir = 1;
        th[i].addEventListener('click', function () {ordenarTabla(table, i, (dir = 1 - dir))});
    }(i));
}

function hacerTablasOrdenables(parent) {
    parent = parent || document.body;
    var t = parent.getElementsByTagName('table'), i = t.length; //Busca todas las tablas de la pagina
    while (--i >= 0) hacerOrdenable(t[i]);          //Y llama a hacerOrdenable para cada una
}

window.onload = function () {hacerTablasOrdenables();};     //Al cargar la pagina llama a la funcion que se encarga de hacer las tablas ordenables