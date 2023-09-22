<?php
class UserModel
{
  private $conn;

  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  public function insertUser($name, $email, $phone)
  {
    $sql = "INSERT INTO users (username, email, phone) VALUES (?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $phone);
    return $stmt->execute();
  }
}
