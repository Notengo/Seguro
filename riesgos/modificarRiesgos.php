<?php
if(isset($_GET))
{ 
    $idriesgo = $_GET['idR'];
    $nombreR = $_GET['nombrer'];
    $descripcion = $_GET['desc'];
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguro - Otros Riesgos</title>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    </head>
        <!-- este es el Modal para dar de alta los accesorios de cada vehiculo, que es llamado desde lisdadoVehiculos-->
        <body>
        <div class="container">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4>Editar Riesgo</h4>
                        </div>
                        <div class="modal-body">
                            <form action="accionesRiesgos.php" method="get">  
                            <div class="row">
                                <div class="row">
                                <div class="col-lg-8">
                                    <input type="hidden" name="tipo" value="edit"/>
                                    <input type="hidden" name="idR" value="<?php echo $idriesgo;?>"/>
                                    <input type="hidden" name="nombrer" value="<?php echo $nombreR;?>"/>
                                    <input type="hidden" name="descripcion" value="<?php echo $descripcion;?>"/>
                                  <label class="label label-success">Nombre</label>
                                  <input class="form-control" type="text" name="nombreR" value="<?php echo $nombreR;?>"/>  
                                </div>
                                </div>
                                <br>
                                <div class='row'>
                                <div class="col-lg-4">
                                  <label class="label-success label">Descripcion</label>
                                  <input class="form-control" type="text" name="descr" value="<?php echo $descripcion;?>"/>     
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
<?php }
        else{echo 'NOOO';}
?>
   </body>
   </html>