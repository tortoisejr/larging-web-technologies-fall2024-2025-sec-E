<?php
    $array1=[
                [1,2,3,'A'],
                [1,2,'B','C'],
                [1,'D','E','F']

    ];

    for($i=0;$i<3;$i++)
    {
        for($j=0;$j<4;$j++)
        {
            print($array1[$i][$j]);
        }
        echo"<br>";
    }
?>