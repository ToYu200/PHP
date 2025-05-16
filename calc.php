<?php
// calc.php
header('Content-Type: application/json; charset=utf-8');

function isValid($expr) {
    // Разрешены только цифры, скобки, операторы и пробелы
    return preg_match('/^[0-9+\-*/()\s]+$/', $expr);
}

function calculate($expr) {
    $expr = preg_replace('/[^0-9+\-*/().]/', '', $expr);
    try {
        $result = eval("return ($expr);");
        if ($result === false) return 'Ошибка';
        return $result;
    } catch (Throwable $e) {
        return 'Ошибка';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $expr = $_POST['expr'] ?? '';
    if (!isValid($expr)) {
        echo json_encode(['error' => 'Недопустимые символы']);
        exit;
    }
    $result = calculate($expr);
    if (!is_numeric($result)) {
        echo json_encode(['error' => $result]);
        exit;
    }
    // Возвращаем результат сразу в JSON, без редиректа
    echo json_encode(['result' => $result]);
    exit;
}

if (isset($_GET['result'])) {
    echo json_encode(['result' => $_GET['result']]);
    exit;
}

echo json_encode(['error' => 'Некорректный запрос']);
