<?php
//include_once '../login/validar.php';

require_once '../clases/ValueObject/CompaniasValueObject.php';

require_once '../clases/ActiveRecord/MysqlCompaniasActiveRecord.php';

require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';

require_once '../clases/ActiveRecord/MysqlActiveRecordAbstractFactory.php';

$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);

$oMysql->conectar();

$oCompania = new MysqlCompaniasActiveRecord();

$valores = new CompaniasValueObject();

$valores = $oCompania->buscarTodo();
?>
<html>

    <head>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Seguro - Planillas</title>

        <link type="text/css" href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>

        <link type="text/css" href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>

        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
        
        <script src="../clientes/js/funciones.js" type="text/javascript"></script>

    </head>

    <body>

        <?php require_once '../includes/php/header.php'; ?>

        <div class="container">
            
            <legend>Planilla diaria</legend>

            <form action="vistaPreviaPlanilla.php" method="post">

                <input type="hidden" name="usuarioC" value="<?php echo $_SESSION['usuario']; ?>"/>

                <input type="hidden" name="nroP" value="<?php echo $_SESSION['nroProductor']; ?>"/>

                <div class="row">

                    <div class="col-lg-4">

                        <label class="label label-success">Compañia</label>
                        
                        <?php 
                        
                        include_once './selectCompania.php';
                        
                        ?>

                    </div>

                    <div class="col-lg-4">
                    
                        <label class="label label-success">Productor</label>
                        
                        <?php

                        include_once './selectUsuario.php';
                        
                        ?>
                    
                    </div>
                    
                    <div class="col-lg-4">
                    
                        <label class="label label-success">N&ordm; Productor</label>
                        
                        <div id="nroproductor">
                            
                            <select class="form-control" disabled="" id="productornro">

                                <option>Selecione</option>

                            </select>
                        
                        </div>
                        
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
    
            <br>
            
            <br>

        </div>

    </body>
    
    <script src="../bootstrap/js/jquery.min.js" type="text/javascript"></script>
    
    <script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
    <script>
        function buscanro() {
            
            var divResultado = document.getElementById('nroproductor'),
            
                compania = document.getElementById('compania').value,

                productor = document.getElementById('usuario').value;
    
            ajax = objetoAjax();
            
            ajax.open("POST", "buscarNroProductor.php", true);
            
            ajax.onreadystatechange = function() {
                if (ajax.readyState === 4) {
                    
                    divResultado.innerHTML = ajax.responseText;
                    
                }
            
            };
        
            ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            ajax.send("compania=" + compania + "&productor=" + productor);
        }
    </script>

</html>