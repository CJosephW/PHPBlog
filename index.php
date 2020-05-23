<html>

<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel = "stylesheet" type = "text/css" href = "static/css/style.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</head>

<body>

<div id = new-post class = "container">
    <form action="handlePost.php" method="post">
    Title: <input type="text" name="title"><br>
    Body: <textarea  name="body" rows="4" cols = "50"></textarea><br>
    <input type="submit">
    </form>
</div>

<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include "db_connection.php";

$db = new DBConnect();

$conn = $db->OpenConnection();


$sql = "SELECT * FROM userPosts WHERE username = ?";
if($stmt = mysqli_prepare($conn, $sql)){
    mysqli_stmt_bind_param($stmt, "s", htmlspecialchars($_SESSION['username']));

    if(mysqli_stmt_execute($stmt)){
        $result = $stmt->get_result();
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                echo "<div class = 'posts'>"." <h2>".$row["title"]. "</h2><p>". $row["body"]."</p><input id = ".$row["id"]." class = 'delete-button'type = button value = 'x'></input></div>";
            }
        } else {
            echo "0 results";
        }
        $db->CloseConnection();
    } else {
        echo "Somethin went wrong";
    }
}

?>
    <script type = "text/javascript" src="/static/js/main.js"></script> 
    
    
</body>

</html>