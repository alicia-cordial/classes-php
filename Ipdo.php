<?php
class Ipdo
{
    private $host;
    private $db;
    private $username;
    private $password;
    private $connection;
  

 public function constructeur($host = "localhost", $username = "root", $password = "", $db = "discussion"){

       
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->db= $db;
        $connection = mysqli_connect($this->host, $this->username, $this->password, $this->db);
        $this->connection = $connection;
        return $this->connection;
    }


function connect($host, $username, $password, $db){
        if(isset ($this->connection))
        {
            $this->destructeur();
        }
        return $this->connection;
    }

function close(){
    if(isset($this->connection)){
        mysqli_close($this->connection);
    }
    }

function destructeur()
    {
        if(isset($this->connection)){
            $this->db = null;
            return true;
        }
       
    }

function execute($query){
    $req = mysqli_query($this->connection, $query);
    $this->lastquery = $query;
    $this->lastresult= mysqli_fetch_all($req, MYSQLI_ASSOC);
    return [$this->lastresult]; 
    }
   
  

function getLastQuery(){
    if(isset($this->lastquery)){
        return $this->lastquery;
    }
    else{
        return false;
    }
}
   
function getLastresult(){
    if(isset($this->lastresult)){
        return $this->lastresult;
    }
    else{
        return false;
    }
    }




function getTables(){
    
    $result = mysqli_query($this->connection, 'SHOW TABLES');
    $this->showtable = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $this->showtable;
    }




function getFields($table){
    $result = mysqli_query($this->connection, 'SHOW COLUMN FIELDS');
    $this->table = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return  $this->table;
    
}


}


echo '<pre>';
$mysqli = new Ipdo("localhost", "root", "root", "discussion");
echo '<pre>';

echo '<pre>';
var_dump($mysqli->constructeur("localhost", "root", "", "discussion"));
echo '<pre>';                    

echo '<pre>';
var_dump($mysqli->connect("localhost", "root", "", "discussion"));
echo '<pre>';

//var_dump($mysqli->close());
//echo '<pre>';

//var_dump($mysqli->destructeur());
echo '<pre>';

echo '<pre>';
var_dump($mysqli->execute('SELECT * from utilisateurs'));
echo '<pre>';

echo '<pre>';
var_dump($mysqli->getLastQuery());
echo '<pre>';

echo '<pre>';
var_dump($mysqli->getlastresult());
echo '</pre>';

echo '</pre>';
var_dump($mysqli->getTables());
echo '<pre>';

echo '<pre>';
var_dump($mysqli->getFields('utilisateurs'));//NULL
echo '<pre>';

echo '<pre>';
var_dump($mysqli);
echo '<pre>';


?>


