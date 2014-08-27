function objetoAjax(){
    var xmlhttp=false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch(e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch(E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest !== 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function altaModal(item){
    var abrir = '';
    if (item === 1){
        document.getElementById('myModalLabel').innerHTML = 'Alta de Marca';
        abrir = 'modalMarca.php';
    }
    if (item === 2){
        document.getElementById('myModalLabel').innerHTML = 'Alta de Modelo';
        abrir = 'modalModelo.php';
    }
    if (item === 3){
        document.getElementById('myModalLabel').innerHTML = 'Alta de Tipo de Veh&iacute;culo';
        abrir = 'modalTipo.php';
    }
    if (item === 4){
        document.getElementById('myModalLabel').innerHTML = 'Alta de Tipo de Usos';
        abrir = 'modalUso.php';
    }
    var divResultado = document.getElementById('cuerpoModal');
    ajax=objetoAjax();
    ajax.open("POST", abrir ,true);
    ajax.onreadystatechange=function() {
        if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
        } else if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
        }
    };
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send();
}