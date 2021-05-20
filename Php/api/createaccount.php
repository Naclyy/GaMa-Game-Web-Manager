<?php
//Headers


header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../models/user.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$user = new User($db);

$result = $user->createaccount($_POST["username"],$_POST["password"],$_POST["firstname"],$_POST["lastname"],$_POST["email"]);


  ?>