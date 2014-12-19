<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
$oMysqlUsuarios = $oMysql->getUsuarioActiveRecord();
$oUsuario = new UsuarioValueObject();
$oUsuario = $oMysqlUsuarios->buscarTodo();
?>

  
        <div  class='container'>
            <table class="table table-condensed table-hover">
                <tr class="succes"><th>ID</th><th>Nombre</th><th>Apellido</th><th></th></tr>
            <?php 
            foreach ($oUsuario as $aUsuario)
            { $idusuario = $aUsuario->get_idUsuario();
              $nombre = $aUsuario->getNombreReal();
              $apellido = $aUsuario->get_apellidoReal();
            ?>
            <tr>
                <td><?php echo $aUsuario->get_idUsuario()?></td>
                <td><?php echo $aUsuario->getNombreReal()?></td>
                <td><?php echo $aUsuario->get_apellidoReal()?></td>
                
                <td>
                    <a class="glyphicon glyphicon-user text-success"href="listadoNroProd.php?idU=<?php echo$idusuario?>" title="Nº Productor"></a>&nbsp;&nbsp;
                    <a class="glyphicon glyphicon-edit"href="modificarUsuarios.php?tipo=modi&idu=<?php echo$idusuario;?>&nombreu=<?php echo$nombre;?>&apellidou=<?php echo$apellido;?>" title="Modificar"></a>&nbsp;&nbsp;
                    <a class="glyphicon glyphicon-remove text-danger" href="accionesUsuarios.php?tipo=eliminar&eliminado=<?php echo$idusuario;?>" title="Emilinar"></a>
                    </td>
            </tr>
            <?php
            }
            ?>
        </table>
        </div>    


