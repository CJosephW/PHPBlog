
<?php
class DBConnect
{
    protected $conn = null;
    public function OpenConnection()
    {
        $this->conn = new mysqli('localhost', "bloguser", "password", "phpblog") or die($conn->connect_error);
        return $this->conn;
    }
    public function CloseConnection()
    {
        $this->conn->close();
    }
}
?>