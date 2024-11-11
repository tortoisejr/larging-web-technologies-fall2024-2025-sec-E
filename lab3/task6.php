<?php
    $array= array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16);
    $n=11;
    $f=0;

    for($i=0;$i<16;$i++)
    {
        if($array[$i]==$n)
        {
            echo"$n is found";
            $f=1;
        }
    }
    if($f==0)
    {
        echo"$n is not found";
    }
?>