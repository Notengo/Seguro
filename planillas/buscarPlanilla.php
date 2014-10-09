<?php
require_once '../includes/php/header.php';

require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
require_once '../clases/ActiveRecord/MysqlActiveRecordAbstractFactory.php';

$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlPlanilla = $oMysql->getPlanillaActiveRecord();
$oPlanilla = new PlanillasValueObject();
$fecha=null;
$idcompania=null;
$bandera=0;

if(isset($_POST['busca']))
{
    if ($_POST['fecha1']=="" || $_POST['compania']==""){
        echo"<div class='alert alert-danger'>ERROR falta seleccionar algun parametro</div>";
        }else{
                $fecha=$_POST['fecha1'];
                $idcompania=$_POST['compania'];
                $bandera=1;
             }
}

$oPlanilla->set_fecha($fecha);
$oPlanilla->set_idCompania($idcompania);
$oPlanilla= $oMysqlPlanilla->buscar($oPlanilla);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguro - Planillas</title>
        <link type="text/css" href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link type="text/css" href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
        
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <legend>Busqueda de Fecha</legend>
        <div class="row">
            <form action="buscarPlanilla.php" method="post">
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <label class="label label-info">compa&ntilde;ia a buscar</label>    
            <?php include_once './selectCompania.php';?>     
            </div>
            <div class="col-lg-4">
                <label class="label label-info">fecha a buscar</label>
                <input type="date" name="fecha1" id="fecha1" class="form-control"/>   
            </div>
            <div class="col-lg-1">
                <input type="submit" name="busca" id="busca" value="Buscar" class="form-control"/>
                    </div>
            </form>
        </div>
        <br>
        <table class="table">
            <tr class="success"><th>ID Planilla</th><th>ID Compa&ntilde;ia</th><th>Fecha</th><th>N&ordm; Planilla</th><th>Acciones</th></tr>   
        <?php 
        
        if($bandera==1)
        { 
             foreach ($oPlanilla as $aPlanilla)
            {
                 $idP = $aPlanilla->get_idPlanilla();
                 $idC = $aPlanilla->get_idCompania();
                 $_fecha = $aPlanilla->get_fecha();
                 $nro = $aPlanilla->get_nroPlanilla();
                    $MysqlCompania = $oMysql->getCompaniaActiveRecord();
                    $oCompania = new CompaniasValueObject();
                    $oCompania = $MysqlCompania->buscarC($idC);

                    foreach ($oCompania as $aCompania) {
                        $nombreC = $aCompania->get_razonsocial();
                        
                    }
                echo"<tr><td>$idP</td>";
                echo "<td>$nombreC</td>";
                echo "<td>$_fecha</td>";
                echo "<td>$nro</td>";
                echo "<td><a href='vistaPreviaPlanillaBusqueda.php?idCompania=$idC&idPlanilla=$idP&nroPlanilla=$nro'><img src='../images/Original Size/note.png' alt='Ver Planilla' title='Ver Planilla'/></a></td></tr>";
            }
        }  
        ?>
        </table>
        </div>

    </body>
    <script src="../bootstrap/js/jquery.min.js" type="text/javascript"></script>
    <script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
</html>
