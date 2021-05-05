<?php

include("./Database.php");
include("./Contact.php");
include("./config.php");

header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset=UTF-8");
header("Access-Control-Allow-Method: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = file_get_contents("php://input");
$data = json_decode($data);

$db = new Database($user, $password, $dbname, $host);
$dbconn = $db->databaseConnection();

$contact = new Contact($dbconn);
$result = $contact->createContact($data->name, $data->lastname, $data->phonenumber, $data->email);

echo $result;

/*
{
"name" : "Giulio",
"lastname" : "Cesare",
"phonenumber" : "3334445655",
"email" : "giulio@cesare.it"
}
*/