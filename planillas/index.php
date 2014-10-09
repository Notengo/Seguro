<?php
include_once '../login/validar.php';
require_once '../includes/php/header.php';
require_once '../clases/ValueObject/CompaniasValueObject.php';
require_once '../clases/ActiveRecord/MysqlCompaniasActiveRecord.php';


$oCompania = new MysqlCompaniasActiveRecord();
$valores = new CompaniasValueObject();
$valores = $oCompania->buscarTodo();

//var_dump($valores);
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

            <form action="vistaPreviaPlanilla.php" method="post">
                <input type="hidden" name="usuarioC" value="<?php echo $_SESSION['usuario']; ?>"/>
                <input type="hidden" name="nroP" value="<?php echo $_SESSION['nroProductor']; ?>"/>
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <?php
                        include_once './selectCompania.php';
                        ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-5"></div>
                    <div class="col-lg-4">
                        <input type="submit" name="generar" id="pdf" class="btn-danger btn" value="Generar Planilla" />
                        
                    </div>    
                </div>
            </form>
            <br><br>
            
        </div>

    </body>
    <script src="../bootstrap/js/jquery.min.js" type="text/javascript"></script>
    <script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
    
</html>




