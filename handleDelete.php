<?php
include "db_connection.php";

$id = $_REQUEST["id"];

echo $id;

$db = new DBConnect();

$conn = $db->OpenConnection();

$query = "DELETE FROM userPosts WHERE id = ?";

if($stmt = mysqli_prepare($conn, $query)){
    mysqli_stmt_bind_param($stmt, "s", $id);

    if(mysqli_stmt_execute($stmt)){
        echo "deleted succesfully";
    }
}


?>