<?php
//Headers

session_start();
header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../models/user.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$user = new User($db);

$user->logout();

  ?>