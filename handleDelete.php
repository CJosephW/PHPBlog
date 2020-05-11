<?php
include "db_connection.php";

$id = $_REQUEST["id"];

echo $id;

$db = new DBConnect();

$conn = $db->OpenConnection();

$query = "DELETE FROM Posts WHERE id = $id";


if ($conn->query($query) === TRUE){
    echo "Deleted Succesfully";
} else {
    echo "Error";
}

?>