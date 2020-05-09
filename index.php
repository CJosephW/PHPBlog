<html>

<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel = "stylesheet" type = "text/css" href = "static/css/style.css"

</head>

<body>

<div id = new-post class = "container">
    <div class = "form-group">
        <label for = "post-title">Title:</label>
        <input type = 'text' class = "form-control" id = "post-title">
    </div>
    <div class = "form-group">
        <label for = "post-body">Body:</label>
        <textarea class = "form-control" rows = "5" id = "post-body"></textarea>
    </div>
    <button type = "button" class = "btn btn-info">Post!</button>
</div>

<?php
$servername = "localhost";
$username = "bloguser";
$password = "password";
$db = "phpblog";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

$sql = "SELECT * FROM Posts";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
        echo "<div class = 'posts'> <h2>".$row["id"]. "</h2><p>". $row["body"]."</p></div>";
    }
} else {
    echo "0 results";
}
?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>