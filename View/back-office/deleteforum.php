<?php
include '../../Controller/forumC.php';
include '../../Model/forum.php';
$id_forum = $_GET['id_forum'];
$delforum = new frmC();
$deleted = $delforum->deleteForum($id_forum);
$url = 'forums.php';
header('Location:' . $url);
