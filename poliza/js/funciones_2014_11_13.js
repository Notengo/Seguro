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
        document.getElementById('poliza').focus();
        document.getElementById("guardar").value = "Guardar";
        document.getElementById("cancelar").className = "btn btn-large btn-block btn-primary";
        return true;
    }

    var nropoliza = document.getElementById('poliza').value,
            divResultado = document.getElementById('divResultado');

    if (document.getElementById("guardar").value === "Aceptar") {
        location.reload();
//        location.href = '../poliza';
        return false;
    } else {
        var accion = document.getElementById("guardar").value;
    }
    var datos = '';
    if (document.getElementById("guardar").value === "Guardar" || document.getElementById("guardar").value === "Renovar") {
        var idcompanias = document.getElementById('compania').value,
                idclientes = document.getElementById('cliente_hidden').value,
                patente = document.getElementById('patente').value,
                idvehiculo = document.getElementById('patente_hidden').value,
                idcoberturas = document.getElementById('cobertura').value,
                idotrosriesgos = document.getElementById('otroRiesgo').value,
                vigenciadesde = document.getElementById('desde').value,
                vigenciahasta = document.getElementById('hasta').value,
                segvencimiento = document.getElementById('vencimiento2').value,
                premio = document.getElementById('premio').value,
                prima = document.getElementById('prima').value,
                cuotas = document.getElementById('cuota').value,
                idformaspago = document.getElementById('formapago').value,
                observacion = document.getElementById('observacion').value,
                cbu = document.getElementById('cbu').value;
        datos = "&idcompanias=" + idcompanias
                + "&idclientes=" + idclientes + "&patente=" + patente
                + "&idcoberturas=" + idcoberturas + "&idotrosriesgos=" + idotrosriesgos
                + "&vigenciadesde=" + vigenciadesde + "&vigenciahasta=" + vigenciahasta
                + "&segvencimiento=" + segvencimiento + "&premio=" + premio
                + "&prima=" + prima + "&cuotas=" + cuotas
                + "&idformaspago=" + idformaspago + "&cbu=" + cbu
                + "&idvehiculo=" + idvehiculo + "&observacion=" + observacion;
    }
    ajax = objetoAjax();
    ajax.open("POST", "guardarPoliza.php", true);
    ajax.onreadystatechange = function() {
//        if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
//        } else 
        if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
            document.getElementById("guardar").className = "btn btn-large btn-block btn-primary";
            document.getElementById("guardar").value = "Aceptar";
        }
    };
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("nropoliza=" + nropoliza + datos
            + "&accion=" + accion);
}

function guardarCuotas() {
    if (document.getElementById("guardar").value === "Nuevo") {
        document.getElementById('nuevo').style.display = 'initial';
        document.getElementById("guardar").value = "Guardar";
        document.getElementById("cancelar").className = "btn btn-large btn-block btn-primary";
        document.getElementById('poliza').focus();
        return true;
    }

//    if(document.getElementById("guardar").value === "Cancelar" || document.getElementById("guardar").value === "Aceptar"){
    var cliente = '';
    if (document.getElementById("guardar").value === "Eliminar" || document.getElementById("guardar").value === "Actualizar") {
        cliente = document.getElementById('cliente').value;
    }
    if (document.getElementById("guardar").value === "Aceptar") {
        location.reload();
        return false;
    } else {
        var accion = document.getElementById("guardar").value;
    }

    var poliza = document.getElementById('poliza').value,
            cuotas = document.getElementById('cuotas').value,
            monto = document.getElementById('monto').value,
            ven1 = document.getElementById('vencimiento1').value,
            ven2 = document.getElementById('vencimiento2').value,
            pagada = document.getElementById('pagada').value,
            fechapago = document.getElementById('fechapago').value;
    var divResultado = document.getElementById('divResultado');
    ajax = objetoAjax();
    ajax.open("POST", "guardarCuota.php", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
        } else if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
            document.getElementById("guardar").value = "Aceptar";
        }
    };
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("poliza=" + poliza + "&cuotas=" + cuotas
            + "&monto=" + monto + "&ven1=" + ven1
            + "&ven2=" + ven2 + "&pagada=" + pagada
            + "&fechapago=" + fechapago);
}

function editarPoliza(nropoliza, opcion) {
    document.getElementById('nuevo').style.display = 'initial';
    if (opcion === 'b') {
        document.getElementById("guardar").value = "Eliminar";
        document.getElementById("guardar").className = "btn btn-large btn-block btn-danger";
        document.getElementById("cancelar").style.display = 'initial';
    }
    if (opcion === 'e') {
        document.getElementById("guardar").value = "Actualizar";
        document.getElementById("guardar").className = "btn btn-large btn-block btn-primary";
        document.getElementById("cancelar").style.display = 'initial';
    }
    if (opcion === 'r') {
        document.getElementById("guardar").value = "Renovar";
        document.getElementById("guardar").className = "btn btn-large btn-block btn-primary";
        document.getElementById("cancelar").style.display = 'initial';
    }

    var divResultado = document.getElementById('divResultado');
    ajax = objetoAjax();
    ajax.open("POST", "buscarDatos.php", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 1) {
            divResultado.innerHTML = 'Buscando datos ...';
        } else if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
//            document.getElementById("guardar").value = "Aceptar";
            document.getElementById('poliza').value = nropoliza;
            if (opcion === 'r') {
                document.getElementById('poliza').value = '';
            }
            document.getElementById('compania').value = document.getElementById('p01').value;
            document.getElementById('cliente_hidden').value = document.getElementById('p02').value;
            document.getElementById('patente').value = document.getElementById('p03').value;
            document.getElementById('cobertura').value = document.getElementById('p04').value;
            document.getElementById('otroRiesgo').value = document.getElementById('p05').value;
            document.getElementById('desde').value = document.getElementById('p06').value;
            document.getElementById('hasta').value = document.getElementById('p07').value;
            document.getElementById('vencimiento2').value = document.getElementById('p08').value;
            document.getElementById('premio').value = document.getElementById('p09').value;
            document.getElementById('prima').value = document.getElementById('p10').value;
            document.getElementById('cuota').value = document.getElementById('p11').value;
            document.getElementById('formapago').value = document.getElementById('p12').value;
            document.getElementById('cbu').value = document.getElementById('p13').value;
            window.scroll(0, 0);
        }
    };
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("nropoliza=" + nropoliza);
}