<?php
//Headers


header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../models/game.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$game = new Game($db);

$result = $game->addGame($_POST["title"],$_POST["url"]);


  ?>