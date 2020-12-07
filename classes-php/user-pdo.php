<?php

$bdd = new PDO('mysql:host=localhost;dbname=classes', 'root', '');

class user{
    public $login = " " ;
    public $password = " " ;
    public $email = " " ;
    public $firstname = " " ;
    public $lastname = " " ;
}

public function register($login, $password, $email, $firstname, $lastname){
    $this->login = $login;
    $this->password = $password;
    $this->email = $email;
    $this->firstname = $firstname;
    $this->lastname = $lastname;

    $requete= $bdd->prepare("SELECT utilisateurs(login, password, email, firstname, lastname) VALUES(?, ?, ?, ?, ?)");
    $requete->execute(array($login, $password, $email, $firstname, $lastname));
}
?>