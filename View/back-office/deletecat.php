<?php
include '../../Controller/config.php';
include('../../Controller/drugsC.php');
include('../../Model/drugs.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $c = new qtc();
    $c->deletecategory($id);
}

header("Location:drugs_category.php");
