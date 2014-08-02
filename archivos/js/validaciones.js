
function valEmail(valor){
    //re=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/;
    re = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;	 // nueva validación 25/06/2014
    if(!re.test(valor))    {
        return false;
    }else{
        return true;
    }
}

function getScrollTop(){
    if(typeof pageYOffset!= 'undefined'){
        //most browsers
        return pageYOffset;
    }
    else{
        var B= document.body; //IE 'quirks'
        var D= document.documentElement; //IE with doctype
        D= (D.clientHeight)? D: B;
        return D.scrollTop;
    }
}

function posicion(){
	 eldiv=document.getElementById('dialog');
	 ancho=(document.body.clientWidth/2)-160;
	 eldiv.style.top= (getScrollTop()+200)+'px';
	 eldiv.style.left=ancho + 'px';
	 //alert(eldiv.style.top+'*'+eldiv.style.left);
}
		
/* ALERT */	
(function($){
  $.fn.dialog = function(data){
    var title, content, foco, volver;
    if(data && data.title){ title = data.title; }else{ title = " GRUPO ASEGURADOR RIVADAVIA :: NOTIFICACION "; }
    if(data && data.content){ content = data.content; }else{ content = data; }
	if(data && data.foco){ foco= data.foco; } else{foco="0";} // Para posicionar el foco despues de ver el alert.
	if(data && data.seleccionar){ seleccionar= data.seleccionar; } else{seleccionar="N";} // Para posicionar el foco despues de ver el alert.
	if(data && data.volver){ href = data.volver; } else{ href = "#";}

    var currentTop = $(document).scrollTop();
    var $dialog = $('<div>', {id: 'dialog', css:{top: currentTop + 150}}).prependTo('body');

    var $wrapper = $('<div>', {id: 'dialog-wrapper'}).appendTo($dialog);
    var $title = $('<h1>').text(title).appendTo($wrapper);
    var $content = $('<div>', {id: 'dialog-content'}).html("<p>"+content+"</p>").appendTo($wrapper);
    var $footer = $('<div>', {id: 'dialog-footer'}).append(
        $('<a>', {id: 'dialog_a', 'class': 'awesome small blue', 'href': href})
          .text("Aceptar")
          .click(function(){
			if (foco!= '0') {if(document.getElementById(foco) != null) {document.getElementById(foco).focus();}}   // pone el foco si existe.  
			if (seleccionar != 'N') {document.getElementById(foco).select();}   // pone el select().  
			$dialog.fadeOut(function(){$dialog.remove();});			
          })
      ).appendTo($wrapper);
    $dialog.hide().appendTo('body').fadeIn();
	
    return $(this).keyup(function(evt){
      if (evt.which == 27 || evt.which == 13){
        $dialog.fadeOut(function(){$dialog.remove()});
      }
    });
  }
})(jQuery);
 $(document).ready(function(){
        window.alert = $(document).dialog;
        $('[data-title]').click(function(evt){
          evt.preventDefault();
          $(document).dialog({title: $(this).attr('data-title'), content: $(this).attr('data-content'), foco: $(this).attr('data-foco'), selccionar: $(this).attr('data-seleccionar')});
        });
      });
function validar_m(){
MM_validateForm(); if(document.MM_returnValue) document.sistema.submit();	
}		

