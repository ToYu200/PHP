<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Feedback form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <form id="feedbackForm" method="post" action="https://httpbin.org/post">
            <label>Имя пользователя:<br>
                <input type="text" name="username" required>
            </label><br>
            <label>E-mail пользователя:<br>
                <input type="email" name="email" required>
            </label><br>
            <label>Тип обращения:<br>
                <select name="type">
                    <option value="complaint">Жалоба</option>
                    <option value="suggestion">Предложение</option>
                    <option value="thanks">Благодарность</option>
                </select>
            </label><br>
            <label>Текст обращения:<br>
                <textarea name="message" required></textarea>
            </label><br>
            <label>Вариант ответа:<br>
                <input type="checkbox" name="reply_sms" value="sms"> СМС
                <input type="checkbox" name="reply_email" value="email"> E-mail
            </label><br>
            <button type="submit">Отправить</button>
        </form>
        <br>
        <a href="headers.php">Перейти на 2 страницу</a>
    </main>
    <?php include 'footer.php'; ?>
    <script src="form.js"></script>
</body>
</html>
