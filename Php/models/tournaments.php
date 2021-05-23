<?php

class Tournament{

    private $conn;
    private $table='tournaments';
    
    public $id;
    public $name;
    public $email;
    public $phone;
    public $organizer;
    public $begin_date;
    public $end_date;


    public function __construct($db) {

        $this->conn = $db;
    
       }

    public function getTournaments(){

        $query="SELECT * from " . $this->table;

        $stmt=$this->conn->prepare($query);
 
        $stmt->execute();
 
        return $stmt;
    }
    public function deleteTournament($id)
   {
    $query="DELETE FROM " . $this->table . " WHERE id =" . $id;
    $stmt=$this->conn->prepare($query);

    $stmt->execute();
   }
   public function addTournament($name,$email,$phone,$organizer,$begin_date,$end_date)
   {
    if($name != null && $email != null && $phone != null && $organizer != null && $begin_date != null && $end_date != null )
    $query="INSERT INTO " . $this->table . " (name,email,phone,organizer,begin_date,end_date) values('" . $name . "','" . $email . "','" . $phone . "','" . $organizer . "','" . $begin_date . "','" . $end_date . "')";

    $stmt=$this->conn->prepare($query);

    $stmt->execute();

   }
}

?>
