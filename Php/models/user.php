<?php

class User{

   private $conn;
   private $table='user';
   
   public $id;
   public $username;
   public $password;
   public $firstname;
   public $lastname;
   public $emailaddress;
 

   public function __construct($db) {

    $this->conn = $db;

   }

   public function login($username_parsed,$password_parsed){
       $query="SELECT * from " . $this->table . " WHERE username= '" . $username_parsed . "' and password = '" . $password_parsed . "'";

       $stmt=$this->conn->prepare($query);

       $stmt->execute();

       // Get row count
     $num = $stmt->rowCount();


   if($num = 1) {
  
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $this->id = $id;
    $this->username = $username;
    $this->password = $password;
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->emailaddress = $emailaddress;
    return true;

     
  }

  // Turn to JSON & output
  

} 
else {
  return false;
}
   }

   public function createaccount($username,$password,$firstname,$lastname,$emailaddress)
   {
    if($username != null && $password != null && $firstname != null && $lastname != null && $emailaddress != null)
    $query="INSERT INTO " . $this->table . " (username,password,firstname,lastname,emailaddress) values('" . $username . "','" . $password . "','" . $firstname . "','" . $lastname . "','" . $emailaddress . "')" ;

    $stmt=$this->conn->prepare($query);

    $stmt->execute();

   }

   public function logout()
   {
     session_unset();
     header("Location: ../../Html/login_play.html");
   }


   public function getId()
   {
     return $this->id;
   }

   public function getUsername()
   {
     return $this->username;
   }
   public function getPassword()
   {
     return $this->password;
   }
   public function getFirstname()
   {
     return $this->firstname;
   }
   public function getLastname()
   {
     return $this->lastname;
   }
   public function getEmailaddress()
   {
     return $this->emailaddress;
   }

}