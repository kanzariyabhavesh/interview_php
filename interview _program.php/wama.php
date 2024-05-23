<?php

//   $max = 5; 

//   for ($i = 1; $i <= $max; $i++) {
//       for ($j = $i; $j < $max; $j++) {
//           echo '&nbsp';
//       }
//       for ($k = 1; $k <= (2 * $i - 1); $k++) {
//           echo $k;
//       }
//       echo "<br>";
//   }

//   for ($i = $max - 1; $i >= 1; $i--) {
//       for ($j = $max; $j > $i; $j--) {
//         echo '&nbsp';
//       }
//       for ($k = 1; $k <= (2 * $i - 1); $k++) {
//           echo $k;
//       }
//       echo "<br>";
//   }

// $string=1;

//     for ($i=0; $i <5 ; $i++) { 
//         for ($j=$i; $j < 5 ; $j++) { 
//             echo '&nbsp&nbsp';
//         }
//         for ($k=0; $k <=$i ; $k++) { 
//             // echo chr($string);
//             echo $string;
//         }
//         $string++;
//         echo "</br>";
//     }


// $string=65;
//   for ($i=5; $i >0 ; $i--) { 
//     for ($k=1; $k <=$i ; $k++) { 
//         echo chr($string);
//     }
//     $string++;
//     echo "</br>";
//   }

//   $k = 1; 

// $string=65;
//   for ($i=5; $i >0 ; $i--) { 
//     for ($k=1; $k <=$i ; $k++) { 
//         echo chr($string);
//         $string++;
//     }
//     $string=65;

//     echo "</br>";
//   }

  $k = 1;

for ($i = 5; $i >= 1; $i--) { 
    for ($j = 1; $j <= $i; $j++) {
        if ($i == 4 || $i == 5) {
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$k++;
        }else {
            echo "&nbsp;&nbsp;&nbsp;&nbsp;".$k++;
        }
    }
    echo '<br>'; 
}

?>