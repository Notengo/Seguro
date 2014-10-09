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

function guardarDatos() {
    if (document.getElementById("guardar").value === "Nuevo") {
        document.getElementById('nuevo').style.display = 'initial';
        document.getElementById('razonSocial').focus();
        document.getElementById("guardar").value = "Guardar";
        document.getElementById("cancelar").className = "btn btn-large btn-block btn-primary";
        return true;
    }

    var razonSocial_hidden = '';
    if (document.getElementById("guardar").value === "Eliminar" || document.getElementById("guardar").value === "Actualizar") {
        razonSocial_hidden = document.getElementById('razonSocial_hidden').value;
    }
    if (document.getElementById("guardar").value === "Aceptar") {
        location.reload();
        return false;
    } else {
        var accion = document.getElementById("guardar").value;
    }

    var razonSocial = document.getElementById('razonSocial').value,
            divResultado = document.getElementById('divResultado'),
            nroproductor = document.getElementById('nroproductor').value,
            cuit = document.getElementById('cuit').value,
            calle = document.getElementById('calle').value,
            nro = document.getElementById('nro').value,
            piso = document.getElementById('piso').value,
            dpto = document.getElementById('dpto').value,
            cp = document.getElementById('cp').value,
            telefono = document.getElementById('telefono').value,
            email = document.getElementById('email').value,
            pagina = document.getElementById('pagina').value;

    ajax = objetoAjax();
    ajax.open("POST", "guardarCompania.php", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
        } else if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
            document.getElementById("guardar").value = "Aceptar";
        }
    };
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    ajax.send("razonSocial=" + razonSocial + "&accion=" + accion
            + "&nroproductor=" + nroproductor + "&cuit=" + cuit
            + "&calle=" + calle + "&nro=" + nro
            + "&piso=" + piso + "&dpto=" + dpto
            + "&cp=" + cp + "&telefono=" + telefono + "&email=" + email
            + "&pagina=" + pagina + "&razonSocial_hidden=" + razonSocial_hidden);
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
    ajax.onreadystatechange = function() {
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
    ajax.onreadystatechange = function() {
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
    ajax.onreadystatechange = function() {
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

//function guardarVehiculo(){
//    if(document.getElementById("guardar").value === "Nuevo"){
//        document.getElementById('nuevo').style.display = 'initial';
//        document.getElementById('marca').focus();
//        document.getElementById("guardar").value = "Guardar";
//        document.getElementById("cancelar").className = "btn btn-large btn-block btn-primary";
//        document.getElementById("cliente").focus();
//        
//        return true;
//    }
//    
//    guardarVehiculos();
//return false;
//    var idmodelo = '';
//    if(document.getElementById("guardar").value === "Eliminar" || document.getElementById("guardar").value === "Actualizar"){
//        idmodelo = document.getElementById('modelo_hidden').value;
//    }
//    if(document.getElementById("guardar").value === "Aceptar"){
//        location.reload();
//        return false;
//    } else {
//        var accion = document.getElementById("guardar").value;
//    }
//    
//return false;
//    var idmarca = document.getElementById('marca').value;
//    var modelo = document.getElementById('modelo').value;
//    var divResultado = document.getElementById('divResultado');
//
//    ajax=objetoAjax();
//    ajax.open("POST", "guardarModelo.php" ,true);
//    ajax.onreadystatechange=function() {
//        if (ajax.readyState === 1) {
////            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
//        } else if (ajax.readyState === 4) {
//            divResultado.innerHTML = ajax.responseText;
//            document.getElementById("guardar").value = "Aceptar";
//        }
//    };
//    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
//    
//    ajax.send("modelo="+modelo+"&accion="+accion
//            +"&idmarca="+idmarca+"&idmodelo="+idmodelo);
//}

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
        document.getElementById("guardar").value = "Eliminar";
        document.getElementById("guardar").className = "btn btn-large btn-block btn-danger";
        document.getElementById("cancelar").style.display = 'initial';
    }
    if (accion === 'e') {
        document.getElementById("guardar").value = "Actualizar";
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

        return true;
    }
    var idclientes = document.getElementById('cliente_hidden').value;
    var patente = document.getElementById('patente').value;
    var motor = document.getElementById('motor').value;
    var chasis = document.getElementById('chasis').value;
    var fabricacion = document.getElementById('fabricacion').value;
    var idmarcas = document.getElementById('marca_hidden').value;
    var idmodelos = document.getElementById('modelo_hidden').value;
    var version = document.getElementById('version').value;
    var idtipos = document.getElementById('tipo_hidden').value;
    var idusos = document.getElementById('uso_hidden').value;
    var naftero = 'N';
    if (document.getElementById('nafteroSi').checked) {
        naftero = 'S';
    }

    var valor = document.getElementById('valor').value;
    var vehiculo = "idclientes=" + idclientes + "&patente=" + patente
            + "&motor=" + motor + "&chasis=" + chasis
            + "&fabricacion=" + fabricacion + "&idmarcas=" + idmarcas
            + "&idmodelos=" + idmodelos + "&version=" + version
            + "&idtipos=" + idtipos + "&idusos=" + idusos
            + "&naftero=" + naftero + "&valor=" + valor;

    var gnc = "";

//    if(gnc === 'Si'){document.vehiculo.gnc[0].checked
    if (document.getElementById('gncSi').checked) {
        var regulador = document.getElementById('regulador').value;
        var marcaReg = document.getElementById('marcaReg').value;
//        var cantidadC = document.getElementById('cantidadC').value;
        var marcaC1 = document.getElementById('marcaC1').value;
        var marcaC2 = document.getElementById('marcaC2').value;
        var marcaC3 = document.getElementById('marcaC3').value;
        var numeroC1 = document.getElementById('numeroC1').value;
        var numeroC2 = document.getElementById('numeroC2').value;
        var numeroC3 = document.getElementById('numeroC3').value;
        gnc = "&regulador=" + regulador + "&marcaReg=" + marcaReg
//        +"&cantidadC="+cantidadC
                + "&gnc=Si" + "&marcaC1=" + marcaC1
                + "&marcaC2=" + marcaC2 + "&marcaC3=" + marcaC3
                + "&numeroC1=" + numeroC1 + "&numeroC2=" + numeroC2
                + "&numeroC3=" + numeroC3;
    } else {
        gnc = "&gnc=No";
    }
    var archivo = new Array();

//    var archivo = document.getElementById('archivo1');
//    archivo = archivo.files[0];

    archivo[1] = document.getElementById('archivo1');
    archivo[1] = archivo[1].files[0];
    archivo[2] = document.getElementById('archivo2');
    archivo[2] = archivo[2].files[0];
    archivo[3] = document.getElementById('archivo3');
    archivo[3] = archivo[3].files[0];
    archivo[4] = document.getElementById('archivo4');
    archivo[4] = archivo[4].files[0];

    var divResultado = document.getElementById('divResultado');
    var accion = document.getElementById("guardar").value;
    var id = '';
    /* Inicio Almacenamiento del vehiculo. */
    ajax = objetoAjax();
    ajax.open("POST", "guardarVehiculo.php", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 1) {
            divResultado.innerHTML = '<center><img src="../images/cargando.gif"><br/>Guardando los datos...</center>';
        } else if (ajax.readyState === 4) {
            //mostrar los nuevos registros en esta capa
            divResultado.innerHTML = ajax.responseText;
            id = document.getElementById('idV').value;

            /* Grabacion imagen vehiculo*/
            var limit = 1048576 * 2, xhr;
            console.log(limit);
            var xhr = new Array;
            for (var i = 1; i <= 4; i++) {
                if (archivo[i]) {
                    if (archivo[i].size < limit) {
                        xhr[i] = new XMLHttpRequest();
                        xhr[i].upload.addEventListener('load', function(e) {
//                            divResultado.innerHTML = "Tinchoooooo<h1>Grabo Un Error</h1>";
//                            alert('subirArchivo.php?id='+id+'&numero='+i);
                        }, false);
                        xhr[i].upload.addEventListener('error', function(e) {
                            divResultado.innerHTML = "<h1>Ocurrio Un Error</h1>";
                        }, false);
                        xhr[i].open('POST', 'subirArchivo.php?id=' + id + '&numero=' + i);
                        xhr[i].setRequestHeader("Cache-Control", "no-cache");
                        xhr[i].setRequestHeader("X-Requested-With", "XMLHttpRequest");
                        xhr[i].setRequestHeader("X-File-Name", archivo[i].name);
                        xhr[i].send(archivo[i]);
                    } else {
                        alert('El archivo es mayor que 2MB!');
                    }
                }
            }
        }
    };
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send(vehiculo + gnc + "&accion=" + accion);
    /* Fin Almacenamiento del vehiculo. */
    return true;
}
;

function verVehiculo(idvehiculo, accion) {
    var divResultado = document.getElementById('divResultado');
    cambio(accion);

    ajax = objetoAjax();
    ajax.open("POST", "buscarVehiculo.php", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
        } else if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
            window.scroll(0, 0);

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
            }
            if (document.getElementById('v18').alt !== 'no') {
                document.getElementById('img2').src = document.getElementById('v18').src;
                document.getElementById('img2').style.display = 'initial';
            }
            if (document.getElementById('v19').alt !== 'no') {
                document.getElementById('img3').src = document.getElementById('v19').src;
                document.getElementById('img3').style.display = 'initial';
            }
            if (document.getElementById('v20').alt !== 'no') {
                document.getElementById('img4').src = document.getElementById('v20').src;
                document.getElementById('img4').style.display = 'initial';
            }
        }
    };
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("idvehiculo=" + idvehiculo);
}