document.onclick=change;	
/* para expandir <ul> <li> */	
function change(evento){
   	//la segunda opciÃ³n de cada linea es para Mozilla-like browsers
	var miEvento=evento?evento:window.event;	  
	var miElemento=miEvento.srcElement?miEvento.srcElement:miEvento.target;

	if (miElemento.id == "reclamos_click") {
		var nested = document.getElementById('mostrar_reclamo');
	
		$('#mostrar_reclamo').animate({
				opacity: 100,
				left: '+=50',
				height: 'toggle'
			  }, 1500, function() {
				// Animation complete.
			  })
	}
	
	if (miElemento.id == "asegurados_click") {
//		var nested = document.getElementById('mostrar_asegurados');
		$('#mostrar_asegurados').animate({
				opacity: 100,
				left: '+=50',
				height: 'toggle'
			  }, 1500, function() {
				// Animation complete.
			  })
	}	
	if (miElemento.id == "planes_coberturas") {
//		var nested = document.getElementById('mostrar_asegurados');
		$('#planes_coberturas').animate({
				opacity: 100,
				left: '+=50',
				height: 'toggle'
			  }, 1500, function() {
				// Animation complete.
			  })
	}	
	if (miElemento.id == "reclamos_click") {
		if(document.getElementById("flecha_r_click").className=="desplegar"){
			document.getElementById("flecha_r_click").className = "plegar";
		}else
		if(document.getElementById("flecha_r_click").className=="plegar"){
			document.getElementById("flecha_r_click").className = "desplegar";
		}
		$('#mostrar_terceros').animate({
				opacity: 100,
				left: '+=50',
				height: 'toggle'
			  }, 1500, function() {
				// Animation complete.
				//alert('despues: '+document.getElementById("flecha_r_click").className);
			  })
	}	
	if (miElemento.id == "flecha_r_click") {
		if(document.getElementById("flecha_r_click").className=="desplegar"){
			document.getElementById("flecha_r_click").className = "plegar";
		}else
		if(document.getElementById("flecha_r_click").className=="plegar"){
			document.getElementById("flecha_r_click").className = "desplegar";
		}
		$('#mostrar_terceros').animate({
				opacity: 100,
				left: '+=50',
				height: 'toggle'
			  }, 1500, function() {
				// Animation complete.
				
				//alert('despues: '+document.getElementById("flecha_r_click").className);
			  })
	}	
	
	if (miElemento.id == "sistemas_click") {
		if(document.getElementById("flecha_s_click").className=="desplegar"){
			document.getElementById("flecha_s_click").className = "plegar";
		}else
		if(document.getElementById("flecha_s_click").className=="plegar"){
			document.getElementById("flecha_s_click").className = "desplegar";
		}
		$('#mostrar_sistemas').animate({
				opacity: 100,
				left: '+=50',
				height: 'toggle'
			  }, 1500, function() {
				// Animation complete.
			  })
	}	
	if (miElemento.id == "flecha_s_click") {
		if(document.getElementById("flecha_s_click").className=="desplegar"){
			document.getElementById("flecha_s_click").className = "plegar";
		}else
		if(document.getElementById("flecha_s_click").className=="plegar"){
			document.getElementById("flecha_s_click").className = "desplegar";
		}
		$('#mostrar_sistemas').animate({
				opacity: 100,
				left: '+=50',
				height: 'toggle'
			  }, 1500, function() {
				// Animation complete.
			  })
	}	
}
function posicion_formu(){
	 eldiv=document.getElementById('formularios');
	 eldiv.style.display='inline';
	 //ancho=(document.body.clientWidth/2)-260;
	 //eldiv.style.top='227px';
	 //eldiv.style.left=ancho + 'px';
	 obj = document.getElementById("mi_posicion");   /* en lugar de poner la posiciÃ³n fija la tomo del div del slider porque IE lo posiciona mal.*/
	 eldiv.style.top=obj.offsetTop+'px';
	 eldiv.style.left=obj.offsetLeft+'px';

	var laclase = document.getElementById('a_formularios');
	laclase.className='reclamos-current';
}
/* informaciÃ³n de PDFs de terceros */
function info(a,b){

	  /* INFORMACION USUARIO */		
		//var url='https://www.sistemas.segurosrivadavia.com/info_tercero.php?qry_pdf='+b+'('+a+')';		
		var url='https://www.sistemas.segurosrivadavia.com/info_tercero.php?qry_pdf='+b+'('+a+')';
		window.open(url, '', 'scrollbars=no, status=no, toolbar=no, directories=no, menubar=no, resizable=no, width=1, height=1, left=10000, top=10000');
	  /* FIN */

	document.sistema.action=a;
	document.sistema.target='_blank';
	document.sistema.submit();
}
function reinicio_reclamo(){
	var nested = document.getElementById('opcion_reclamo');
	nested.style.display='none'; 
	var nested = document.getElementById('formularios');
	nested.style.display='none'; 	
	var laclase = document.getElementById('a_formularios');
	laclase.className='reclamos';
}
function valida_particip(){	
	/* CAMBIAR ALERT POR DIV!!! */
	
	es_entero= /^\d+$/;
	
	/* Que se ingrese nombre */
	if(document.sistema.nombre.value=="" || document.sistema.nombre.value=="Nombre y apellido"){
		alert({content: 'Debe ingresar el nombre.', foco: 'nombre', seleccionar: 'S'}); posicion(); /* Posiciona el div en la mitad */
		return;
	}else
	/* que se ingrese un telÃ©fono o un mail */
	if((document.sistema.telefono.value=="" || document.sistema.telefono.value=="TelÃ©fono" ) && (document.sistema.mail.value=="" || document.sistema.mail.value=="E-mail")){		
		if(document.sistema.telefono.value=="" || document.sistema.telefono.value=="TelÃ©fono" ) {
			alert({content: 'Debe ingresar un telÃ©fono o un e-mail \rpara que podamos contactarlo.', foco: 'codigo_area', seleccionar: 'S'}); posicion(); /* Posiciona el div en la mitad */
		}else{
			alert({content: 'Debe ingresar un telÃ©fono o un e-mail \rpara que podamos contactarlo.', foco: 'mail', seleccionar: 'S'}); posicion(); /* Posiciona el div en la mitad */ 	
		}
		return;
	}else
	/* Que se ingrese el cod. de area cuando hay un tel.*/
	if((document.sistema.telefono.value!="" && document.sistema.telefono.value!="TelÃ©fono" ) && (document.sistema.codigo_area.value=="" || document.sistema.codigo_area.value=="C. Ãrea")){
		 alert({content: 'Debe ingresar el cÃ³digo de Ã¡rea para que podamos contactarlo.', foco: 'codigo_area', seleccionar: 'S'}); posicion();
		return;
	}else
	/* que se ingrese un tel cuando hay cod de area */
	if((document.sistema.telefono.value=="" || document.sistema.telefono.value=="TelÃ©fono" ) && (document.sistema.codigo_area.value!="" && document.sistema.codigo_area.value!="C. Ãrea")){
		alert({content: 'Debe ingresar el telÃ©fono para que podamos contactarlo.', foco: 'telefono', seleccionar: 'S'}); posicion();
		return;
	}else
	/* si hay cod area que sea un entero */
	if(!es_entero.test(document.sistema.codigo_area.value)&& (document.sistema.codigo_area.value!="" && document.sistema.codigo_area.value!="C. Ãrea")){
		alert({content: 'El cÃ³digo de Ã¡rea deberÃ¡ ser numÃ©rico.', foco: 'codigo_area', seleccionar: 'S'}); posicion();	
		return;
	}else
	/* si hay tel que sea un entero */
	if(!es_entero.test(document.sistema.telefono.value) && (document.sistema.telefono.value!="" && document.sistema.telefono.value!="TelÃ©fono" )){
		alert({content: 'El telÃ©fono deberÃ¡ ser numÃ©rico.', foco: 'telefono', seleccionar: 'S'}); posicion();
		return;
	}else	
	/* si hay mail que sea de formato correcto */
	if(!valEmail(document.sistema.mail.value) && (document.sistema.mail.value!="" && document.sistema.mail.value!="E-mail")){	
		alert({content: 'Debe ingresar un e-mail vÃ¡lido.', foco: 'mail', seleccionar: 'S'}); posicion();
		return;
	}else
	/* Que haya un comentario */
	if(document.sistema.comentario.value=="" || document.sistema.comentario.value=="Su consulta"){
		alert({content: 'Debe ingresar un comentario.', foco: 'comentario', seleccionar: 'S'}); posicion();
		return;
	}else{
		/* en lugar de un submit ir a un ajax  y completar <div>*/
		resultado2();
	}		
}
function resultado2(){
  var obj2=document.getElementById("mens_envio");
  var XMLHttpRequestObject = false;
  //fuenteDatos= '/envio_consulta.php';  /* PRUEBA */
  fuenteDatos= '/includes/envio_participacion.php';  /* PRUEBA */
  //alert(fuenteDatos);
  if (window.XMLHttpRequest) {
	  XMLHttpRequestObject = new XMLHttpRequest();
  } else if (window.ActiveXObject) {
	  XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
  }

  if(XMLHttpRequestObject) {
	  var obj =document.getElementById("mens_error");
	
	  XMLHttpRequestObject.open("POST", fuenteDatos, false);		//SincrÃ³nico!!!
	  
	  XMLHttpRequestObject.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	  value_sends="nombre="+document.sistema.nombre.value+"&codigo_area="+document.sistema.codigo_area.value+"&telefono="+document.sistema.telefono.value+"&mail="+document.sistema.mail.value+"&comentario="+document.sistema.comentario.value+"&condiciones="+document.sistema.condiciones.value;
	  //alert(value_sends);
	  XMLHttpRequestObject.send(value_sends);
	  //alert('Mensaje RETORNO: \r'+XMLHttpRequestObject.responseText);
	 //Esto es porque es SincrÃ³nico!!!
	  if (XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200) {
		  /* pone el mensaje en el div.*/
			//obj.innerHTML = XMLHttpRequestObject.responseText;
			alert({title: 'Envio Consulta :: Seguros Rivadavia', content: XMLHttpRequestObject.responseText});
		    posicion(); /* Posiciona el div en la mitad */
			document.sistema.nombre.value='';
			document.sistema.mail.value='';
			document.sistema.codigo_area.value='';
			document.sistema.telefono.value='';
			document.sistema.comentario.value='';		
			/*por el placeholder */
			
			document.sistema.nombre.focus();
			document.sistema.mail.focus();
			document.sistema.codigo_area.focus();
			document.sistema.telefono.focus();
			document.sistema.comentario.focus();
			document.sistema.nombre.focus();
			//obj2.style.display="none";
			$('#mens_envio').fadeOut();
	  }	  	  
  } //del if if(XMLHttpRequestObject)
} //de la funcion

