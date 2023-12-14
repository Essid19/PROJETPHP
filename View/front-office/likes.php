<?php include 'includes/navbar.php' ?>

<?php
include '../../Controller/forumC.php';
include '../../Model/forum.php';


if (isset($_GET['btn_like'])) {
    //$user_id = $_GET['user_id'];
    $user_id = $_SESSION['user_id'];
    $id_forum = $_GET['id_forum'];
    $likeC = new likeC();
    //verifier si user a fait un like si nn on l'ajoute 
    if (!$likeC->userHasLiked($id_forum, $user_id)) {

        $like = new like($id_forum, $user_id);

        $likeC->addLike($like);
    } else {
        $likeC->removeLike($id_forum, $user_id);
    }

    $url = 'showForum.php';
    header('Location:' . $url);

    exit();
} else if (isset($_GET['btn_dislike'])) {
    //$user_id = $_GET['user_id'];
    $user_id = $_SESSION['user_id'];
    $id_forum = $_GET['id_forum'];
    $dislikeC = new dislikeC();
    //verifier si user a fait un like si nn on l'ajoute 
    if (!$dislikeC->userHasdisLiked($id_forum, $user_id)) {

        $dislike = new dislike($id_forum, $user_id);

        $dislikeC->adddisLike($dislike);
    } else {
        $dislikeC->removedisLike($id_forum, $user_id);
    }

    $url = 'showForum.php';
    header('Location:' . $url);

    exit();
}



?>