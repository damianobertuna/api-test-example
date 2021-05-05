<?php
include("./Database.php");
include("./Contact.php");
include("./config.php");

header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset=UTF-8");

$db = new Database($user, $password, $dbname, $host);
$dbconn = $db->databaseConnection();

$contact = null;
if (!empty($dbconn)) {
    $contact = new Contact($dbconn);
} else {
    echo "Problems connecting to database";
    exit();
}

if ($contact != null) {
    $contacts = $contact->getAllContacts();
}

if (mysqli_num_rows($contacts) > 0) {
    $contactsContainer["contacts"] = array();
    while($row = mysqli_fetch_assoc($contacts)) {
        array_push($contactsContainer["contacts"], $row);
    }
    $contactsContainer = json_encode($contactsContainer);
} else {
    echo "no contacts on database";
}

var_dump($contactsContainer);
