<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $string = "Toi ghet PHP";
    $arr = str_split($string);
    $length = count($arr);
    
    echo "Original string: $string <br>";

    // Reverse the array
    for ($i = 0; $i < $length / 2; $i++) {
        $temp = $arr[$i];
        $arr[$i] = $arr[$length - 1 - $i];
        $arr[$length - 1 - $i] = $temp;
    }

    echo "Reversed string: ";
    // Print the reversed string
    for ($i = 0; $i < count($arr); $i++) {
        echo $arr[$i];
    }
    ?>
</body>
</html>