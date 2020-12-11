<?php
class Ipdo
{
    private $host;
    private $db;
    private $username;
    private $password;
    private $connection;
    private $query;
    private $userinfo;
    private $table;
    private $req;
    private $result;
  

 public function constructeur($host = "localhost", $username = "root", $password = "", $db = "discussion"){

       
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->db= $db;
        $this->query;
        $this->userinfo;
        $this->table;
        $this->req;
        $this->result;
        $this->connection = new mysqli($host, $username, $password, $db);

        return $this->connection;
    }


public function connect($host, $username, $password, $dbname){
        if(isset ($this->connection))
        {
            $this->__destruct();
        }
          return $this->connection;
    }

public function close(){
       $this->connection->close();
       return true;
    }

public function __destruct()
    {
        $this->db = null;
        return true;
    }

public function execute($query){
        $this->req = $this->connection->prepare($query);
        $this->req->execute();
        $this->result = $this->req->fetch();
        return $this->result;
    }
  

public function getLastQuery(){
    if (isset($this->req)){
    return $this->req;
    }
    else
    {
    return false;
    }
}
     
public function getLastresult(){
    
    if ($this->result){
        return $this->result;
        }
        else
        {
        return false;
        }
}

public function getTables(){
    
    $result = mysqli_query($this->connection, 'SHOW TABLES');
    $this->table = $this->req->fetch();
    return  $this->table;
}



public function getFields($table){
    $result = $this->db->query('SELECT * FROM utilisateurs');
    $this->table = $this->req->fetch();
    return  $this->table;
}

}

echo '<pre>';
$mysqli = new Ipdo();
echo '<pre>';

echo '<pre>';
var_dump($mysqli->constructeur("localhost", "root", "", "discussion"));
echo '<pre>';                    

echo '<pre>';
var_dump($mysqli->connect("localhost", "root", "", "discussion"));
echo '<pre>';

//var_dump($mysqli->close());
//echo '<pre>';

//var_dump($mysqli-> __destruct());
//echo '<pre>';

echo '<pre>';
var_dump($mysqli->execute('SELECT * from utilisateurs'));
echo '<pre>';

echo '<pre>';
var_dump($mysqli->getLastQuery());
echo '<pre>';

echo '<pre>';
var_dump($mysqli->getLastresult());
echo '</pre>';

echo '</pre>';
var_dump($mysqli->getTables());
echo '<pre>';

echo '<pre>';
var_dump($mysqli->getFields('utilisateurs'));
echo '<pre>';

echo '<pre>';
var_dump($mysqli);
echo '<pre>';
?>


