<?php

//REGISTER
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

public function register($login, $password, $email, $firstname, $lastname){
    $bdd = mysqli_connect("localhost", "root", "", "classes");
    $requete=" INSERT INTO utilisateurs (login, password, email, firstname, lastname)
    VALUES(' " .$login. "', '" .$password. "', '" .$email. "', '" .$firstname. "', '" .$lastname. "');";
    $result = mysqli_query($bdd, $requete); 
    return $result;
}


//CONNECT


public function connect($login, $password){
    session_start();
    $bdd = mysqli_connect("localhost", "root", "", "classes");
    $requete="SELECT login, password FROM `utilisateurs` WHERE `login` = '$login' and `password`= '$password'";
    $result = mysqli_query($bdd, $requete);
    $userexist =  mysqli_fetch_row($result);


          
            if($userexist>=1)
            {
            
              $user = mysqli_fetch_assoc($result);

              $this->id = $user['id'];
              $this->login = $user['login'];
              $this->password = $user['password'];
              $this->email = $user['email'];
              $this->firstname = $user['firstname'];
              $this->lastname = $user['lastname'];
              return 'ok';
            }
            
            else
            {   
                  return 'ERREUR';
            }
    }



/*
//DISCONNECT

public function disconnect(){
  
    session_destroy();
    
    return true;
}


//DELETE

public function delete(){

    $bdd = mysqli_connect("localhost", "root", "", "classes");
    $requete="DELETE FROM `utilisateurs` WHERE `id` = '".$this->id."';";
    $result = mysqli_query($bdd, $requete);

    $this->id = NULL;
    $this->login = NULL;
    $this->password = NULL;
    $this->email = NULL;
    $this->firstname = NULL;
    $this->lastname = NULL;

    session_destroy();
    return $result;
}
*/

//UPDATE

public function update($login, $password, $email, $firstname, $lastname){

    $bdd = mysqli_connect("localhost", "root", "", "classes");    
    $requete = "UPDATE utilisateurs SET login = '".$login."', password = '".$password."', email = '".$email."', firstname = '".$firstname."', lastname = '".$lastname."' WHERE id ='".$this->id."' ";
    $result = mysqli_query($bdd, $requete);

    return $result;

}



//IS CONNECTED
public function isConnected(){
if (isset($this->id)){
    return 1;
}
else{
    return 0;
}

}


//GETALLINFOS

public function getAllInfos(){
    return $this;
}


//GETLOGIN

public function getLogin(){
    return $this->login;
}



//GET EMAIL

public function getEmail(){
    return $this->email;
}




//GETFIRSTNAME

public function getFirstname(){
    return $this->firstname;
}




//GETLASTNAME

public function getLastname(){
    return $this->lastname;
}




//REFRESH


public function refresh(){
    $bdd = mysqli_connect("localhost", "root", "", "classes");
    $requete="SELECT * FROM `utilisateurs` WHERE `id` = '".$this->id."' ";
    $result = mysqli_query($bdd, $requete);

    $user = mysqli_fetch_assoc($result);

        $this->id = $user['id'];
        $this->login = $user['login'];
        $this->password = $user['password'];
        $this->email = $user['email'];
        $this->firstname = $user['firstname'];
        $this->lastname = $user['lastname'];
return $result;
         


}

}

$mimi = new user('mimi', 'mimi', 'mimi@gmail.com', 'mimi', 'mimi');
$mimi->register('mimi', 'mimi', 'mimi@gmail.com', 'mimi', 'mimi');
var_dump($mimi->connect('mimi', 'mimi'));

$mimi->update('mimi', 'mimi', 'mimi3@gmail.com', 'mimi', 'Mimi');
var_dump($mimi->update('mimi', 'mimi', 'mimi3@gmail.com', 'mimi', 'Mimi'));

var_dump($mimi->refresh());

?>