function objetoAjax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest !== 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function altaModal(item) {
    document.getElementById("botonModal").className = "btn btn-primary";
    var abrir = '';
    if (item === 1) {
        document.getElementById('myModalLabel').innerHTML = 'Alta de Marca';
        abrir = 'modalMarca.php';
    }
    if (item === 2) {
        document.getElementById('myModalLabel').innerHTML = 'Alta de Modelo';
        abrir = 'modalModelo.php';
    }
    if (item === 3) {
        document.getElementById('myModalLabel').innerHTML = 'Alta de Tipo de Veh&iacute;culo';
        abrir = 'modalTipo.php';
    }
    if (item === 4) {
        document.getElementById('myModalLabel').innerHTML = 'Alta de Tipo de Usos';
        abrir = 'modalUso.php';
    }
    document.getElementById('guardarModal').value = item;
    var divResultado = document.getElementById('cuerpoModal');
    ajax = objetoAjax();
    ajax.open("POST", abrir, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
        } else if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
        }
    };
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send();
}

function guardarModal() {
    var item = document.getElementById('item').value;
    if (item === '1') {
        var marca = document.getElementById('marca_modal').value;
        var divResultado = document.getElementById('divResultadoModal');
        ajax = objetoAjax();
        ajax.open("POST", "guardarMarca.php", true);
        ajax.onreadystatechange = function() {
            if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
            } else if (ajax.readyState === 4) {
                divResultado.innerHTML = ajax.responseText;
                document.getElementById("botonModal").className = "btn btn-primary oculto";
            }
        };
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.send("marca=" + marca + "&accion=Guardar");
    }
    if (item === '2') {
        var modelo = document.getElementById('modelo_modal').value;
        var idmarca = document.getElementById('marca_modal').value;
        var divResultado = document.getElementById('divResultadoModal');
        ajax = objetoAjax();
        ajax.open("POST", "guardarModelo.php", true);
        ajax.onreadystatechange = function() {
            if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
            } else if (ajax.readyState === 4) {
                divResultado.innerHTML = ajax.responseText;
                document.getElementById("botonModal").className = "btn btn-primary oculto";
            }
        };
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.send("modelo= " + modelo + "&idmarca= " + idmarca + "&accion=Guardar");
    }
}