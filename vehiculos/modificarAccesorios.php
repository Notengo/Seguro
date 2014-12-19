<?php
 $cliente = $_GET['idc'];
 $vehiculo = $_GET['idv'];
 $accesorio = $_GET['ida'];
 $nombre = $_GET['nom'];
 $valores = $_GET['val'];
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguro - Accesorios</title>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    </head>
        <!-- este es el Modal para dar de alta los accesorios de cada vehiculo, que es llamado desde lisdadoVehiculos-->
        <body>
        <div class="container">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4>Editar Accesorio</h4>
                        </div>
                        <div class="modal-body">
                            <form action="accionesAccesorios.php" method="post">  
                            <div class="row">
                                <div class="row">
                                <div class="col-lg-8">
                                    <input type="hidden" name="idUsu" value="<?php echo $cliente;?>"/>
                                    <input type="hidden" name="idVehiculo" value="<?php echo $vehiculo;?>"/>
                                    <input type="hidden" name="idAccesorio" value="<?php echo $accesorio;?>"/>
                                  <label class="label label-success">Nombre</label>
                                  <input class="form-control" type="text" name="nombreA" value="<?php echo $nombre;?>"/>  
                                </div>
                                </div>
                                <br>
                                <div class='row'>
                                <div class="col-lg-4">
                                  <label class="label-success label">Valor</label>
                                  <input class="form-control" type="text" name="valorA" value="<?php echo $valores;?>"/>     
                                </div>
                                </div> 
                           </div>
                           <br>
                          <div class='row'>      
                          <div class='col-lg-2'>
                          <input type="submit" class="form-control btn btn-primary" value="Editar" name="edit"/>
                          </div>
                          <div class='col-lg-2'>
                              <button type="button" class=" form-control btn btn-primary" onclick="window.history.back();">Cancelar</button>
                          </div>   
                         </div>
                       </form>

                        </div>
                        
                    
                
            </div>
         <script src="../bootstrap/js/jquery.min.js"></script>
   <script src="../bootstrap/js/bootstrap.min.js"></script>
   </body>
   </html>