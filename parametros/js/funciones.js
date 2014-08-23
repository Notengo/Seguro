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

function guardarDato(){
    if(document.getElementById("guardar").value === "Nuevo"){
        document.getElementById('nuevo').style.display = 'initial';
        document.getElementById('marca').focus();
        document.getElementById("guardar").value = "Guardar";
        document.getElementById("cancelar").className = "btn btn-large btn-block btn-primary";
        return true;
    }
    var idmarca = '';
    if(document.getElementById("guardar").value === "Eliminar" || document.getElementById("guardar").value === "Actualizar"){
        idmarca = document.getElementById('marca_hidden').value;
    }
    if(document.getElementById("guardar").value === "Aceptar"){
        location.reload();
        return false;
    } else {
        var accion = document.getElementById("guardar").value;
    }

    var marca = document.getElementById('marca').value;
    var divResultado = document.getElementById('divResultado');
    
    ajax=objetoAjax();
    ajax.open("POST", "guardarMarca.php" ,true);
    ajax.onreadystatechange=function() {
        if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
        } else if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
            document.getElementById("guardar").value = "Aceptar";
        }
    };
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("marca="+marca+"&accion="+accion+"&idmarca="+idmarca);
}

function guardarUso(){
    if(document.getElementById("guardar").value === "Nuevo"){
        document.getElementById('nuevo').style.display = 'initial';
        document.getElementById('uso').focus();
        document.getElementById("guardar").value = "Guardar";
        document.getElementById("cancelar").className = "btn btn-large btn-block btn-primary";
        return true;
    }
    var iduso = '';
    if(document.getElementById("guardar").value === "Eliminar" || document.getElementById("guardar").value === "Actualizar"){
        iduso = document.getElementById('uso_hidden').value;
    }
    if(document.getElementById("guardar").value === "Aceptar"){
        location.reload();
        return false;
    } else {
        var accion = document.getElementById("guardar").value;
    }

    var uso = document.getElementById('uso').value;
    var divResultado = document.getElementById('divResultado');
    
    ajax=objetoAjax();
    ajax.open("POST", "guardarUso.php" ,true);
    ajax.onreadystatechange=function() {
        if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
        } else if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
            document.getElementById("guardar").value = "Aceptar";
        }
    };
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("uso="+uso+"&accion="+accion+"&iduso="+iduso);
}

function guardarModelo(){
    if(document.getElementById("guardar").value === "Nuevo"){
        document.getElementById('nuevo').style.display = 'initial';
        document.getElementById('marca').focus();
        document.getElementById("guardar").value = "Guardar";
        document.getElementById("cancelar").className = "btn btn-large btn-block btn-primary";
        return true;
    }
    var idmodelo = '';
    if(document.getElementById("guardar").value === "Eliminar" || document.getElementById("guardar").value === "Actualizar"){
        idmodelo = document.getElementById('modelo_hidden').value;
    }
    if(document.getElementById("guardar").value === "Aceptar"){
        location.reload();
        return false;
    } else {
        var accion = document.getElementById("guardar").value;
    }

    var idmarca = document.getElementById('marca').value;
    var modelo = document.getElementById('modelo').value;
    var divResultado = document.getElementById('divResultado');

    ajax=objetoAjax();
    ajax.open("POST", "guardarModelo.php" ,true);
    ajax.onreadystatechange=function() {
        if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
        } else if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
            document.getElementById("guardar").value = "Aceptar";
        }
    };
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    
    ajax.send("modelo="+modelo+"&accion="+accion
            +"&idmarca="+idmarca+"&idmodelo="+idmodelo);
}

function ver(idmarca, accion, marca){
    document.getElementById('nuevo').style.display = 'initial';
    if(accion === 'b'){
        document.getElementById("guardar").value = "Eliminar";
        document.getElementById("guardar").className = "btn btn-large btn-block btn-danger";
        document.getElementById("cancelar").style.display = 'initial';
    }
    if(accion === 'e'){
        document.getElementById("guardar").value = "Actualizar";
        document.getElementById("guardar").className = "btn btn-large btn-block btn-primary";
        document.getElementById("cancelar").style.display = 'initial';
    }
    document.getElementById("marca").value = marca;
    document.getElementById("marca_hidden").value = idmarca;
    window.scroll(0,0);
}

function verUso(iduso, accion, uso){
    document.getElementById('nuevo').style.display = 'initial';
    if(accion === 'b'){
        document.getElementById("guardar").value = "Eliminar";
        document.getElementById("guardar").className = "btn btn-large btn-block btn-danger";
        document.getElementById("cancelar").style.display = 'initial';
    }
    if(accion === 'e'){
        document.getElementById("guardar").value = "Actualizar";
        document.getElementById("guardar").className = "btn btn-large btn-block btn-primary";
        document.getElementById("cancelar").style.display = 'initial';
    }
    document.getElementById("uso").value = uso;
    document.getElementById("uso_hidden").value = iduso;
    window.scroll(0,0);
}

function verModelo(idmodelo, accion, modelo, idmarca){
//    document.getElementById('nuevo').style.display = 'initial';
    if(accion === 'b'){
        document.getElementById("guardar").value = "Eliminar";
        document.getElementById("guardar").className = "btn btn-large btn-block btn-danger";
        document.getElementById("cancelar").style.display = 'initial';
    }
    if(accion === 'e'){
        document.getElementById("guardar").value = "Actualizar";
        document.getElementById("guardar").className = "btn btn-large btn-block btn-primary";
        document.getElementById("cancelar").style.display = 'initial';
    }
    document.getElementById("marca").value = idmarca;
    document.getElementById("modelo_hidden").value = idmodelo;
    document.getElementById("modelo").value = modelo;
    window.scroll(0,0);
}