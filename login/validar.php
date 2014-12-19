<?php

session_start();
if ($_SESSION['idsesion'] != session_id()) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/php/logout.php';
}