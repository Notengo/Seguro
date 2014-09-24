<?php
require_once '../includes/php/header.php';


?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguro - Planilla</title>
        <link type="text/css" href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link type="text/css" href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
        <input type="button" name="pdf" id="pdf" class="btn-danger btn" value="Planilla Diaria" onclick="window.location.href='plantillapdf.php'" />
        </div>
    </body>
</html>


