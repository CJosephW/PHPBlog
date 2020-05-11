<?php
include "db_connection.php";

$db = new DBConnect();

$conn = $db->OpenConnection();

$query = "INSERT INTO Posts (name, body) VALUES ('{$_POST['name']}' ,'{$_POST['body']}')";

if ($conn->query($query) === TRUE){
    echo "INSERTED Succesfully";
} else {
    echo "Error";
}
header('Location: index.php');
exit;
?>