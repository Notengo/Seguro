<?php
$filtro = $_GET['idv'];
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlAccesorio = $oMysql->getAccesoriosActiveRecord();
$oAccesorio = new AccesoriosValueObject();

if (!isset($filtro)) {
    $oAccesorio = $oMysqlAccesorio->buscarTodo();
} else {
    $oAccesorio->set_idVehiculos($filtro);
    $oAccesorio = $oMysqlAccesorio->buscar($oAccesorio);
}

if($oAccesorio)
{
?>
<table class="table table-striped table-bordered table-hover table-responsive">
    <tr class="success">
        <th>ID Vehiculo</th>
        <th>Accesorio</th>
        <th>Valor</th>
        <th></th>
    </tr>
    <?php
    $tipodelete="delete";
    foreach ($oAccesorio as $aAccesorio) {
        ?>
        <tr>
            <td><?php echo $aAccesorio->get_idVehiculos(); ?></td>
            <td><?php echo $aAccesorio->get_nombreA(); ?></td>
            <td><?php echo $aAccesorio->get_valor(); ?></td>
            <td>
                <a href="" class="glyphicon glyphicon-edit" title="Editar" data-toggle="modal" data-target="#miventana2"></a>
                <a href="guardarAccesorios.php?idv=<?php echo $aAccesorio->get_idVehiculos();?>&ida=<?php echo $aAccesorio->get_idAccesorios();?>&tipo=delete&idc=$cliente" class="glyphicon glyphicon-remove text-danger" title="Eliminar"></a>
            </td>
        </tr>
        <?php
      
      }
}else{
        ?>
        <div class="alert alert-info">Este vehiculo no tiene Accesorios asignados</div>
        <?php
     }
    ?>
</table>
