<?php

class User_tournament{

    private $conn;
    private $table='user_tournament';
    
    public $id;
    public $user_id;
    public $tournament_id;
    public $user_team_name;
    public $user_ign;
    public $user_rank;
    public $user_phone_number;
    public $score;


    public function __construct($db) {

        $this->conn = $db;
    
       }

    public function getTournamentTeams($tournament_id){

        $query="SELECT * from " . $this->table . " WHERE tournament_id = " . $tournament_id . " ORDER BY 8 DESC";

        $stmt=$this->conn->prepare($query);
 
        $stmt->execute();
 
        return $stmt;
    }
   
    public function exists($user_id,$tournament_id)
    {
        $query="SELECT * FROM " . $this->table . " WHERE user_id =" . $user_id . " AND tournament_id = " . $tournament_id;

        $stmt=$this->conn->prepare($query);
    
        $stmt->execute();

        return $stmt;
    }

    public function addTournamentTeam($user_id,$tournament_id,$user_team_name,$user_ign,$user_rank,$user_phone_number,$score)
   {
    
    $query="INSERT INTO " . $this->table . " (user_id,tournament_id,user_team_name,user_ign,user_rank,user_phone_number,score) values('{$user_id}','{$tournament_id}','{$user_team_name}','{$user_ign}','{$user_rank}','{$user_phone_number}','{$score}')";

    $stmt=$this->conn->prepare($query);

    $stmt->execute();

   }

}

?>
