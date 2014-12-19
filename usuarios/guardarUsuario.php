<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
if(isset($_POST['guardar']))
{ 
$oMysqlUsuario = $oMysql->getUsuarioActiveRecord();
$oUsuario = new UsuarioValueObject();
$oUsuario->set_nombreUser($_POST['usuario']);
$oUsuario->set_pass($_POST['password']);
$oUsuario->setNombreReal($_POST['nombre']);
$oUsuario->set_apellidoReal($_POST['apellido']);

$oUsuario = $oMysqlUsuario->guardar($oUsuario);//guardo el usuario productor

$sql="SELECT MAX(idUsuario) from usuarios";
$valor = mysql_query($sql);
$idusu= mysql_fetch_array($valor);
$idrec = $idusu[0];
$oMysqlUsuarioCompania = $oMysql->getUsuarioCompaniaActiveRecord();


$string = $_POST['listaCompanias'];// id de las companias
$lista = explode('-', $string);
$pc="companian";
       foreach ($lista as $ids)
       {    
               if($ids!=0)
               {    
                   $oUsuarioCompania = new UsuarioCompaniaValueObject();
                     $id = "$ids";//id compania
                     $nombre1 = "$pc$id";// armo el nombre del input
                     $nro = $_POST[$nombre1]; //se lo paso a la variable
                     $oUsuarioCompania->set_idUsuario($idrec);
                     $oUsuarioCompania->set_idCompania($id);
                     $oUsuarioCompania->set_nroProductor($nro);
                     //echo $idrec;
                     //echo $id;
                     //echo $nro;
                     $oUsuarioCompania = $oMysqlUsuarioCompania->guardar($oUsuarioCompania);
                     
                }
       
       }
  ?><html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguro - Productores</title>
        <link type="text/css" href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link type="text/css" href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
        <script src="js/funciones.js" type="text/javascript"></script>
        <script src="js/funcion.js" type="text/javascript"></script>
    </head>
    <body>
<div class="alert alert-info">los datos se guardaron Correctamente</div>
<div class="col-lg-2">
<input type="button" class="form-control btn btn-primary" value="Volver" onclick="window.location.href='index.php'" />
</div>
    </body>
  </html>
<?php
}
else{
     echo "Error ####";   
    }

