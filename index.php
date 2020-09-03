<?php

    function lineEquation($a, $b){
        return [-$b/$a];
    };

    function squareEquation($a, $b, $c){
        if($a == 0){
            return lineEquation($b, $c);
        }
        $d = $b * $b - 4 * $a * $c;
        if($d < 0){
            return [];
        } 
        elseif($d == 0){
            return [-$b/2/$a];
        }
        else{
            return[((-$b + sqrt($d))/2/$a), ((-$b - sqrt($d))/2/$a)];
        }
    }

    //ax^3 + bx^2 + cx + d = 0
    function cubeEquation( $d = 1, $a, $b, $c) {
        if($d == 0){
            return squareEquation($a, $b, $c);
        }
        $M_2PI = 2. * M_PI;

        $q = ($a * $a -3. * $b) / 9.;
        $r = ($a * (2. * $a * $a - 9. * $b) + 27. * $c) / 54.;
        $r2 = $r * $r;
        $q3 = $q * $q * $q;
        if($r2 < $q3) {
        $t = acos($r / sqrt($q3));
        $a /= 3.;
        $q = -2. * sqrt($q);
        $x[0] = $q * cos($t/3.) - $a;
        $x[1] = $q * cos(($t + $M_2PI) / 3.) - $a;
        $x[2] = $q * cos(($t - $M_2PI)/ 3.) - $a;
        $strok = 'X1 ='.(string)$x[0].'<br> X2 ='.(string)$x[1].'<br> X3 ='.(string)$x[2].'<br>';
        return $strok;
        }
        else {
        if($r <= 0.){
        $r =- $r;
        }
        $aa =- pow($r + sqrt($r2 - $q3), 1. / 3.);
        if($aa != 0.) {
        $bb = $q / $aa;
        }
        else {
        $bb = 0.;
        }
        $a /= 3.;
        $q = $aa + $bb;
        $r = $aa - $bb;
        $x[0] = $q - $a;
        $x[1] = (-0.5) * $q - $a;
        $x[2] = (sqrt(3.) * 0.5) * abs($r);
        if($x[2]){
            return[$x[0], $x[1], $x[2]];
        }
            return [$x[0], $x[1]];
        }
    }
    
    function printAnswer($a){
        for($i = 0; $i < count($a); $i++){
            print('Х'.(string)$i. ' = '.$a[$i].'<br/>');
            
        }
    }
    hey;
    printAnswer(cubeEquation(1, 2, 0, 0));