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
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function guardarCliente(){
    if(document.getElementById("guardar").value === "Cancelar" || document.getElementById("guardar").value === "Aceptar"){
        windows.reload();
    } else {
        var accion = document.getElementById("guardar").value;
    }
    var apellido = document.getElementById('apellido').value;
    var nombre = document.getElementById('nombre').value;
    var nacimiento = document.getElementById('nacimiento').value;
    var tipodoc = document.getElementById('tipodoc').value;
    var documento = document.getElementById('documento').value;
    var cuit = document.getElementById('cuit').value;
    var condicionfiscal = document.getElementById('condicionfiscal').value;
    var cp = document.getElementById('cp').value;
    var localidad = document.getElementById('localidad').value;
    var localidad_hidden = document.getElementById('localidad_hidden').value;
    var barrio = document.getElementById('barrio').value;
    var barrio_hidden = document.getElementById('barrio_hidden').value;
    var calle = document.getElementById('calle').value;
    var calle_hidden = document.getElementById('calle_hidden').value;
    var numero = document.getElementById('numero').value;
    var piso = document.getElementById('piso').value;
    var dpto = document.getElementById('dpto').value;
    var telefono = document.getElementById('telefono').value;
    var celular = document.getElementById('celular').value;
    var correo = document.getElementById('correo').value;
    
    var divResultado = document.getElementById('divResultado');
    
    ajax=objetoAjax();
    ajax.open("POST", "guardarCliente.php" ,true);
    ajax.onreadystatechange=function() {
        if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
        } else if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
            document.getElementById("guardar").value = "Aceptar";
        }
    };
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

    ajax.send("apellido="+apellido+"&nombre="+nombre
        +"&nacimiento="+nacimiento+"&tipodoc="+tipodoc
        +"&documento="+documento+"&cuit="+cuit
        +"&condicionfiscal="+condicionfiscal+"&cp="+cp
        +"&localidad="+localidad+"&localidad_hidden="+localidad_hidden
        +"&barrio="+barrio+"&barrio_hidden="+barrio_hidden
        +"&calle="+calle+"&calle_hidden="+calle_hidden
        +"&numero="+numero
        +"&piso="+piso+"&dpto="+dpto
        +"&telefono="+telefono+"&celular="+celular
        +"&correo="+correo+"&accion="+accion);
}

