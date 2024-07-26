<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json');
include_once 'database.php';
include_once 'user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$data = json_decode(file_get_contents("php://input"));

$user->username = $data->username;
$user->password = $data->password;

if($user->login()){
    echo json_encode(array(
        "message" => "Login successful.",
        "user_type" => $user->user_type
    ));
} else {
    echo json_encode(array(
        "message" => "Login failed."
    ));
}
?>
