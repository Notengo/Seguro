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

function altaModal(nropoliza, nrocuota, monto, vencimiento1, vencimiento2) {
    document.getElementById("botonModal1").className = "btn btn-primary";

    document.getElementById('guardarModal').value = nrocuota;
    var divResultado = document.getElementById('cuerpoModal');
    ajax = objetoAjax();
    ajax.open("POST", 'pagarCuota.php', true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
        }
    };
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    ajax.send("nropoliza=" + nropoliza + "&nrocuota=" + nrocuota
            + "&monto=" + monto + "&vencimiento1="
            + vencimiento1 + "&vencimiento2=" + vencimiento2);
}

function guardarModal() {
    var nropoliza = document.getElementById('nropoliza').value,
            nrocuota = document.getElementById('nrocuota').value,
            fechapago = document.getElementById('fechapago').value,
            recibo = document.getElementById('recibo').value,
            vencimiento1 = document.getElementById('vencimiento1').value,
            vencimiento2 = document.getElementById('vencimiento2').value,
            monto = document.getElementById('monto').value;

    var divResultado = document.getElementById('divResultadoModal');

    ajax = objetoAjax();
    ajax.open("POST", "realizarCobro.php", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
            document.getElementById("botonModal2").innerHTML = "Aceptar";
            document.getElementById("botonModal1").className = "btn btn-primary oculto";
        }
    };
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    ajax.send("nropoliza=" + nropoliza
            + "&nrocuota=" + nrocuota
            + "&fechapago=" + fechapago
            + "&vencimiento1=" + vencimiento1
            + "&vencimiento2=" + vencimiento2
            + "&monto=" + monto
            + "&recibo=" + recibo);
}

function realizarCobro() {
    var nropoliza = document.getElementById('nropoliza').value,
            nrocuota = document.getElementById('nrocuota').value,
            fechapago = document.getElementById('fechapago').value;

    var divResultado = document.getElementById('divResultadoModal');

    ajax = objetoAjax();
    ajax.open("POST", "realizarCobro.php", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
            document.getElementById("botonModa2").value = "Aceptar";
            document.getElementById("botonModal1").className = "btn btn-primary oculto";
        }
    };
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    ajax.send("nropoliza=" + nropoliza
            + "&nrocuota=" + nrocuota
            + "&fechapago=" + fechapago);
}