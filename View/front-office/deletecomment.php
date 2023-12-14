<?php

include '../../Controller/forumC.php' ; 
include '../../Model/forum.php' ;

$id_cmn = $_GET['id_cmn'];
$id_forum = $_GET['id_forum'];
$delcmn = new cmnC();
$delcmn->deleteCmn($id_cmn);
$url = 'commenter.php?id_forum=' . $id_forum;
header('Location:' . $url);
