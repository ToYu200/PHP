<?php
setcookie('birthday', '', time() - 1);
if (isset ($_POST["birthday"])) {
    $birthday = $_POST['birthday'];
    setcookie('birthday', $birthday, time() + 3600 * 24 * 365); // Куки на год
    echo 'Дата рождения сохранена, обновите страницу';
} elseif (isset ($_COOKIE['birthday'])) {
    $birthday = $_COOKIE['birthday'];
    $today = new DateTime();
    $bday = new DateTime($birthday);
    $bday->modify('+1 year');

    $diff = $today->diff($bday); // день рождения минус текущая дата
    print_r($diff);
    $days = $diff->days;

    if ($days == 0) {
        echo 'Поздравляем с Днем Рождения!';
    } else {
        echo "До вашего дня рождения осталось {$days} дней";
    }
} else {
    echo '<form action="" method="post">
            Введите вашу дату рождения:
            <input type="date" name="birthday">
            <input type="submit" value="Отправить">
          </form>';
}
?>