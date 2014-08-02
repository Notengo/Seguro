<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="../archivos/imagenes/favicon.ico">
        <!--
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        -->
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="description" content="Seguros Rivadavia">
        <meta name="author" content="Seguros Rivadavia">

        <title>Productores || Seguros Rivadavia</title>

        <meta name="keywords" content="productores, inspectores, recuperadores, seguros, rivadavia, cooperativa, bernardino rivadavia">

        <link rel="stylesheet" type="text/css" href="../archivos/estilos/estilo.css">
        <link rel="stylesheet" type="text/css" href="../archivos/estilos/cooperativa.css">

        <link rel="stylesheet" type="text/css" href="../archivos/estilos/slider.css">
        <link rel="stylesheet" type="text/css" href="../archivos/estilos/dialog.css">

        <!-- Addon for background tiling support -->
        <script type="text/javascript" language="javascript" src="../archivos/js/iepngfix_tilebg.js"></script><style type="text/css"></style>
        <script type="text/javascript" language="javascript" src="../archivos/js/placeholder-min.js"></script>
        <script type="text/javascript" src="../archivos/js/jquery.js"></script>
        <script type="text/javascript" src="../archivos/js/jquery-migrate.js"></script>
        <script type="text/javascript" language="javascript" src="../archivos/js/validaciones.js"></script>

        <script type="text/javascript" language="javascript" src="../archivos/js/identificacion_usuario.js"></script>
        <script type="text/javascript" language="javascript" src="../archivos/js/gestionCookies.js"></script>

        <!--	************	Verifica si entr en https	********* -->
        <script>
            /*
             var linea=new String(document.URL);
             var lista = linea.split(/\/\/|\//); 
             if(lista[0]=='http:') {
             if(lista[1]!=='webserver') location.replace('https://'+lista[1]+'/'+lista[2]);
             }
             */
            document.onkeypress = keypres;

            function keypres(e) {
                if (((document.all) ? event.keyCode : e.which) == "13") {
                    MM_validateForm();
                    verifyAndSubmit();
                }
            }
        //var KeyID = (window.event) ? event.keyCode : e.keyCode;	
        </script>	

    </head>

    <body onload="document.sistema.usuario.focus();
        mensaje('23', '07');">

        <div id="container">

            <div id="header">

                <div id="logo">
                    <a href="/">
                        <h1>Seguros Rivadavia</h1>
                    </a>
                    <p>Casa Central: Av. 7 N° 755 (B1900TFV)<br>
                        La Plata - Buenos Aires - Argentina<br>
                    </p>
                </div><!-- logo -->

                <div id="call">
                    <div class="call-left">
                    </div>
                    <div class="call-cont">
                        <p>Si Ud. es productor asesor de seguros y
                            está interesado en comercializar nuestros productos,
                            lo invitamos a coordinar una entrevista.</p>
                        <p>&nbsp;</p>
                        <p><a class="button-blue" href="entrevista-productores.php"><span>Solicitar entrevista</span></a></p>

                    </div>
                    <div class="call-right">
                    </div>
                </div><!-- call -->

                <div id="navigation">
                    <div id="nav-bar">
                        <ul class="tab">

                            <li><a href="http://www.segurosrivadavia.com/personas/" title="Productos para Personas"><span>Personas</span></a></li>
                            <li><a href="http://www.segurosrivadavia.com/empresas/" title="Productos para Empresas y Profesionales"><span>Empresas y Profesionales</span></a></li>
                            <li><a href="http://www.mutualrivadavia.com/transporte/" title="Productos para Transporte PÃºblico de Pasajeros"><span>Transporte de Pasajeros</span></a></li>
                            <li><a href="http://www.segurosrivadavia.com/institucional/" title="Institucional" class="current"><span>Institucional</span></a></li>
                        </ul>
                    </div><!-- nav-bar --> <!-- Solapas con mdulos -->

                    <div id="path">
                        <a href="http://www.segurosrivadavia.com/">Seguros Rivadavia</a>
                        <ul>
                            <li><a href="/institucional/">Institucional</a></li>
                            <li><a href="#" class="current">Sistemas</a></li>
                        </ul>
                    </div><!-- path -->

                    <!-- Barra de b?squeda -->
                    <div id="search">
                        <script language="javascript" type="text/javascript">
                            function buscar() {
                                var query = document.getElementById("search-bar");
                                if (query.value != "" && query.value != "Encontrar...") {

                                    //busqueda de sucursales
                                    if (query.value.indexOf("sucursal") >= 0 || query.value.indexOf("Sucursal") >= 0)
                                        query.value = "Centros de Atencion";

                                    document.sistema.action = "/institucional/resultados_google.php?q=" + query.value;
                                    document.sistema.submit();
                                } else
                                    query.focus();
                            }

                            /* funcion para cuando dan enter en el input 				*/
                            document.onkeypress = keypres;
                            function keypres(e) {

                                var ele = (document.all) ? event.srcElement : e.target;
                                if (ele.name == "search-bar")
                                    if (((document.all) ? event.keyCode : e.which) == "13") {
                                        buscar();
                                    }

                            }
                        </script>
                        <input type="hidden" id="pos_solapa" name="pos_solapa" value="institucional">
                        <input id="search-bar" placeholder="Encontrar..." name="search-bar" type="search">
                        <input class="search-button" value="Buscar" name="search" type="button" onclick="buscar()">
                    </div><!-- search -->
                </div><!-- NAVIGATION -->
            </div><!-- HEADER -->


            <div id="content"> 

                <div id="sidebar1"><!-- app -->

                    <!-- Men de SISTEMAS ON LINE -->

                    <div class="app">
                        <div class="app-top"><a href="javascript:void(0)"><img id="sistemas_click" src="/archivos/imagenes/sistemas.png" alt="Sistemas On-line" title="Sistemas On-line"></a>
                        </div><!-- app-top -->
                        <div class="app-cont">
                            <div id="mostrar_sistemas" style="display:none;">
                                <ul class="sistemas">
                                    <li class="sistemas-current"><a href="/institucional/login-usuarios.php?tipo_usu=P">Productores</a></li>
                                    <li><a href="/institucional/login-usuarios.php?tipo_usu=R">Recuperadores</a></li>
                                    <li><a href="/institucional/login-usuarios.php?tipo_usu=I">Inspectores</a></li>
                                    <li><a href="/institucional/login-mutual.php">Mutual Rivadavia</a></li>
                                    <li><a href="/institucional/login-beneficiarios.php?tipo_usu=B">Proveedores</a></li>
                                </ul>

                            </div>
                            <div class="desplegar" id="flecha_s_click"></div>
                            <div style="clear:both"></div>
                        </div><!-- app-cont -->
                        <div class="app-bott">
                        </div>
                    </div><!-- app -->

                </div><!-- SIDEBAR1 -->

                <!--	Determina la url para hacer el post a las aplicaciones		-->


                <div id="main">
                    <div class="color-box">
                        <div class="color-box-top"></div>
                        <div class="color-box-cont">
                            <div class="login">
                                <form name="sistema" method="post" onsubmit="return Submit()" action="https://www.sistemas.segurosrivadavia.com/ir_a_iden010.php?tipo_usu=P"> 
                                    <input type="hidden" name="tipo_usu" value="P">
                                    <input type="hidden" name="RETORNO" value=" ">
                                    <input type="hidden" name="sitio" value="SI" id="sitio">

                                    <table class="login" border="0" cellspacing="0">
                                        <tbody><tr>
                                                <td colspan="2" align="right"><img src="../archivos/imagenes/identificacion.png" alt="Identificacin de Usuario" title="Identificacin de Usuario"></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><p>Usuario:</p></td>
                                                <td><p><input name="usuario" type="text" id="usuario" class="datos" onkeyup="if (this.value.length >= 8)
                    document.sistema.cuit.select()" value="" size="21" maxlength="8"></p></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><p>CUIT:</p></td>
                                                <td><input name="cuit" type="text" class="cuit1" onkeyup="if (this.value.length >= 2)
                    document.sistema.cuit2.focus()" value="" maxlength="2"><input name="cuit2" type="text" class="cuit2" onselect="MM_validateForm();
                            return document.MM_returnValue" onkeyup="if (this.value.length >= 8)
                                        document.sistema.cuit3.select()" value="" maxlength="8"><input name="cuit3" type="text" class="cuit3" onkeyup="if (this.value.length >= 1)
                                                    document.sistema.password.select()" value="" maxlength="1"></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><p>Contraseña:</p></td>
                                                <td><input name="password" type="password" id="password" class="datos" value="" size="21" maxlength="8" onkeyup="if (this.value.length >= 8)
                    document.getElementById('ingresar').focus()"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" align="right"><p>&nbsp;</p></td>
                                            </tr>
                                            <tr>
                                                <td align="right" colspan="2"><a id="ingresar" class="button-blue" href="#" onclick="MM_validateForm();
                verifyAndSubmit();"><span>Ingresar</span></a><a class="button-blue" href="login-usuarios.php?tipo_usu=P&amp;reiniciar=S" onclick=""><span>Reestablecer</span></a></td>
                                            </tr>
                                        </tbody></table>
                                </form>  
                            </div><!-- div login -->    

                            <div class="productor">
                                <p>
                                    Sr. usuario ante algún problema de información o mal funcionamiento de la página por favor remitirse a su <a href="/institucional/centros.php" target="_blank">Centro de Atención</a>. </p>
                            </div>      
                            <div style="clear:both"></div>
                        </div>    <!-- -cont -->

                        <!--  Navegacion Segura  -->        
                        <div class="color-box-cont">
                            <div class="partners-box">
                                <h3>Navegación Segura y Privada</h3>
                                <ul class="partnersholder"> 
                                    <li class="partners_pdp"><a href="http://www.jus.gov.ar/dnpdp" title="Direccin Nacional de Proteccin de Datos Personales" target="_blank">Dirección Nacional de Protección de Datos Personales</a></li> 
                                    <li class="partners_thawte"><a href="http://www.thawte.com/" title="Secured by Thawte" target="_blank">Thawte</a></li> 
                                </ul> 

                            </div>
                            <div style="clear:both"></div>
                        </div>
                        <!--  Fin Navegacion Segura  -->    

                        <div class="color-box-bott"></div>
                    </div>
                </div><!-- MAIN -->

                <div id="sidebar2">

                    <div id="ocultar" class="box" style="visibility: visible;">

                        <!--	Solicitud de contrasea - Tiene el diseo viejo
                            <div class="box-top">
                            <img src="../archivos/imagenes/box/solicitar_contrasena.jpg" alt="Solicitar Contrasea" title="Solicitar Contrasea"/>
                            </div>
                        -->    
                        <!-- box-top -->
                        <!--    
                            <div class="box-cont">
                            <p>Si an no posee una contrasea, solictela   					para disponer de los servicios.</p>
                            <a class="button" href="/contenido_prod_clave.htm"><span>Continuar</span></a>
                              <div style="clear:both"></div>
                            </div> 
                        -->    
                        <!-- box-cont -->

                    </div>

                    <!-- box --><!-- box -->

                </div><!-- SIDEBAR2 -->

                <div style="clear:both"></div>
                <div id="content-bott"></div> <!-- content-bott -->
            </div><!-- CONTENT -->



        </div><!-- CONTAINER -->




        <script type="text/javascript">
            Placeholder.init({
                placeholder: "#999"
            });
        </script>
        <script language="javascript">
            MM_showHideLayers('ocultar', '', 'show');
            MM_showHideLayers('ocultar_contacto', '', 'show');
            function mensaje(d, m) {
                if (d == '28' && m == '09') {
                    msgWindow = window.open("http://www.sistemas.segurosrivadavia.com/diaproductor.htm", "displayWindowDiaProductor", "toolbar=no,width=400,height=450,directories=no, status=no,scrollbars=no,resize=yes,menubar=no,titlebar=yes,top=100,left=30");
                }
            }
        </script>
        <div class="extLives">
        </div>
    </body>
</html>