<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../includes/php/header.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguro - Poliza - Cuotas</title>
        <link type="text/css" href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link type="text/css" href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="../includes/js/funciones.js"></script>
    </head>
    <body>
    
        <div class="container">
            <legend>Cuotas de Poliza</legend>
            <table class="table table-striped table-bordered table-hover tab-pane table-condensed">
                <tr><th>N&ordm; de Poliza</th><th>1&ordf; vencimiento</th><th>pagado</th><th>Monto</th><th>N&ordm; Cuota</th><th>Acciones</th></tr>
               <tr>

               </tr>
           </table>
           <div class="form-group">
                    <div class="col-sm-2">
                        <input type="button" id="volver" value="Volver" class="btn btn-large btn-block btn-primary " onclick="window.history.back();" />
                    </div>
                    <div class="col-sm-8" id="divResultado"></div>
                </div> 
            
        </div>
    </body>    
    
</html>
<?php
include_once '../includes/php/footer.php';
?>