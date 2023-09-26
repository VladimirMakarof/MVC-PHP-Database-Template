<?php
require_once 'models/UserModel.php';

class UserController
{
  private $model;

  public function __construct($conn)
  {
    $this->model = new UserModel($conn);
    session_start(); // Старт сессии
  }

  public function handleRequest()
  {
    $errorMessage = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST["name"];
      $email = $_POST["email"];
      $phone = $_POST["phone"]; // Добавленное поле для номера телефона

      if (empty($name) || empty($email) || empty($phone)) {
        $errorMessage = "Имя, email и номер телефона обязательны для заполнения.";
      } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Неправильный формат email-адреса.";
      } elseif ($this->model->insertUser($name, $email, $phone)) { // Обновление метода insertUser
        $_SESSION['successMessage'] = "Данные успешно записаны в базу данных"; // Сохраняем сообщение в сессии
        header('Location: index.php'); // Редирект на index.php
        exit;
      } else {
        $errorMessage = "Ошибка при записи данных в базу данных.";
      }
    }

    // Включение HTML-шаблона
    include 'views/index.php';
  }
}
