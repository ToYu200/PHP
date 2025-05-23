<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'forum';
$connect = new mysqli($host, $username, $password, $dbname);


$input = file_get_contents('php://input');
$data = json_decode($input, true);


$sql = "SELECT h.id, h.hash_name FROM hashtags h INNER JOIN hash_connect hc ON h.id = hc.hash_id WHERE hc.field_id = '$fieldId'";
$res = mysqli_query($connect, $sql);

$selectedHashtags = array();
while ($row = $res->fetch_assoc()) {
    $selectedHashtags[] = $row;
}

echo json_encode($selectedHashtags);

?>