function guardarDatos(){
//    alert ('Tincho');
    var archivo = document.getElementById('archivo');
    archivo = archivo.files[0];
    
    var identificador = document.getElementById('identificador').value;
    var denominacion = document.getElementById('denominacion').value;
    var ubicacion  = document.getElementById('ubicacion').value;
    var comitente = document.getElementById('comitente').value;
    var tipoobra = document.getElementById('tipoobra').value;
    var observacion = document.getElementById('observacion').value;
    var longitud = document.getElementById('longitud').value;
    var terraplen = document.getElementById('terraplen').value;
    var basenobitu = document.getElementById('basenobitu').value;
    var banquina = document.getElementById('banquina').value;
    var tratatriple = document.getElementById('tratatriple').value;
    var hormigon = document.getElementById('hormigon').value;
    var recubrimiento = document.getElementById('recubrimiento').value;
    var reforestacion = document.getElementById('reforestacion').value;
    
    var fechalic = document.getElementById('fechalic').value;
    var montoco = document.getElementById('montoco').value;
    var replanteo = document.getElementById('replanteo').value;
    var financiada = document.getElementById('financiada').value;
    var fechato = document.getElementById('fechato').value;
    var fechacont = document.getElementById('fechacont').value;
    var montocf = document.getElementById('montocf').value;
    var plazocf = document.getElementById('plazocf').value;
    var participacion = document.getElementById('participacion').value;
    var fechatf = document.getElementById('fechatf').value;
    var personeria = document.getElementById('personeria').value;
    var ute = document.getElementById('ute').value;
    var fechainicio = document.getElementById('fechainicio').value;
    var comentarios = document.getElementById('comentarios').value;
    
    divResultado = document.getElementById('resultado');
    
    fechalic = fechaInvertir(fechalic);
    replanteo = fechaInvertir(replanteo);
    fechato = fechaInvertir(fechato);
    fechacont = fechaInvertir(fechacont);
    plazocf = fechaInvertir(plazocf);
    fechatf = fechaInvertir(fechatf);
    fechainicio = fechaInvertir(fechainicio);
    
    var limit = 1048576*2,xhr;
    console.log(limit);
    if( archivo ){
        if( archivo.size < limit ){
            xhr = new XMLHttpRequest();
            xhr.upload.addEventListener('load',function(e){
                ajax=objetoAjax();
                //usando del medoto POST
                //archivo que realizará la operacion
                ajax.open("POST", "guardarObra.php" ,true);
                ajax.onreadystatechange=function() {
                    if (ajax.readyState==1) {
                        divResultado.innerHTML= '<center><img src="../images/cargando.gif"><br/>Guardando los datos...</center>';
                    } else if (ajax.readyState==4) {
                        //mostrar los nuevos registros en esta capa
                        divResultado.innerHTML = ajax.responseText;
                        document.getElementById('idOdontologia').value = document.getElementById('idOdontologiaAuxiliar').value;
                    }
                }
                //muy importante este encabezado ya que hacemos uso de un formulario
                ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                //enviando los valores
                ajax.send("identificador="+identificador+"&denominacion="+denominacion
                        +"&ubicacion="+ubicacion+"&comitente="+comitente+"&tipoobra="+tipoobra
                        +"&observacion="+observacion+"&longitud="+longitud+"&terraplen="+terraplen
                        +"&basenobitu="+basenobitu+"&banquina="+banquina
                        +"&tratatriple="+tratatriple+"&hormigon="+hormigon
                        +"&recubrimiento="+recubrimiento+"&reforestacion="+reforestacion
                        +"&fechalic="+fechalic+"&montoco="+montoco
                        +"&replanteo="+replanteo
                        +"&financiada="+financiada
                        +"&fechato="+fechato
                        +"&fechacont="+fechacont
                        +"&fechainicio="+fechainicio
                        +"&montocf="+montocf
                        +"&plazocf="+plazocf
                        +"&participacion="+participacion
                        +"&fechatf="+fechatf
                        +"&personeria="+personeria
                        +"&comentarios="+comentarios
                        +"&ute="+ute
                        +"&kml="+archivo.name);
                }, false);
            xhr.upload.addEventListener('error',function(e){
                divResultado.innerHTML = "<h1>Ocurrio Un Error</h1>";
            }, false);
            xhr.open('POST','subirArchivo.php');
            xhr.setRequestHeader("Cache-Control", "no-cache");
            xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            xhr.setRequestHeader("X-File-Name", archivo.name);
            xhr.send(archivo);
        } else {
            alert('El archivo es mayor que 2MB!');
        }
    }
    return true;
}

function soloFecha(evt){
    //asignamos el valor de la tecla a keynum
    if(window.event){// IE
    keynum = evt.keyCode;
    }else{ // otro navegador
    keynum = evt.which;
    }
    if((keynum>47 && keynum<58)||(keynum==0)||(keynum==13)||(keynum==8)||(keynum==47)){
        return true;
    } else {
        return false;
    }
}

function fechaControl(valor, evento){
    var valor1 = document.getElementById(valor);
    if(window.event){// IE
        keynum = evento.keyCode;
    } else { // otro navegador
        keynum = evento.which;
    }

    if(keynum===8 && valor1.value.length === 2) {
        valor1.value = valor1.value.substring(0,1);
        return true;
    }
    
    if(keynum===8 && valor1.value.length === 5) {
        valor1.value = valor1.value.substring(0,4);
        return true;
    }
    
    if(valor1.value.length===2||valor1.value.length===5){
        valor1.value=valor1.value+"/";
    };
}
function validarFecha(fecha){
    if (fecha !=  undefined && fecha.value !=  "" ){
        if (!/^\d{2}\/\d{2}\/\d{4}$/.test(fecha.value)){            
            fecha.style.borderColor='brown';
            fecha.focus();
            return false;
        }
        var dia  =  parseInt(fecha.value.substring(0,2),10);
        var mes  =  parseInt(fecha.value.substring(3,5),10);
        var anio =  parseInt(fecha.value.substring(6),10);        
        switch(mes){
        case 1:
        case 3:
        case 5:
        case 7:
        case 8: 
        case 10:
        case 12:
            numDias=31;
            break;
        case 4: case 6: case 9: case 11:
            numDias=30;
            break;
        case 2:
            if (comprobarSiBisisesto(anio)){ numDias=29 }else{ numDias=28};
            break;
        default:                                 
            fecha.focus();
            fecha.style.borderColor='brown';
            return false;
    }
 
        if (dia>numDias || dia == 0){                        
	    fecha.focus();
            fecha.style.borderColor='brown';
            return false;
        }
        fecha.style.borderColor='';
        validaMayorQue(fecha, anio, mes, dia);
        return true;
    }
}

