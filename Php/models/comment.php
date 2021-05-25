<?php

class Comment{

    private $conn;
    private $table='review';
    
    public $id;
    public $game_id;
    public $user_id;
    public $rating;
    public $comment;


    public function __construct($db) {

        $this->conn = $db;
    
    }
    
    public function addComment($game_id,$user_id,$rating,$comment)
   {
    if($game_id != null && $user_id != null && $rating != null && $comment != null)
    $query="INSERT INTO " . $this->table . " (game_id,user_id,rating,comment) values('" . $game_id . "','" . $user_id . "','" . $rating . "','" . $comment  . "')";

    $stmt=$this->conn->prepare($query);

    $stmt->execute();

   }

}

?>
