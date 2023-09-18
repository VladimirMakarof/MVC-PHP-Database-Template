<?php
require_once 'models/UserModel.php';

class UserController
{
  private $model;

  public function __construct($conn)
  {
    $this->model = new UserModel($conn);
  }

  public function handleRequest()
  {
    $successMessage = "";
    $errorMessage = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST["name"];
      $email = $_POST["email"];

      if (empty($name) || empty($email)) {
        $errorMessage = "Имя и email-адрес обязательны для заполнения.";
      } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Неправильный формат email-адреса.";
      } elseif ($this->model->insertUser($name, $email)) {
        $successMessage = "Данные успешно записаны в базу данных";
      } else {
        $errorMessage = "Ошибка при записи данных в базу данных.";
      }
    }

    // Включение HTML-шаблона
    include 'views/index.php';
  }
}
