
function soloNumeros(evt)//funcion para que el campo sea solo numeros
{
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

 function companiaAgregar()//funcion para agregar producto
 {
    var ident = document.getElementById('compania');
    if(ident.value === "0"){ return false; }
    var div = document.getElementById('companiasDiv'); //con getElementById los reconoce por los id de los input
    if(!document.getElementsByName('compania'+ident.value)[0]){
        hijo = document.createElement('div');
        hijo.setAttribute('name', 'compania'+ident.value);
        hijo.setAttribute('id', 'compania'+ident.value);
        hijo.setAttribute('class', 'detalle');
        hijo.innerHTML = "Empresa: " + ident[ident.selectedIndex].text + " | Numero: " + document.getElementById('numero').value
+                "&nbsp;&nbsp;&nbsp;<img alt='borra' src='../images/borrar.png' onclick='borrarCompania(\""+ident.value+"\")'/>";
        div.appendChild(hijo);
        document.getElementById('listaCompanias').value = document.getElementById('listaCompanias').value + "-" + ident.value;
        
        
        hijo = document.createElement('input');
        hijo.setAttribute('name', 'companian'+ident.value);
        hijo.setAttribute('id', 'companian'+ident.value);
        hijo.setAttribute('type', 'hidden');
        div.appendChild(hijo);
        document.getElementById('companian'+ident.value).value = document.getElementById('numero').value;
     
    }
}

function borrarCompania(id){
    var repuesto = document.getElementById('producto'+id);
    repuesto.parentNode.removeChild(repuesto);
    
    var repuesto = document.getElementById('productoc'+id);
    repuesto.parentNode.removeChild(repuesto);
    
    var repuesto = document.getElementById('productom'+id);
    repuesto.parentNode.removeChild(repuesto);

    var listaProducto = document.getElementById('listaProducto');
    var listado = listaProducto.value.split('-');

    var lista = "";
    for (i = 1; i < listado.length; i++){
        if(id !== listado[i] && listado[i] !== '') lista += "-"+listado[i];
    }
    document.getElementById('listaProducto').value = lista;
}

function productoAgregar()//funcion para agregar producto
 {
    var ident = document.getElementById('producto');
    if(ident.value === "0"){ return false; }
    var div = document.getElementById('productosDiv'); //con getElementById los reconoce por los id de los input
    if(!document.getElementsByName('producto'+ident.value)[0]){
        hijo = document.createElement('div');
        hijo.setAttribute('name', 'producto'+ident.value);
        hijo.setAttribute('id', 'producto'+ident.value);
        hijo.setAttribute('class', 'detalle');
        hijo.innerHTML = "Producto: " + ident[ident.selectedIndex].text+ document.getElementById('monto').value+ " | Cant.: " + document.getElementById('cantidad').value //+ "" + document.getElementById('monto').value *document.getElementById('cantidad').value
+                "&nbsp;&nbsp;&nbsp;<img alt='borra' src='../imagenes/mini/borrarm.png' onclick='borrarProducto(\""+ident.value+"\")'/>";
        div.appendChild(hijo);
        document.getElementById('listaProducto').value = document.getElementById('listaProducto').value + "-" + ident.value;
        
        
        hijo = document.createElement('input');
        hijo.setAttribute('name', 'productom'+ident.value);
        hijo.setAttribute('id', 'productom'+ident.value);
        hijo.setAttribute('type', 'hidden');
        div.appendChild(hijo);
        document.getElementById('productom'+ident.value).value = document.getElementById('monto').value;
        
        hijo = document.createElement('input');
        hijo.setAttribute('name', 'productoc'+ident.value);
        hijo.setAttribute('id', 'productoc'+ident.value);
        hijo.setAttribute('type', 'hidden');
        div.appendChild(hijo);
        document.getElementById('productoc'+ident.value).value = document.getElementById('cantidad').value;
    }
}

function borrarProducto(id){
    var repuesto = document.getElementById('producto'+id);
    repuesto.parentNode.removeChild(repuesto);
    
    var repuesto = document.getElementById('productoc'+id);
    repuesto.parentNode.removeChild(repuesto);
    
    var repuesto = document.getElementById('productom'+id);
    repuesto.parentNode.removeChild(repuesto);

    var listaProducto = document.getElementById('listaProducto');
    var listado = listaProducto.value.split('-');

    var lista = "";
    for (i = 1; i < listado.length; i++){
        if(id !== listado[i] && listado[i] !== '') lista += "-"+listado[i];
    }
    document.getElementById('listaProducto').value = lista;
}