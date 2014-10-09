<?php
// seguridad por referencia de script
session_start();
if($_SESSION['idsesion']!=session_id())
{
  require_once $_SERVER['DOCUMENT_ROOT'].'/seguro/includes/php/logout.php';
}
?>