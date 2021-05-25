<?php
//Headers


include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/user.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$user = new User($db);


$id = $_POST["id"];


$user->deleteUser($id);

header('Location: ../../Html/admin/manage_users_page.php', true, 301);

?>