<?php
function solveEquation($equation) {
    $equation = str_replace(' ', '', $equation);
    list($left, $right) = explode('=', $equation);
    $value = is_numeric($right) ? floatval($right) : floatval($left);
    $expr = strpos($left, 'X') !== false ? $left : $right;
    $x_side = strpos($left, 'X') !== false ? 'left' : 'right';

    if (preg_match('/(\d+)([\+\-\*\/])X/', $expr, $matches)) {
        $num = floatval($matches[1]);
        $op = $matches[2];
        switch ($op) {
            case '+': $x = $value - $num; break;
            case '-': $x = $num - $value; break;
            case '*': $x = $value / $num; break;
            case '/': $x = $num / $value; break;
        }
    } elseif (preg_match('/X([\+\-\*\/])(\d+)/', $expr, $matches)) {
        $op = $matches[1];
        $num = floatval($matches[2]);
        switch ($op) {
            case '+': $x = $value - $num; break;
            case '-': $x = $value + $num; break;
            case '*': $x = $value / $num; break;
            case '/': $x = $value * $num; break;
        }
    } else {
        return "Не удалось распознать выражение";
    }
    return $x;
}

$equation = "4 * X = 36";
$result = solveEquation($equation);
echo "X = $result";

/* 
┌──────────────────────┐
│   Ввод уравнения     │
└─────────┬────────────┘
          │
┌─────────▼────────────┐
│  Удаление пробелов   │
└─────────┬────────────┘
          │
┌─────────▼────────────┐
│  Разделение по "="   │
└─────────┬────────────┘
          │
┌─────────▼────────────┐
│ Определение стороны  │
│     с X              │
└─────────┬────────────┘
          │
┌─────────▼────────────┐
│  Определение         │
│  оператора и         │
│  положения X         │
└─────────┬────────────┘
          │
┌─────────▼────────────┐
│  Решение уравнения   │
└─────────┬────────────┘
          │
┌─────────▼────────────┐
│  Вывод значения X    │
└──────────────────────┘
*/
?>
