<?php
include '../../Controller/config.php';
include '../../Controller/usersC.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $c = new usersC();
    $c->deleteuser($id);
}

header("Location:doctors.php");
