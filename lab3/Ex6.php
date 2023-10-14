<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $numArr = array(1,9,5,3,4,6,3,1,84,2,7,3,90);
    sort($numArr);
    for($i = 0; $i < count($numArr);$i ++){
        
        if($i == count($numArr) - 1){
            echo "$numArr[$i]";
            break;
        }
        echo "$numArr[$i],";
    }
    ?>
</body>
</html>