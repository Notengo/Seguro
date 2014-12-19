<head>
    <script src="js/ajax.js" type="text/javascript"></script>
    <script src="js/funcion.js" type="text/javascript"></script>
    <script src="js/funciones.js" type="text/javascript"></script>
</head>

<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
$oMysqlUsuarioCompania = $oMysql->getUsuarioCompaniaActiveRecord();
$oUsuarioCom = new UsuarioCompaniaValueObject();

if($_GET['tipo']=='modificar')
{   
    $_idUsuario = $_GET['idU'];
    $_idCompania= $_GET['idc'];
    $nroPro =$_GET['nroP'];
    $oUsuarioCom->set_idUsuario($_idUsuario);
    $oUsuarioCom->set_idCompania($_idCompania);
    $oUsuarioCom->set_nroProductor($nroPro);
    
    $oUsuarioCom = $oMysqlUsuarioCompania->actualizar($oUsuarioCom);
    //header ("Location:listadoNroProd.php?idU=$_idUsuario");
    ?>
         <head>
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
    </head>
    <body>
    <div class='container'>
        
    <div class="row hads-success">
        <input type="text" value="Se ha Modificado Correctamente" class="form-control">
        <span class="input-icon fui-check-inverted"></span>
    </div>
        
        <br>
        <div class="row">
        <div class="col-lg-2">
        <input type="button" class="form-control btn btn-primary" value="Aceptar" onclick="window.location.href='listadoNroProd.php?idU=<?php echo$_idUsuario?>'">       
        </div>    
        </div>    
    </div>
    </div>    
   </body>
    <?php
}
  elseif ($_GET['tipo']=='eliminar'){
    
    unset($oUsuarioCom);
    $oUsuarioCom2 = new UsuarioCompaniaValueObject();
    $oMysqlUsuarioCompania2 = $oMysql->getUsuarioCompaniaActiveRecord();
      
    $idusuario = $_GET['idu'];
    $idcompania = $_GET['idc'];
    $oUsuarioCom2->set_idUsuario($idusuario);
    $oUsuarioCom2->set_idCompania($idcompania);
    $oMysqlUsuarioCompania2->borrar($oUsuarioCom2);
    ?>
   <head>
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
    </head>
    <body>
    <div class='container'>
        
    <div class="row hads-success">
        <input type="text" value="Se ha Eliminado Correctamente" class="form-control">
        <span class="input-icon fui-check-inverted"></span>
    </div>
        
        <br>
        <div class="row">
        <div class="col-lg-2">
        <input type="button" class="form-control btn btn-primary" value="Aceptar" onclick="window.location.href='listadoNroProd.php?idU=<?php echo$idusuario?>'">       
        </div>    
        </div>    
    </div>
    </div>    
   </body>
   
   
   <?php
} elseif ($_GET['tipo']=='agregar')
 {
  $idrec = $_GET['idusuario'];
  $string = $_GET['listaCompanias'];// id de las companias
  $lista = explode('-', $string);
  $pc="companian";
       foreach ($lista as $ids)
       {    
               if($ids!=0)
               {    
                   $oUsuarioCompania = new UsuarioCompaniaValueObject();
                     $id = "$ids";//id compania
                     $nombre1 = "$pc$id";// armo el nombre del input
                     $nro = $_GET[$nombre1]; //se lo paso a la variable
                     $oUsuarioCompania->set_idUsuario($idrec);
                     $oUsuarioCompania->set_idCompania($id);
                     $oUsuarioCompania->set_nroProductor($nro);
                     
                     //echo $idrec;
                     //echo $id;
                     //echo $nro;
                     $oUsuarioCompania = $oMysqlUsuarioCompania->buscar2($oUsuarioCompania);
                     
                     if($oUsuarioCompania == TRUE)
                        {
                           ?>
                            <head>
                            <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
                            <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
                            <script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
                                    </head>
                                    <body>
                                    <div class='container'>

                                    <div class="row hads-success">
                                        <input type="text" value="La compa&ntilde;ia ya tiene asignado un numero" class="form-control">
                                        <span class="input-icon fui-check-inverted"></span>
                                    </div>

                                        <br>
                                        <div class="row">
                                        <div class="col-lg-2">
                                        <input type="button" class="form-control btn btn-primary" value="Aceptar" onclick="window.location.href='listadoNroProd.php?idU=<?php echo$idrec?>'">       
                                        </div>    
                                        </div>    
                                    </div>
                                    </div>    
                                   </body>
                           <?php
                        }
                        elseif ($oUsuarioCompania==false)                        
                              {
                            unset($oUsuarioCompania);
                            $oUsuarioCompania = new UsuarioCompaniaValueObject();
                            $oUsuarioCompania->set_idUsuario($idrec);
                            $oUsuarioCompania->set_idCompania($id);
                            $oUsuarioCompania->set_nroProductor($nro);
                               $oUsuarioCompania = $oMysqlUsuarioCompania->guardar($oUsuarioCompania);
                               ?>
                                    <head>
                                        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
                                        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
                                        <script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
                                    </head>
                                    <body>
                                    <div class='container'>

                                    <div class="row hads-success">
                                        <input type="text" value="Se ha Asignado el numero <?php echo$nro?> a la Compa&ntilde;ia <?php echo$id?>" class="form-control">
                                        <span class="input-icon fui-check-inverted"></span>
                                    </div>

                                        <br>
                                        <div class="row">
                                        <div class="col-lg-2">
                                        <input type="button" class="form-control btn btn-primary" value="Aceptar" onclick="window.location.href='listadoNroProd.php?idU=<?php echo$idrec?>'">       
                                        </div>    
                                        </div>    
                                    </div>
                                    </div>    
                                   </body>
                               <?php
                               
                             } 
                     
                     
                }
       
       } 
  
}