<!DOCTYPE html>
<html lang="en">
<head>
<body>
    <?php
function factorial($n) {
    if ($n === 0 || $n === 1) {
        return 1; 
    } else {
        return $n * factorial($n - 1); 
    }
}

// Example
$number = 5; 
$result = factorial($number);
echo "The factorial of $number is $result.";
    ?>

</body>
</html>