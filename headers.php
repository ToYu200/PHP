<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Headers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <h2>Результат работы функции get_headers</h2>
        <form method="post">
            <label>Введите URL:<br>
                <input type="text" name="url" value="https://www.mospolytech.ru/" required style="width:400px;">
            </label>
            <button type="submit">Получить заголовки</button>
        </form>
        <br>
        <textarea rows="15" cols="80" readonly><?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['url'])) {
            $headers = @get_headers(trim($_POST['url']));
            if ($headers) {
                echo implode("\n", $headers);
            } else {
                echo "Ошибка получения заголовков.";
            }
        }
        ?></textarea>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
