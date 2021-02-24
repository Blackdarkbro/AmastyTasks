<?php

interface IChessmen
{
    public function move(int $x, int $y);
    public function getPosition();
} 

abstract class AbstractChessmen implements IChessmen
{
    protected $x;
    protected $y;

    protected $oldX;
    protected $oldY;

    public function __construct(int $x, int $y)
    {
        if ($x > 8 || $x < 1 || $y > 8 || $y < 1)
        {
            throw new Exception('The value is greater than the playing field ');
        }

        $this->x = $x;
        $this->y = $y;
    }

    public function getPosition()
    {
       return array($this->x, $this->y);
    }

    public function move(int $x, int $y)
    {
        if ($x > 8 || $x < 1 || $y > 8 || $y < 1)
        {
            throw new Exception('The value is greater than the playing field ');
        }
    }
}

class King extends AbstractChessmen
{
    public function move(int $x, int $y)
    {
        parent::move($x, $y);

        $step = 1;

        if (abs($x - $this->x) > $step || abs($y - $this->y) > $step)
        {
            throw new Exception("King's wrong move");
        }

         $this->x = $x;
         $this->y = $y;
    }
}

class Queen extends AbstractChessmen
{
    public function move(int $x, int $y)
    {
        parent::move($x, $y);

        if ($x != $this->x || $y != $this->y || (abs($x - $this->x) != abs($y - $this->y)))
        {
            throw new Exception("Queen's wrong move");
        }

        $this->x = $x;
        $this->y = $y;
    }
}

try
{
    $king = new King(4, 3);
    $queen = new Queen(1, 1);

    $king->move(2, 2);
    $queen->move(7, 3);
 
} catch(Exception $e)
{
    print_r($king->getPosition());
    print_r($queen->getPosition());
}
?>