<?php



class Medicament
{

    public string $nom;
    public string $description;
    public float $prix;
    public string $id_catg;
    public int $qte_med;
    public string $img;
    public string $id_ph ;


    public function __construct($nom, $description, $prix, $qte_med , $id_catg ,$img, $id_ph)
    {
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
        $this->qte_med = $qte_med;
        $this->img = $img;
        $this->id_catg = $id_catg;
        $this->id_ph = $id_ph;
    }

    // Méthode pour modifier un médicament
    public function setnom($nom)
    {
        $this->nom = $nom;
    }
    public function setdescription($description)
    {
        $this->description = $description;
    }
    public function setprix($prix)
    {
        $this->prix = $prix;
    }
    public function setqte_med($qte_med)
    {
        $this->qte_med = $qte_med;
    }
    public function setimg($img)
    {
        $this->img = $img;
    }
    // Méthode pour ronvoyer tous les médicaments
    public function getnom()
    {
        return $this->nom;
    }
    public function getdescription()
    {
        return $this->description;
    }
    public function getprix()
    {
        return $this->prix;
    }
    public function getqte_med()
    {
        return $this->qte_med;
    }
    public function getimg()
    {
        return $this->img;
    }
}




class category
{

    public string $nom;
    public int $id_ph; 
    


    public function __construct($nom , $id_ph)



    {
        $this->nom = $nom;
        $this->id_ph =$id_ph;
     
    }

   
}

?>
