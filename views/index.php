<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Форма для записи в базу данных</title>
  <link href="/public/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="/public/css/burger-menu.css">
  <link rel="stylesheet" href="/public/css/form.css">
</head>

<body>
  <?php
  include 'header.php';
  ?>
  <h1>Запись данных в базу данных</h1>
  <form action="index.php" method="post">
    <label for="name">Имя:</label>
    <input type="text" name="name" required><br>

    <label for="phone">Номер телефона:</label>
    <input type="tel" name="phone" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <!-- Отображение сообщения об успешной записи -->
    <?php if (isset($_SESSION['successMessage'])) : ?>
      <p class="success"><?= $_SESSION['successMessage'] ?></p>
      <?php unset($_SESSION['successMessage']); // Очищаем сообщение из сессии 
      ?>
    <?php endif; ?>

    <!-- Отображение сообщения об ошибке -->
    <?php if ($errorMessage) : ?>
      <p class="error"><?= $errorMessage ?></p>
    <?php endif; ?>


    <input type="submit" value="Отправить"><br>
  </form>
  <script src="/public/js/burger-menu.js"></script>
</body>

</html>