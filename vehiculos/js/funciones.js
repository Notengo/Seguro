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

function soloNumeros(evt) {
    if (window.event) {// IE
        keynum = evt.keyCode;
    } else { // otro navegador
        keynum = evt.which;
    }
    if ((keynum > 47 && keynum < 58) || (keynum == 0) || (keynum == 13) || (keynum == 8) || (keynum == 46)) {
        return true;
    } else {
        return false;
    }
}

function guardarDato() {
    if (document.getElementById("guardar").value === "Nuevo") {
        document.getElementById('nuevo').style.display = 'initial';
        document.getElementById('marca').focus();
        document.getElementById("guardar").value = "Guardar";
        document.getElementById("cancelar").className = "btn btn-large btn-block btn-primary";
        return true;
    }
    var idmarca = '';
    if (document.getElementById("guardar").value === "Eliminar" || document.getElementById("guardar").value === "Actualizar") {
        idmarca = document.getElementById('marca_hidden').value;
    }
    if (document.getElementById("guardar").value === "Aceptar") {
        location.reload();
        return false;
    } else {
        var accion = document.getElementById("guardar").value;
    }

    var marca = document.getElementById('marca').value;
    var divResultado = document.getElementById('divResultado');

    ajax = objetoAjax();
    ajax.open("POST", "guardarMarca.php", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
        } else if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
            document.getElementById("guardar").value = "Aceptar";
        }
    };
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("marca=" + marca + "&accion=" + accion + "&idmarca=" + idmarca);
}

function guardarUso() {
    if (document.getElementById("guardar").value === "Nuevo") {
        document.getElementById('nuevo').style.display = 'initial';
        document.getElementById('uso').focus();
        document.getElementById("guardar").value = "Guardar";
        document.getElementById("cancelar").className = "btn btn-large btn-block btn-primary";
        return true;
    }
    var iduso = '';
    if (document.getElementById("guardar").value === "Eliminar" || document.getElementById("guardar").value === "Actualizar") {
        iduso = document.getElementById('uso_hidden').value;
    }
    if (document.getElementById("guardar").value === "Aceptar") {
        location.reload();
        return false;
    } else {
        var accion = document.getElementById("guardar").value;
    }

    var uso = document.getElementById('uso').value;
    var divResultado = document.getElementById('divResultado');

    ajax = objetoAjax();
    ajax.open("POST", "guardarUso.php", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
        } else if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
            document.getElementById("guardar").value = "Aceptar";
        }
    };
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("uso=" + uso + "&accion=" + accion + "&iduso=" + iduso);
}

function guardarTipo() {
    if (document.getElementById("guardar").value === "Nuevo") {
        document.getElementById('nuevo').style.display = 'initial';
        document.getElementById('tipo').focus();
        document.getElementById("guardar").value = "Guardar";
        document.getElementById("cancelar").className = "btn btn-large btn-block btn-primary";
        return true;
    }
    var idtipo = '';
    if (document.getElementById("guardar").value === "Eliminar" || document.getElementById("guardar").value === "Actualizar") {
        idtipo = document.getElementById('tipo_hidden').value;
    }
    if (document.getElementById("guardar").value === "Aceptar") {
        location.reload();
        return false;
    } else {
        var accion = document.getElementById("guardar").value;
    }

    var tipo = document.getElementById('tipo').value;
    var divResultado = document.getElementById('divResultado');

    ajax = objetoAjax();
    ajax.open("POST", "guardarTipo.php", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
        } else if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
            document.getElementById("guardar").value = "Aceptar";
        }
    };
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("tipo=" + tipo + "&accion=" + accion + "&idtipo=" + idtipo);
}

function guardarModelo() {
    if (document.getElementById("guardar").value === "Nuevo") {
        document.getElementById('nuevo').style.display = 'initial';
        document.getElementById('marca').focus();
        document.getElementById("guardar").value = "Guardar";
        document.getElementById("cancelar").className = "btn btn-large btn-block btn-primary";
        return true;
    }
    var idmodelo = '';
    if (document.getElementById("guardar").value === "Eliminar" || document.getElementById("guardar").value === "Actualizar") {
        idmodelo = document.getElementById('modelo_hidden').value;
    }
    if (document.getElementById("guardar").value === "Aceptar") {
        location.reload();
        return false;
    } else {
        var accion = document.getElementById("guardar").value;
    }

    var idmarca = document.getElementById('marca').value;
    var modelo = document.getElementById('modelo').value;
    var divResultado = document.getElementById('divResultado');

    ajax = objetoAjax();
    ajax.open("POST", "guardarModelo.php", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
        } else if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
            document.getElementById("guardar").value = "Aceptar";
        }
    };
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    ajax.send("modelo=" + modelo + "&accion=" + accion
            + "&idmarca=" + idmarca + "&idmodelo=" + idmodelo);
}

function ver(idmarca, accion, marca) {
    cambio(accion);
    document.getElementById("marca").value = marca;
    document.getElementById("marca_hidden").value = idmarca;
    window.scroll(0, 0);
}

function verUso(iduso, accion, uso) {
    cambio(accion);
    document.getElementById("uso").value = uso;
    document.getElementById("uso_hidden").value = iduso;
    window.scroll(0, 0);
}

function verTipo(idtipo, accion, tipo) {
    cambio(accion);
    document.getElementById("tipo").value = tipo;
    document.getElementById("tipo_hidden").value = idtipo;
    window.scroll(0, 0);
}

