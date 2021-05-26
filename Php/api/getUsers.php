<?php
//Headers

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/user.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$user = new User($db);

$result = $user->getUsers();

$num = $result->rowCount();
$_SESSION['all_users']= array();
  // Check if any posts
  if($num > 0) {
    

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'id' => $id,
        'username' => $username,
        'password' => $password,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'emailaddress' => $emailaddress
      );

      array_push($_SESSION['all_users'],$post_item);
    }
      

    // header("Location: ../../Html/main_page_play.php", true, 301);

  } 
?>

