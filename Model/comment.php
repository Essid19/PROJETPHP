<?php
//creation de la classe cmn:
class cmn
{
    public string $texte_cmn;
    public string $nom;
    public string $prenom;
    public string $email;
    public string $id_cmn;

    public function __construct($nom, $prenom, $email, $texte_cmn)
    {

        //$this->date_cmn = $date_cmn;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->texte_cmn = $texte_cmn;
    }
    //methode pour modifier les valeurs des attributs pour la classe cmn
    public function setCmn($texte_cmn)
    {
        $this->texte_cmn = $texte_cmn;
    }


    public function setnom($nom)
    {
        $this->nom = $nom;
    }
    public function setprenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function setemail($email)
    {
        $this->email = $email;
    }
    //methode pour renvoyer les valeurs des attributs pour la classe cmn
    public function getCmn()
    {
        return $this->texte_cmn;
    }

    public function getnom()
    {
        return $this->nom;
    }
    public function getprenom()
    {
        return $this->prenom;
    }
    public function getemail()
    {
        return $this->email;
    }
}
