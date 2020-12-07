<?php


class user{
    private $id ;
    public $login ;
    public $password;
    public $email ;
    public $firstname ;
    public $lastname ;


public function __construct($login, $password, $email, $firstname, $lastname){
    $this->login = $login;
    $this->password = $password;
    $this->email = $email;
    $this->firstname = $firstname;
    $this->lastname = $lastname;
} 
//REGISTER
public function register($login, $password, $email, $firstname, $lastname){
    $bdd = mysqli_connect("localhost", "root", "", "classes");
    $requete=" INSERT INTO utilisateurs (login, password, email, firstname, lastname)
    VALUES(' " .$login. "', '" .$password. "', '" .$email. "', '" .$firstname. "', '" .$lastname. "');";
    $result = mysqli_query($bdd, $requete); 
 
}
}

$alicia = new user('alicia', 'lala', 'alicia@gmail.com', 'ali', 'coco');
$alicia->register('alicia', 'lala', 'alicia@gmail.com', 'ali', 'coco');
var_dump($alicia);

?>