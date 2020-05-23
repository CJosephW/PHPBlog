<?php
include "db_connection.php";

$db = new DBConnect();

$conn = $db->OpenConnection();
session_start();

$query = "INSERT INTO userPosts (username, title, body) VALUES (?, ?, ?)";

if($stmt = mysqli_prepare($conn, $query)){
    mysqli_stmt_bind_param($stmt, "sss", htmlspecialchars($_SESSION["username"]), $_POST['title'], $_POST['body']);

        

        if(mysqli_stmt_execute($stmt)){
            header("location: index.php");
        } else {
            echo "Something went wrong please try again";
        }
        mysqli_stmt_close($stmt);
}

mysqli_close($conn)


?>