<?php
    $colors = array("red", "blue", "green", "yellow", "lime", 
    "magenta", "black", "gold", "gray", "tomato");

    $size = count($colors);

    for ($i=0; $i < 5; $i++) 
    { 
        for ($j=0; $j < 5; $j++)
        { 
            $color = rand(0,$size - 1);
            $word = rand(0, $size - 1);

            while ($color == $word) 
            {
                $color = rand(0,$size - 1);
                $word = rand(0, $size - 1); 
            }

            echo "<span style='color:$colors[$color]'>" . $colors[$word] . "</span> ";
        }
        echo "</br>";
    }
?>