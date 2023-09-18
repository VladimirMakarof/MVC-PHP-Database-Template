<?php
class UserModel {
private $conn;

public function __construct($conn) {
$this->conn = $conn;
}

public function insertUser($name, $email) {
$sql = "INSERT INTO users (username, email) VALUES (?, ?)";
$stmt = $this->conn->prepare($sql);
$stmt->bind_param("ss", $name, $email);
return $stmt->execute();
}
}
