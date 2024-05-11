<?php

class a
{
    function  x(int $a){

        if ($a % 3 == 0 && $a % 5 == 0) {
            echo "it is 3 and 5";
        }
        elseif ($a % 3 == 0){
            echo "it is 3";
        }
        elseif ($a % 5 == 0){
            echo "it is 5";
        }

    }
}
 
$abc=new a();
$abc->x(17);
?>