function soloNumeros(evt){
    //asignamos el valor de la tecla a keynum
    if(window.event){// IE
        keynum = evt.keyCode;
    } else { // otro navegador
        keynum = evt.which;
    }
//comprobamos si se encuentra en el rango
    if((keynum>47 && keynum<58)||(keynum==0)||(keynum==13)||(keynum==8)||(keynum==46)){
        return true;
    } else {
        return false;
    }
}
function fechaInvertir(fecha){
//    fecha = document.getElementById(fecha);
    if (fecha.indexOf('/') > 0){
        var dia  =  parseInt(fecha.substring(0,2),10);
        var mes  =  parseInt(fecha.substring(3,5),10);
        var anio =  parseInt(fecha.substring(6),10);
        if(dia<10) dia = '0'+dia;
        if(mes<10) mes = '0'+mes;
        return anio+"-"+mes+"-"+dia;
    }
    if (fecha.indexOf('-') > 0){
        var anio  =  parseInt(fecha.substring(0,4),10);
        var mes  =  parseInt(fecha.substring(5,8),10);
        var dia =  parseInt(fecha.substring(9),10);
        if(dia<10) dia = '0'+dia;
        if(mes<10) mes = '0'+mes;
        return dia+"/"+mes+"/"+anio;
    }
}

function soloNumeros(evt){
    //asignamos el valor de la tecla a keynum
    if(window.event){// IE
        keynum = evt.keyCode;
    } else { // otro navegador
        keynum = evt.which;
    }
//comprobamos si se encuentra en el rango
    if((keynum>46 && keynum<58)||(keynum==0)||(keynum==13)||(keynum==8)||(keynum==46)){
        return true;
    } else {
        return false;
    }
}
function ver(idclientes, accion){
    if(accion === 'b'){
        document.getElementById("guardar").value = "Cancelar";
        document.getElementById("eliminar").className = "btn btn-large btn-block btn-danger";
    }
    if(accion === 'e'){
        document.getElementById("guardar").value = "Actualizar";
    }
    var divResultado = document.getElementById('divResultado');
    
    ajax=objetoAjax();
    ajax.open("POST", "buscarCliente.php" ,true);
    ajax.onreadystatechange=function() {
        if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
        } else if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
            document.getElementById('apellido').value = document.getElementById('cliente01').value;
            document.getElementById('nombre').value = document.getElementById('cliente02').value;
            document.getElementById('nacimiento').value = document.getElementById('cliente03').value;
            document.getElementById('tipodoc').value = document.getElementById('cliente04').value;
            document.getElementById('documento').value = document.getElementById('cliente05').value;
            document.getElementById('cuit').value = document.getElementById('cliente06').value;
            document.getElementById('condicionfiscal').value = document.getElementById('cliente07').value;
            document.getElementById('cp').value = document.getElementById('cliente08').value;
            document.getElementById('localidad').value = document.getElementById('cliente09').value;
            document.getElementById('localidad_hidden').value = document.getElementById('cliente09').value;
            document.getElementById('barrio').value = document.getElementById('cliente10').value;
            document.getElementById('barrio_hidden').value = document.getElementById('cliente10').value;
            document.getElementById('calle').value = document.getElementById('cliente11').value;
            document.getElementById('numero').value = document.getElementById('cliente12').value;
            document.getElementById('piso').value = document.getElementById('cliente13').value;
            document.getElementById('dpto').value = document.getElementById('cliente14').value;
//            document.getElementById('telefono').value = document.getElementById('clientes1').value;
//            document.getElementById('celular').value = document.getElementById('clientes1').value;
            document.getElementById('correo').value = document.getElementById('cliente15').value;
            window.scroll(0,0);
        }
    };
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("idclientes="+idclientes);
}