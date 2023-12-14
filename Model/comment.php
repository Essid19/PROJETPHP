<?php
//creation de la classe cmn:
class cmn
{

    public string $texte_cmn;
    public string $nom;




    public function __construct($nom, $texte_cmn)
    {


        $this->nom = $nom;
        $this->texte_cmn = $texte_cmn;
    }
}
