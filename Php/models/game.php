<?php

class Game{

    private $conn;
    private $table='game';
    
    public $id;
    public $title;
    public $url;


    public function __construct($db) {

        $this->conn = $db;
    
       }

    public function getGames(){

        $query="SELECT * from " . $this->table;

        $stmt=$this->conn->prepare($query);
 
        $stmt->execute();
 
        return $stmt;
    }


    public function addGame($title,$url,$category)
   {
    if($title != null && $url != null)
    $query="INSERT INTO " . $this->table . " (title,url,category) values('" . $title . "','" . $url . "','" . $category . "')";

    $stmt=$this->conn->prepare($query);

    $stmt->execute();

   }

   public function deleteGame($id)
   {
    $query="DELETE FROM " . $this->table . " WHERE id =" . $id;
    $stmt=$this->conn->prepare($query);

    $stmt->execute();
   }

    public function getGameInfo($id){
        $query="SELECT * from " . $this->table . " WHERE id = " . $id;

        $stmt=$this->conn->prepare($query);
 
        $stmt->execute();
 
        return $stmt;

    }

    public function getGamesCategories()
    {
        $query="SELECT DISTINCT category from " . $this->table;

        $stmt=$this->conn->prepare($query);
 
        $stmt->execute();
 
        return $stmt;
    }

}

?>
