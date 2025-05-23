<?php

interface CalculateSquare
{
    public function calculateSquare(): float;
}

class Rectangle implements CalculateSquare
{
    public function __construct(
        public $x,
        public $y
    ) {
    }

    public function calculateSquare(): float
    {
        return $this->x * $this->y;
    }
}

class Square implements CalculateSquare
{
    public function __construct(
        public $x,
    ) {
    }

    public function calculateSquare(): float
    {
        return $this->x ** 2;
    }
}

class Circle implements CalculateSquare
{
    const PI = 3.1416;

    public function __construct(
        public $r,
    ) {
    }

    public function calculateSquare(): float
    {
        return self::PI * ($this->r ** 2);
    }
}

$objects = [
    new Rectangle(3, 4),
    new Square(4),
    new Circle(8)
];

foreach ($objects as $elem) {
    if ($elem instanceof CalculateSquare) {
        echo 'Площадь объекта класса ' . get_class($elem) . ' равна: ' . $elem->calculateSquare() . '<br>';
    } else {
        echo 'Объект класса ' . get_class($elem) . ' не реализует интерфейс CalculateSquare' . '<br>';
    }
}


?>