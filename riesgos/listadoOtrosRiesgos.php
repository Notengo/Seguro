<?php

require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlRiesgos = $oMysql->getOtrosRiesgosActiveRecord();
$oRiesgos = new OtrosRiesgosValueObject();
$oRiesgos = $oMysqlRiesgos->buscarTodo();
?>

<table class="table table-hover table-condensed table-bordered">
            <tr class="success">
                <th>ID</th><th>NOMBRE</th><th>DESCRIPCION</th><th></th>
            </tr>
            
                <?php
                foreach ($oRiesgos as $aRiesgos)
                {
                    ?>
                <tr>    
                <td><?php echo $aRiesgos->get_idotrosriesgos();?></td>
                <td><?php echo $aRiesgos->get_nombre();?></td>
                <td><?php echo $aRiesgos->get_descripcion();?></td>
                <td>
                    <a href="modificarRiesgos.php?idR=<?php echo $aRiesgos->get_idotrosriesgos()?>&nombrer=<?php echo$aRiesgos->get_nombre()?>&desc=<?php echo$aRiesgos->get_descripcion()?>" class="glyphicon glyphicon-edit" title="Modificar"></a>&nbsp;&nbsp;
                    <a href="accionesRiesgos.php?idR=<?php echo $aRiesgos->get_idotrosriesgos()?>&tipo=delete" class="glyphicon glyphicon-remove text-danger" title="Eliminar"></a>
                </td>
                </tr>
                    <?php
                    
                }
                ?>
                
            
        </table>