function verModelo(idmodelo, accion, modelo, idmarca) {
    cambio(accion);
    document.getElementById("marca").value = idmarca;
    document.getElementById("modelo_hidden").value = idmodelo;
    document.getElementById("modelo").value = modelo;
    window.scroll(0, 0);
}

function cambio(accion) {
    document.getElementById('nuevo').style.display = 'initial';
    if (accion === 'b') {
        document.getElementById("accion").value = "Eliminar";
        document.getElementById("guardar").value = "Eliminar";
        document.getElementById("guardar").className = "btn btn-large btn-block btn-danger";
        document.getElementById("cancelar").style.display = 'initial';
    }
    if (accion === 'e') {
        document.getElementById("guardar").value = "Actualizar";
        document.getElementById("accion").value = "Actualizar";
        document.getElementById("guardar").className = "btn btn-large btn-block btn-primary";
        document.getElementById("cancelar").style.display = 'initial';
    }
}
;

function gas() {
    if (document.getElementById('gas').style.display === 'none') {
        document.getElementById('gas').style.display = 'initial';
    } else {
        document.getElementById('gas').style.display = 'none';
    }
}
;

function guardarVehiculos() {
    if (document.getElementById("guardar").value === "Nuevo") {
        document.getElementById('nuevo').style.display = 'initial';
        document.getElementById('marca').focus();
        document.getElementById("guardar").value = "Guardar";
        document.getElementById("cancelar").className = "btn btn-large btn-block btn-primary";
        document.getElementById("cliente").focus();
        return false;
    }
    if (document.getElementById("guardar").value === "Guardar") {
        return true;
    }
}
;

function verVehiculo(idvehiculo, accion) {
    var divResultado = document.getElementById('divResultado');
    cambio(accion);

    ajax = objetoAjax();
    ajax.open("POST", "buscarVehiculo.php", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
        } else if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
            window.scroll(0, 0);

            document.getElementById('idV').value = idvehiculo;

            document.getElementById('cliente_hidden').value = document.getElementById('v02').value;
            document.getElementById('cliente').value = document.getElementById('v021').value;
            document.getElementById('patente').value = document.getElementById('v03').value;
            document.getElementById('motor').value = document.getElementById('v04').value;
            document.getElementById('chasis').value = document.getElementById('v05').value;
            document.getElementById('fabricacion').value = document.getElementById('v06').value;
            document.getElementById('marca_hidden').value = document.getElementById('v07').value;
            document.getElementById('marca').value = document.getElementById('v071').value;
            document.getElementById('modelo_hidden').value = document.getElementById('v08').value;
            document.getElementById('modelo').value = document.getElementById('v081').value;
            document.getElementById('version').value = document.getElementById('v09').value;
            document.getElementById('tipo_hidden').value = document.getElementById('v10').value;
            document.getElementById('tipo').value = document.getElementById('v101').value;
            document.getElementById('uso_hidden').value = document.getElementById('v11').value;
            document.getElementById('uso').value = document.getElementById('v111').value;
            if (document.getElementById('v12').value === 'S') {
                document.getElementById('nafteroSi').checked = true;
            } else {
                document.getElementById('nafteroNo').checked = true;
            }
            document.getElementById('valor').value = document.getElementById('v13').value;
            document.getElementById('img1').style.display = 'none';
            document.getElementById('img2').style.display = 'none';
            document.getElementById('img3').style.display = 'none';
            document.getElementById('img4').style.display = 'none';
            if (document.getElementById('v17').alt !== 'no') {
                document.getElementById('img1').src = document.getElementById('v17').src;
                document.getElementById('img1').style.display = 'initial';
                document.getElementById('vehiculo1').href = '../archivos/Vehiculo' + idvehiculo + '1.jpg';
            }
            if (document.getElementById('v18').alt !== 'no') {
                document.getElementById('img2').src = document.getElementById('v18').src;
                document.getElementById('img2').style.display = 'initial';
                document.getElementById('vehiculo2').href = '../archivos/Vehiculo' + idvehiculo + '2.jpg';
            }
            if (document.getElementById('v19').alt !== 'no') {
                document.getElementById('img3').src = document.getElementById('v19').src;
                document.getElementById('img3').style.display = 'initial';
                document.getElementById('vehiculo3').href = '../archivos/Vehiculo' + idvehiculo + '3.jpg';
            }
            if (document.getElementById('v20').alt !== 'no') {
                document.getElementById('img4').src = document.getElementById('v20').src;
                document.getElementById('img4').style.display = 'initial';
                document.getElementById('vehiculo4').href = '../archivos/Vehiculo' + idvehiculo + '4.jpg';
            }

            if (document.getElementById('v14').value !== '') {
                document.getElementById('regulador').value = document.getElementById('v15').value;
                document.getElementById('marcaReg').value = document.getElementById('v16').value;
                document.getElementById('gncSi').checked = true;
                document.getElementById('gas').style.display = 'initial';
            } else {
                document.getElementById('gncNo').checked = true;
                document.getElementById('regulador').value = "";
                document.getElementById('marcaReg').value = "";
                document.getElementById('gas').style.display = 'none';
            }
        }
    };
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("idvehiculo=" + idvehiculo);
}

function buscarPatente() {
    var divResultado = document.getElementById('divResultado'),
            patente = document.getElementById('patente').value;

    ajax = objetoAjax();
    ajax.open("POST", "buscarPatente.php", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
            if (document.getElementById('encontro').value === 'No') {
                return false;
            } else {
                alert('Patente duplicada.\nDebe ingresar una patente distinta.');
                return true;
            }
        }
    };
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("patente=" + patente);
}