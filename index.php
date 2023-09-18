<?php
require_once 'controllers/UserController.php';

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

// Создание объекта контроллера и обработка запросов
$controller = new UserController($conn);
$controller->handleRequest();

// Закрытие соединения с базой данных
$conn->close();
