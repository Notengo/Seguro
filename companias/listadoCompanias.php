<?php

include_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlCompania = $oMysql->getCompaniaActiveRecord();
$oCompania = new CompaniasValueObject();
$oCompania = $oMysqlCompania->buscarTodo();

?>

<html>
    <head>
        
    </head>
    <body>
        <?php include_once '../includes/php/header.php';?>
        <div class="container">
            <table class="table tab-pane tab">
                <tr class="success">
                    <th>id</th><th>Razon Social</th><th>Productor</th><th>CUIT</th><th>Telefono</th><th></th>
                </tr>
                <tr>
                    <?php 
                    $table="";
                    foreach ($oCompania as $aCompania)
                    {
                     ?>
                <tr>
                    <td><?php echo $aCompania->get_idcompanias();?></td>
                    <td><?php echo $aCompania->get_razonsocial();?></td>
                    <td><?php echo $aCompania->get_nroproductor();?></td>
                    <td><?php echo $aCompania->get_cuit();?></td>
                    <td><?php echo $aCompania->get_telefono();?></td>
                    <td><a href="accionesCompanias.php?idc=<?php echo $aCompania->get_idcompanias();?>" class="glyphicon glyphicon-remove text-danger" title="Eliminar"></a></td>
                </tr>
                    <?php
                    }
                    ?>
                </tr>
                
            </table>
        </div>
    </body>
</html>