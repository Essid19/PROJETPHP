<?php

class user
{


    public string $nom;
    public string $prenom;
    public string $email;
    public ?string  $specialite;
    public ?string  $experience;
    public  string  $pwd;
    public ?string  $img;
    public ?string $adresse;
    public  string  $role;



    public function pateint($nom, $prenom, $email, $pwd, $role)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->role = $role;
    }
    public function pharmacy($nom, $prenom, $email, $pwd, $role, $adresse)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->role = $role;
        $this->adresse = $adresse;
    }
    public function doctor($nom, $prenom, $email, $pwd, $adresse, $specialite, $experience, $img, $role)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->specialite = $specialite;
        $this->experience = $experience;
        $this->img = $img;
        $this->role = $role;
        $this->adresse = $adresse;
    }
    public function admin($nom, $prenom, $email, $pwd,  $role)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->role = $role;
    }
}
