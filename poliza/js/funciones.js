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
    if (document.getElementById("guardar").value === "Guardar" || document.getElementById("guardar").value === "Renovar" || document.getElementById("guardar").value === "Actualizar") {
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
            document.getElementById('observacion').value = document.getElementById('p14').value;
            window.scroll(0, 0);
        }
    };
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("nropoliza=" + nropoliza);
}

function filtrar() {
    var filtro = document.getElementById('filtro').value;
    var divResultado = document.getElementById('listadoPoliza');
    ajax = objetoAjax();
    ajax.open("POST", "listadoPoliza.php", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
        } else if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
        }
    };
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("filtro=" + filtro);
}

function fechaInvertir(fecha) {
//    fecha = document.getElementById(fecha);
    if (fecha.indexOf('/') > 0) {
        var dia = parseInt(fecha.substring(0, 2), 10);
        var mes = parseInt(fecha.substring(3, 5), 10);
        var anio = parseInt(fecha.substring(6), 10);
        if (dia < 10)
            dia = '0' + dia;
        if (mes < 10)
            mes = '0' + mes;
        return anio + "-" + mes + "-" + dia;
    }
    if (fecha.indexOf('-') > 0) {
        var anio = parseInt(fecha.substring(0, 4), 10);
        var mes = parseInt(fecha.substring(5, 8), 10);
        var dia = parseInt(fecha.substring(9), 10);
        if (dia < 10)
            dia = '0' + dia;
        if (mes < 10)
            mes = '0' + mes;
        return dia + "/" + mes + "/" + anio;
    }
}
function soloFecha(evt) {
    //asignamos el valor de la tecla a keynum
    if (window.event) {// IE
        keynum = evt.keyCode;
    } else { // otro navegador
        keynum = evt.which;
    }
    if ((keynum > 47 && keynum < 58) || (keynum == 0) || (keynum == 13) || (keynum == 8) || (keynum == 47)) {
        return true;
    } else {
        return false;
    }
}

function fechaControl(valor, evento) {
    var valor1 = document.getElementById(valor);
    if (window.event) {// IE
        keynum = evento.keyCode;
    } else { // otro navegador
        keynum = evento.which;
    }

    if (keynum === 8 && valor1.value.length === 2) {
        valor1.value = valor1.value.substring(0, 1);
        return true;
    }

    if (keynum === 8 && valor1.value.length === 5) {
        valor1.value = valor1.value.substring(0, 4);
        return true;
    }

    if (valor1.value.length === 2 || valor1.value.length === 5) {
        valor1.value = valor1.value + "/";
    }
    ;
}
function validarFecha(fecha) {
    if (fecha != undefined && fecha.value != "") {
        if (!/^\d{2}\/\d{2}\/\d{4}$/.test(fecha.value)) {
            fecha.style.borderColor = 'brown';
            fecha.focus();
            return false;
        }
        var dia = parseInt(fecha.value.substring(0, 2), 10);
        var mes = parseInt(fecha.value.substring(3, 5), 10);
        var anio = parseInt(fecha.value.substring(6), 10);
        switch (mes) {
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                numDias = 31;
                break;
            case 4:
            case 6:
            case 9:
            case 11:
                numDias = 30;
                break;
            case 2:
                if (comprobarSiBisisesto(anio)) {
                    numDias = 29
                } else {
                    numDias = 28
                }
                ;
                break;
            default:
                fecha.focus();
                fecha.style.borderColor = 'brown';
                return false;
        }

        if (dia > numDias || dia == 0) {
            fecha.focus();
            fecha.style.borderColor = 'brown';
            return false;
        }
        fecha.style.borderColor = '';
//        validaMayorQue(fecha, anio, mes, dia);
        return true;
    }
}