<?php
// Начать сессию
session_start();

// Проверка наличия данных почты и их сохранение в сессии
if (isset ($_POST["email"])) {
    $_SESSION['email'] = $_POST["email"];
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>

<body>
    <form action="register.php" method="POST">
        <label for="firstname">Имя:</label>
        <input type="text" id="firstname" name="firstname" required>

        <label for="lastname">Фамилия:</label>
        <input type="text" id="lastname" name="lastname" required>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $_SESSION['email'] ?>" required>

        <button type="submit">Зарегистрироваться</button>
    </form>
</body>

</html>