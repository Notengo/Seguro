function delCookie(name,path,domain) { 
	//alert('borra cookie'); 
	/* if(getCookie(name)) {*/
	document.cookie=name+"="+((path==null)?"":";path="+path)+((domain==null)?"":";domain="+domain)+";expires=Thu,01-Jan-70 00:00:01 GMT"; 
	/*}*/ 
}

function setCookie(name,values,expires,path,domain,secure) { 
	document.cookie=name+ "=" +escape(value)+((expires==null)?"":";expires="+expires.toGMTString())+((path==null)?"":";path=" + path)+((domain==null)?"":";domain="+domain)+((secure==null)?"":";secure"); 
} 

function getCookie(name) { 
//	alert('muestra cookie');
	var cname=name + "="; 
	var dc=document.cookie; 
		if(dc.length>0) { 
		begin=dc.indexOf(cname); 
			if(begin!=-1) { 
				begin+=cname.length; 
				end=dc.indexOf(";",begin); 
				if(end==-1) 
				end=dc.length; 
				return(dc.substring(begin,end)); 
			} 
		} 
} 

