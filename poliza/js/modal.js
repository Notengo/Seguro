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
        document.getElementById('myModalLabel').innerHTML = 'Alta de Tipo de Cobertura';
        abrir = 'modalCobertura.php';
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
    if (item === '4') {
        var nombre = document.getElementById('nombre_modal').value,
                codigo = document.getElementById('codigo_modal').value,
                descripcion = document.getElementById('descripcion_modal').value,
                divResultado = document.getElementById('divResultadoModal');
        ajax = objetoAjax();
        ajax.open("POST", "guardarcobertura.php", true);
        ajax.onreadystatechange = function() {
            if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
            } else if (ajax.readyState === 4) {
                divResultado.innerHTML = ajax.responseText;
                refrescar4();
                document.getElementById("botonModal").className = "btn btn-primary oculto";
            }
        };
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.send("nombre=" + nombre
                + "&codigo=" + codigo
                + "&descripcion=" + descripcion
                + "&accion=Guardar");
    }
}

function refrescar4() {
    ajax = objetoAjax();
    ajax.open("POST", "selectCobertura.php", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4) {
            document.getElementById("divcobertura").innerHTML = ajax.responseText;
        }
    };
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send();
}