function valida_contacto_aseg(){	
	/* CAMBIAR ALERT POR DIV!!! */
	
 var es_entero= /^\d+$/;
	// Variables para validar formato de patente.
 var er_patente_moto       = /(^([0-9]{3,3}[A-Z]{3,3})|([0-9]{3,3}[a-z]{3,3})|^)$/		
 var er_patente_auto_viejo = /(^([A-Z][0-9]{7,7})|([a-z][0-9]{7,7})|^)$/		
 var er_patente_auto       = /(^([A-Z]{3,3}[0-9]{3,3})|([a-z]{3,3}[0-9]{3,3})|^)$/		
 var er_patente_trailer    = /(^([0-9]{2,2}[A-Z]{3,3}[0-9]{3,3})|([0-9]{2,2}[a-z]{3,3}[0-9]{3,3})|^)$/
 var er_patente_ad         = /(^(A\/\D)|(a\/\d)|^)$/
 
 	patente = document.sistema.cont_patente.value;

	/* Que se ingrese nombre */
	if(document.sistema.nombre.value=="" || document.sistema.nombre.value=="Nombre y apellido"){
		alert({content: 'Debe ingresar el nombre.', foco: 'nombre', seleccionar: 'S'}); posicion(); /* Posiciona el div en la mitad */
		return;
	}else
	/* que ingrese el tipo y nro de documento, o cuit */
	if(document.sistema.cont_tipo_doc.value=="0"){
		alert({content: 'Debe ingresar el tipo de documento.'}); posicion(); /* Posiciona el div en la mitad */
		return;
	}else
	if(document.sistema.cont_tipo_doc.value!="7" && (document.sistema.cont_nro_doc.value=="" || document.sistema.cont_nro_doc.value=="NÃºmero")){
		alert({content: 'Debe ingresar el nro de documento.', foco: 'cont_nro_doc', seleccionar: 'S'}); posicion(); /* Posiciona el div en la mitad */
		return;
	}else
	if(!es_entero.test(document.sistema.cont_nro_doc.value) && (document.sistema.cont_nro_doc.value!="" || document.sistema.cont_nro_doc.value!="NÃºmero") && document.sistema.cont_tipo_doc.value!="7" ){
		alert({content: 'El documento deberÃ¡ ser numÃ©rico.', foco: 'cont_nro_doc', seleccionar: 'S'}); posicion();	
		return;
	}else
	/* CUIT */
	if(document.sistema.cont_tipo_doc.value=="7" && document.sistema.cont_cuit1.value==""){
		alert({content: 'Debe ingresar el nro de C.U.I.T.', foco: 'cont_cuit1', seleccionar: 'S'}); posicion(); /* Posiciona el div en la mitad */
		return;
	}else
	if(document.sistema.cont_tipo_doc.value=="7" && (document.sistema.cont_cuit2.value=="" || document.sistema.cont_cuit2.value=="C.U.I.T.")){
		alert({content: 'Debe ingresar el nro de C.U.I.T.', foco: 'cont_cuit2', seleccionar: 'S'}); posicion(); /* Posiciona el div en la mitad */
		return;
	}else
	if(document.sistema.cont_tipo_doc.value=="7" && document.sistema.cont_cuit3.value==""){
		alert({content: 'Debe ingresar el nro de C.U.I.T.', foco: 'cont_cuit3', seleccionar: 'S'}); posicion(); /* Posiciona el div en la mitad */
		return;
	}else
	/* CUIT DEBE SER ENTERO */
	if(document.sistema.cont_tipo_doc.value=="7" && !es_entero.test(document.sistema.cont_cuit1.value)){
		alert({content: 'El C.U.I.T. deberÃ¡ ser numÃ©rico.', foco: 'cont_cuit1', seleccionar: 'S'}); posicion();	
		return;
	}else
	if(document.sistema.cont_tipo_doc.value=="7" && !es_entero.test(document.sistema.cont_cuit2.value)){
		alert({content: 'El C.U.I.T. deberÃ¡ ser numÃ©rico.', foco: 'cont_cuit2', seleccionar: 'S'}); posicion();	
		return;
	}else
	if(document.sistema.cont_tipo_doc.value=="7" && !es_entero.test(document.sistema.cont_cuit3.value)){
		alert({content: 'El C.U.I.T. deberÃ¡ ser numÃ©rico.', foco: 'cont_cuit3', seleccionar: 'S'}); posicion();	
		return;
	}else
	/* que se ingrese un telÃ©fono o un mail */
	if((document.sistema.telefono.value=="" || document.sistema.telefono.value=="TelÃ©fono" ) && (document.sistema.mail.value=="" || document.sistema.mail.value=="E-mail")){		
		if(document.sistema.telefono.value=="" || document.sistema.telefono.value=="TelÃ©fono" ) {
			alert({content: 'Debe ingresar un telÃ©fono o un e-mail \rpara que podamos contactarlo.', foco: 'codigo_area', seleccionar: 'S'}); posicion(); /* Posiciona el div en la mitad */
		}else{
			alert({content: 'Debe ingresar un telÃ©fono o un e-mail \rpara que podamos contactarlo.', foco: 'mail', seleccionar: 'S'}); posicion(); /* Posiciona el div en la mitad */ 	
		}
		return;
	}else
	/* Que se ingrese el cod. de area cuando hay un tel.*/
	if((document.sistema.telefono.value!="" && document.sistema.telefono.value!="TelÃ©fono" ) && (document.sistema.codigo_area.value=="" || document.sistema.codigo_area.value=="C. Ãrea")){
		 alert({content: 'Debe ingresar el cÃ³digo de Ã¡rea para que podamos contactarlo.', foco: 'codigo_area', seleccionar: 'S'}); posicion();
		return;
	}else
	/* que se ingrese un tel cuando hay cod de area */
	if((document.sistema.telefono.value=="" || document.sistema.telefono.value=="TelÃ©fono" ) && (document.sistema.codigo_area.value!="" && document.sistema.codigo_area.value!="C. Ãrea")){
		alert({content: 'Debe ingresar el telÃ©fono para que podamos contactarlo.', foco: 'telefono', seleccionar: 'S'}); posicion();
		return;
	}else
	/* si hay cod area que sea un entero */
	if(!es_entero.test(document.sistema.codigo_area.value)&& (document.sistema.codigo_area.value!="" && document.sistema.codigo_area.value!="C. Ãrea")){
		alert({content: 'El cÃ³digo de Ã¡rea deberÃ¡ ser numÃ©rico.', foco: 'codigo_area', seleccionar: 'S'}); posicion();	
		return;
	}else
	/* si hay tel que sea un entero */
	if(!es_entero.test(document.sistema.telefono.value) && (document.sistema.telefono.value!="" && document.sistema.telefono.value!="TelÃ©fono" )){
		alert({content: 'El telÃ©fono deberÃ¡ ser numÃ©rico.', foco: 'telefono', seleccionar: 'S'}); posicion();
		return;
	}else	
	/* si hay mail que sea de formato correcto */
	if(!valEmail(document.sistema.mail.value) && (document.sistema.mail.value!="" && document.sistema.mail.value!="E-mail")){	
		alert({content: 'Debe ingresar un e-mail vÃ¡lido.', foco: 'mail', seleccionar: 'S'}); posicion();
		return;
	}else
	
	/* formato patente */
	if( (patente== "" || patente=="Patente")){
		//if((!er_patente_moto.test(patente)) && (!er_patente_auto_viejo.test(patente)) && (!er_patente_auto.test(patente)) && (!er_patente_trailer.test(patente)) && (!er_patente_ad.test(patente))){ 
		alert({content: 'Debe ingresar una patente.', foco: 'cont_patente', seleccionar: 'S'}); posicion();
		return;
	//	}
	}else
	
	/* Que haya un comentario */
	if(document.sistema.comentario.value=="" || document.sistema.comentario.value=="Su consulta"){
		alert({content: 'Debe ingresar un comentario.', foco: 'comentario', seleccionar: 'S'}); posicion();
		return;
	}else{
		/* en lugar de un submit ir a un ajax  y completar <div>*/
		resultado_consulta();
	}		
}
// Funcion que oculta la capa que contiene el campo apellido para Agencia, cuando quiere hacer un presupuesto Nuevo.
function cont_OcultaDoc(){
	var i=0;
	var tipo = document.forms[0].cont_tipo_doc.value;
	var doc=document.getElementById("cont_capa_nro_doc");
	var cuit=document.getElementById("cont_capa_cuit");
	
	if ((document.forms[0].cont_tipo_doc.value!="7")){
	doc.style.display='inline';
	cuit.style.display='none';
	
	}else{	
	doc.style.display='none';
	cuit.style.display='inline';
	}
		
}
function resultado_consulta(){
  var obj2=document.getElementById("mens_envio");
  var XMLHttpRequestObject = false;
  //fuenteDatos= '/envio_consulta.php';  /* PRUEBA */
  fuenteDatos= '/includes/envio_consulta_asegurado.php';  /* PRUEBA */
  //alert(fuenteDatos);
  if (window.XMLHttpRequest) {
	  XMLHttpRequestObject = new XMLHttpRequest();
  } else if (window.ActiveXObject) {
	  XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
  }

  if(XMLHttpRequestObject) {
	  var obj =document.getElementById("mens_error");
	
	  XMLHttpRequestObject.open("POST", fuenteDatos, false);		//SincrÃ³nico!!!
	  
	  XMLHttpRequestObject.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	  value_sends="nombre="+document.sistema.nombre.value+"&codigo_area="+document.sistema.codigo_area.value+"&telefono="+document.sistema.telefono.value+"&mail="+document.sistema.mail.value+"&comentario="+document.sistema.comentario.value+"&tipo_doc="+document.sistema.cont_tipo_doc.value+"&nro_doc="+document.sistema.cont_nro_doc.value+"&cuit="+document.sistema.cont_cuit1.value+"-"+document.sistema.cont_cuit2.value+"-"+document.sistema.cont_cuit3.value+"&patente="+document.sistema.cont_patente.value;
	  //alert(value_sends);
	  XMLHttpRequestObject.send(value_sends);
	  //alert('Mensaje RETORNO: \r'+XMLHttpRequestObject.responseText);
	 //Esto es porque es SincrÃ³nico!!!
	  if (XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200) {
		  /* pone el mensaje en el div.*/
			//obj.innerHTML = XMLHttpRequestObject.responseText;
			alert({title: 'Envio Consulta :: Seguros Rivadavia', content: XMLHttpRequestObject.responseText});
		    posicion(); /* Posiciona el div en la mitad */
			document.sistema.nombre.value='';
			document.sistema.mail.value='';
			document.sistema.codigo_area.value='';
			document.sistema.telefono.value='';
			document.sistema.comentario.value='';		
			/*por el placeholder */
			
			document.sistema.nombre.focus();
			document.sistema.mail.focus();
			document.sistema.codigo_area.focus();
			document.sistema.telefono.focus();
			document.sistema.comentario.focus();
			document.sistema.nombre.focus();
			//obj2.style.display="none";
			$('#mens_envio').fadeOut();
	  }	  	  
  } //del if if(XMLHttpRequestObject)
} //de la funcion

