<?php
include '../../Controller/commandeC.php';
include '../../Controller/config.php';
$CmdC = new CmdC();
$CmdC->deleteCmd($_GET["id_cmd"]);
