// JavaScript Document
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
// -->

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function Submit() {
if (document.sistema.canSubmit == null) {
 var xCanSubmit = true;
 if (!xCanSubmit)
  document.sistema.canSubmit = null;
 else 
  document.sistema.canSubmit = false;
 return xCanSubmit;
} else {
 return false;
}
}

function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);

function MM_showHideLayers() { //v6.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}

// Ocultar Capa

function ocultar_capa(){
	document.body.sistema.onLoad = "MM_showHideLayers('ocultar','','hide')";
}

function mostrar_capa(){
	document.body.onLoad = "MM_showHideLayers('ocultar','','show')";
}

function MM_validateForm() { 
 
 var i=0;
 //alert(getCookie("NROOPER"));	
 var operacion = getCookie("NROOPER"); 
 if(typeof operacion != 'undefined' && operacion != null ){	 
	i++;
	//alert("Ya tiene una sesion iniciada en otra ventana o pesta\u00F1a.");
	alert({title: 'Mensaje :: Seguros Rivadavia', content: 'Ya tiene una sesion iniciada en otra ventana o pesta\u00F1a.'});
	posicion();
 }else
    if (document.forms[0].usuario.value =="" ){
		i++;
		alert({title: 'Mensaje :: Seguros Rivadavia', content: 'Debe Ingresar un Usuario'});
		posicion();		
		document.forms[0].usuario.focus();
    }else

		if (document.forms[0].cuit.value =="" || document.forms[0].cuit2.value =="" ||  document.forms[0].cuit3.value =="")
		{
	   		i++;
			alert ({title: 'Mensaje :: Seguros Rivadavia', content: 'Debe Ingresar un Numero de C.U.I.T'});
			posicion();			
			document.forms[0].cuit.focus();
		
		}else 
		
			if (isNaN(document.forms[0].cuit.value)||(document.forms[0].cuit.value.indexOf('.',0)!=-1)||(document.forms[0].cuit.value.indexOf('-',0)!=-1)||(document.forms[0].cuit.value.indexOf('+',0)!=-1)){			
				i++;
				alert ({title: 'Mensaje :: Seguros Rivadavia', content: 'CUIT debe ser numérico.'});
				posicion();
				document.forms[0].cuit.focus();
			}else		
			
				if (isNaN(document.forms[0].cuit2.value)||(document.forms[0].cuit2.value.indexOf('.',0)!=-1)||(document.forms[0].cuit2.value.indexOf('-',0)!=-1)||(document.forms[0].cuit2.value.indexOf('+',0)!=-1)){			
				i++;
				alert ({title: 'Mensaje :: Seguros Rivadavia', content: 'CUIT debe ser numérico.'});
				posicion();
				document.forms[0].cuit2.focus();
			}else		
			
				if (isNaN(document.forms[0].cuit3.value)||(document.forms[0].cuit3.value.indexOf('.',0)!=-1)||(document.forms[0].cuit3.value.indexOf('-',0)!=-1)||(document.forms[0].cuit3.value.indexOf('+',0)!=-1)){			
				i++;
				alert ({title: 'Mensaje :: Seguros Rivadavia', content: 'CUIT debe ser numérico.'});
				posicion();
				document.forms[0].cuit3.focus();
			}else
	    		if (document.forms[0].cuit.value < 0 || document.forms[0].cuit2.value < 0 || document.forms[0].cuit3.value < 0) { 

				alert ({title: 'Mensaje :: Seguros Rivadavia', content: 'El Cuit no Acepta Guiones'});
				posicion();
				return ""
				}else
					if (document.forms[0].password.value ==""){
						i++;
						alert ({title: 'Mensaje :: Seguros Rivadavia', content: 'Debe Ingresar una Clave'});
						posicion();
						document.forms[0].password.focus();
					}
	
	if (i===0)
		document.MM_returnValue = true;
	//	document.forms[0].submit();
	else{
		document.MM_returnValue = false;
	}
}

function verifyAndSubmit(){

	if(document.MM_returnValue)
		document.sistema.submit();
			
}

function verono(i) {
		var elemento=document.getElementById("datos"+i);
		if (elemento.style.display=="none") {
			elemento.style.display='inline';
		}else {
				elemento.style.display="none";
		}
  }
function Validate(){
 	var i=0; 
	if (!(document.forms[0].cobr)){
		i++;
		alert('Ud. ha perdido la sesión por favor vuelva a ingresar.');
	}
	if (i===0)
		document.MM_returnValue = true;
	else{
		document.MM_returnValue = false;
		window.location.href='../../../../identificacion_usuario.php?tipo_usu=P';
	}
}

