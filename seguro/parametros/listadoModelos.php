<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
//require_once '../clases/ActiveRecord/MysqlActiveRecordAbstractFactory.php';

$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlModelo = $oMysql->getModelosActiveRecord();
$oMysqlMarcas = $oMysql->getMarcasActiveRecord();
$oMarcas = new MarcasValueObject();
$oMarcas = $oMysqlMarcas->buscarTodo();
?>
<table class="table table-striped table-bordered table-hover table-responsive">
    <tr>
        <th>Marca</th>
        <th>Modelo</th>
        <th></th>
    </tr>
    <?php
    foreach ($oMarcas as $aMarcas) {
        $oModelo = new ModelosValueObject();
        $oModelo->set_idmarcas($aMarcas->get_idmarcas());
        $oModelo = $oMysqlModelo->buscarPorMarca($oModelo);
        if($oModelo != false){
            foreach ($oModelo as $aModelo) {
            ?>
            <tr>
                <td><?php echo $aMarcas->get_descripcion(); ?></td>
                <td><?php echo $aModelo->get_descripcion(); ?></td>
                <td>
                    <img src="../images/editar.png" alt="" onclick="verModelo(<?php echo $aModelo->get_idmodelos(); ?>, 'e', '<?php echo $aModelo->get_descripcion(); ?>', <?php echo $aModelo->get_idmarcas(); ?>)"/>
                    <img src="../images/borrar.png" alt="" onclick="verModelo(<?php echo $aModelo->get_idmodelos(); ?>, 'b', '<?php echo $aModelo->get_descripcion(); ?>', <?php echo $aModelo->get_idmarcas(); ?>)"/>
                </td>
            </tr>
            <?php
            }
        }
        unset($oModelo);
    }
    ?>
</table>