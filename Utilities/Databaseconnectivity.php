<?php
class DataBase {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "gamedatabase";
    private $conn;

    public function __construct() {
        // Optional: Initialization or pre-checks
    }

    public function createConnection() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        return true;
    }

    public function verifyUserExist($username) {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM player WHERE userName = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        return $count > 0;
    }

    public function fetchUserData($username) {
        $stmt = $this->conn->prepare("SELECT * FROM player WHERE userName = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result(); // Use get_result() to fetch all columns
        $user = $result->fetch_assoc(); // Fetch the user data as an associative array
        $stmt->close();
        
        return $user;
    }


    public function registerUser($firstName, $lastName, $username, $hashedPassword) {
        $stmt = $this->conn->prepare("INSERT INTO player (fName, lName, userName) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $firstName, $lastName, $username,);

        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }
}
?>
