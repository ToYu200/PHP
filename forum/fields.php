<?php
// Запрос к базе данных для получения данных о хештегах
$query = 'SELECT * FROM hashtags';
$result = mysqli_query($connect, $query);
?>
<div class="container">
    <form action="index.php" method="POST">
        <input type="hidden" name="add-field">
        <h3>Создание области знаний</h3>
        <div class="form-group">
            <label for="field-name">Название области знаний</label>
            <input type="text" name="field-name" required class="form-control" id="field-name">
        </div>
        <div class="form-group">
            <label for="description">Описание области знаний</label>
            <textarea class="form-control" id="description" name="description" required rows="3"></textarea>
        </div>
        <?php
        // Вывод чекбоксов для каждого хештега
        while ($row = $result->fetch_assoc()) {
            echo '<input type="checkbox" id="hashtag_' . $row['id'] . '" name="hashtags[]" value="' . $row['hash_name'] . '">';
            echo '<label for="hashtag_' . $row['id'] . '">' . $row['hash_name'] . '</label><br>';
        }
        ?>
        <button type="submit" class="btn btn-primary mb-3">Создать область знаний</button>
    </form>
</div>