<?php

function isPrime($number) {

    if ($number <= 1) {
        return false;
    }
    
    for ($i = 2; $i * $i <= $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    
    return true; 
 }
// Example 
$number = 666; 
if (isPrime($number)) {
    echo "$number is a prime number.";
} else {
    echo "$number is not a prime number.";
}

?>
