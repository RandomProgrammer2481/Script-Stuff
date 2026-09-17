<?php

class Validator {
    public static function string($value, $min = 1, $max = INF) {
        $value = trim($value);
        
        return (strlen($value) >= $min) && strlen($value) <= $max;
    }

    public static function decimal($value, $min = 0, $max) {
        $decimalArray = explode(".", $value); //Returns an array of the part before the decimal point and the one after
      
        
        return ((strlen($decimalArray[1])) >= $min) && (strlen($decimalArray[1]) <= $max);
    }

    public static function integer($value, $min = 0, $max = INF) {
        return $value >= $min && $value <= $max;
    }
}