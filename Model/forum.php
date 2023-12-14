<?php
//creation de la classe cmn:
class frm
{

    public string $auteur;
    public string $titre;
    public string $img;
    public string $date;
    public string $texte_forum;
    public string $user_id;



    public function __construct($auteur, $titre, $img, $texte_forum, $user_id)
    {


        $this->auteur = $auteur;
        $this->titre = $titre;
        $this->img = $img;
        $this->texte_forum = $texte_forum;
        $this->user_id = $user_id;
    }
}
//class comment

class cmn
{
    public string $auteur;
    public string $texte_cmn;
    public string $id_forum;
    public string $user_id;




    public function __construct($auteur, $texte_cmn, $id_forum, $user_id)
    {


        $this->auteur = $auteur;
        $this->texte_cmn = $texte_cmn;
        $this->id_forum = $id_forum;
        $this->user_id = $user_id;
    }
}

//class likes
class like{
    public int $id_likes;
    public int $id_forum;
    public int $user_id;

    public function __construct($id_forum, $user_id)
    {
        $this->id_forum = $id_forum;
        $this->user_id = $user_id;
    }
}
//class dislikes
class dislike{
    public int $id_dislikes;
    public int $id_forum;
    public int $user_id;

    public function __construct($id_forum, $user_id)
    {
        $this->id_forum = $id_forum;
        $this->user_id = $user_id;
    }
}