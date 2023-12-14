<?php
include '../../Controller/config.php';
include '../../Controller/appoinmentC.php';
include '../../Controller/config.php';

if (isset($_GET['id_rdv']) && is_numeric($_GET['id_rdv'])) {
    $id = $_GET['id_rdv'];
    $c = new apppoinementC();
    $c->deleteRDV($id);
}

header("Location:appoinements.php");
