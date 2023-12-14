<?php
include('../../Controller/drugsC.php');
include('../../Model/drugs.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $c = new MedicamentC();
    $c->deleteMedicament($id);
}

header("Location:drugs.php");






?>