<?php
class Cat
{
    private $name;
    private $color;
    private $weight;

    public function __construct(string $name, string $color, int $weight)
    {
        $this->name = $name;
        $this->color = $color;
        $this->weight = $weight;
    }

    public function sayHello()
    {
        return "Мяу! Меня зовут {$this->name} и я {$this->color} цвета.";
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getColor(): string
    {
        return $this->color;
    }
}

$cat = new Cat('Barsik', 'оранжевый', 7);
echo $cat->getName() . "<br>";
echo $cat->sayHello() . "\n";


?>