function ir_a_contacto(){
	
	//valida campos bÃ¡sicos
	if(document.getElementById("apellido_nombre").value == "Nombre y apellido"){
		alert({content: 'Ingrese nombre y apellido.'}); posicion(); /* Posiciona el div en la mitad */
	return false;	
	}
	
	if(document.getElementById("comentario").value == "Su consulta"){
		alert({content: 'Ingrese su consulta.'}); posicion(); /* Posiciona el div en la mitad */
	return false;			
	}
	
	var ud_es = document.getElementById("ud_es");
	
	//si no selecciono nada se pone por default el Potencial Cliente	
	if(ud_es.selectedIndex == 0)
		ud_es.options[1].selected=true;
	
	//si es potencial cliente
	if(ud_es.selectedIndex <= 1){
		document.sistema.action="/institucional/contacto_potencial.php";	
		document.sistema.submit();
	}else
	if(ud_es.selectedIndex == 2){
		document.sistema.action="/personas/asegurados/contacto_asegurado.php";	
		document.sistema.submit();
	}else
	if(ud_es.selectedIndex == 3){
		document.sistema.action="/personas/terceros/contacto_tercero.php";	
		document.sistema.submit();
	}
}

function posicionaUdEs(ud_es){
	
	var cmbUdEs = document.getElementById("ud_es");
	//alert("posicionaUdEs: "+cmbUdEs.selectedIndex);

	for(i=0;i<=3;i++)
		if(cmbUdEs.options[i].value == ud_es)
			cmbUdEs.options[i].selected=true;
	
}