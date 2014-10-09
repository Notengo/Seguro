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

    if (document.getElementById("guardar").value === "Eliminar"
            || document.getElementById("guardar").value === "Actualizar") {
        idmarca = document.getElementById('marca_hidden').value;
    }
    if (document.getElementById("guardar").value === "Aceptar") {
        location.href = '../poliza';
        return false;
    } else {
        var accion = document.getElementById("guardar").value;
    }

    var nropoliza = document.getElementById('poliza').value,
            idcompanias = document.getElementById('compania').value,
            idclientes = document.getElementById('cliente_hidden').value,
            patente = document.getElementById('patente').value,
            idcoberturas = document.getElementById('cobertura').value,
            idotrosriesgos = document.getElementById('otroRiesgo').value,
            vigenciadesde = document.getElementById('desde').value,
            vigenciahasta = document.getElementById('hasta').value,
            segvencimiento = document.getElementById('vencimiento2').value,
            premio = document.getElementById('premio').value,
            prima = document.getElementById('prima').value,
            cuotas = document.getElementById('cuota').value,
            idformaspago = document.getElementById('formapago').value,
            cbu = document.getElementById('cbu').value,
            divResultado = document.getElementById('divResultado');

    ajax = objetoAjax();
    ajax.open("POST", "guardarPoliza.php", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
        } else if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
            document.getElementById("guardar").value = "Aceptar";
        }
    };
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("nropoliza=" + nropoliza + "&idcompanias=" + idcompanias
            + "&idclientes=" + idclientes + "&patente=" + patente
            + "&idcoberturas=" + idcoberturas + "&idotrosriesgos=" + idotrosriesgos
            + "&vigenciadesde=" + vigenciadesde + "&vigenciahasta=" + vigenciahasta
            + "&segvencimiento=" + segvencimiento + "&premio=" + premio
            + "&prima=" + prima + "&cuotas=" + cuotas
            + "&idformaspago=" + idformaspago + "&cbu=" + cbu
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