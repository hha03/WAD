<?php 
    $server="127.0.0.1:3306";
    $username="root";
    $password="admin";
    $database="classroom";

    $con=mysqli_connect($server, $username, $password, $database);
    
    if(!$con){
        die("Connect fail: ".mysqli_connect_error());
    }
    else{
        echo "Connect successfully";
    }

    $sql="Select * from student";
    $data=mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 8</title>
    <link rel="stylesheet" href="exercise8.css">
</head>
<body>
    <table>
        <tbody>
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Class</th>
                <th>Mark</th>
                <th>Sex</th>
            </tr>
           <?php 
                while($row=mysqli_fetch_assoc($data)) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['class']."</td>";
                    echo "<td>".$row['mark']."</td>";
                    echo "<td>".$row['sex']."</td>";
                    echo "</tr>";
                }
           ?>
        </tbody>
    </table>
    <div id="form_database" class="hide">
        <form action="" method="post" class="add">
            <input placeholder="Student name" type="text" name="name" require>
            <input placeholder="Student class" type="text" name="class" require>
            <input placeholder="Student mark" type="text" name="mark" require>
            <input placeholder="Student gender" type="text" name="sex" require  >
            <button name="submit" type="submit">Click to update</button>
        </form>
        <form action="" method="post" class="update">
            <input type="text" name="id_to_update" require placeholder="Input the id of the student">
            <input placeholder="Student name" type="text" name="name" require>
            <input placeholder="Student class" type="text" name="class" require>
            <input placeholder="Student mark" type="text" name="mark" require>
            <input placeholder="Student gender" type="text" name="sex" require>
            <button name="update" type="submit">Click to update</button>
        </form>
        <form action="" method="post" class="delete">
            <input placeholder="ID student" type="text" name="id" require>
            <button name="del" type="submit">Click to update</button>
        </form>
        <?php  
            $sort="SELECT * FROM student order by mark desc";
            $list_sort=mysqli_query($con, $sort);
            if($list_sort){
                echo "<table>";
                echo "<tbody>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Firstname</th>";
                echo "<th>Class</th>";
                echo "<th>Mark</th>";
                echo "<th>Sex</th>";
                echo "</tr>";
                while($row=mysqli_fetch_assoc($list_sort)) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['class']."</td>";
                    echo "<td>".$row['mark']."</td>";
                    echo "<td>".$row['sex']."</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            }
        ?>
    </div>
    <?php
        session_start();
        if(isset($_POST["submit"])){
            if(isset($_POST["name"])){
                $name=$_POST["name"];
            }
            if(isset($_POST["class"])){
                $class=$_POST["class"];
            }
            if(isset($_POST["mark"])){
                $mark=$_POST["mark"];
            }
            if(isset($_POST["sex"])){
                $gender=$_POST["sex"];
            }
            $add = "INSERT INTO student (name, class, mark, sex) VALUES ('".$name."', '".$class."', '".$mark."', '".$gender."')";
            if(mysqli_query($con,$add)){
                header("Refresh:0");
                exit();        
            }
            else{
                echo "Error: ".mysqli_error($con);
            }
        }

        else if(isset($_POST["update"])){
            if(isset($_POST["id_to_update"])){
                $id=$_POST["id_to_update"];
            }
            if(isset($_POST["name"])){
                $name=$_POST["name"];
            }
            if(isset($_POST["class"])){
                $class=$_POST["class"];
            }
            if(isset($_POST["mark"])){
                $mark=$_POST["mark"];
            }
            if(isset($_POST["sex"])){
                $gender=$_POST["sex"];
            }
            $update = "UPDATE student SET name='".$name."', class='".$class."', mark='".$mark."', sex='".$gender."' WHERE id='".$id."'";
            if(mysqli_query($con,$update)){
                header("Refresh:0");
                exit();        
            }
            else{
                echo "Error: ".mysqli_error($con);
            }
        }

        else if(isset($_POST["del"])){
            $id=$_POST["id"];
            $del="DELETE FROM student WHERE id='".$id."'";
            if(mysqli_query($con,$del)){
                $resetAutoIncrement = "ALTER TABLE student AUTO_INCREMENT = 1";
                mysqli_query($con, $resetAutoIncrement);
                header("Location: exercise8.php");
                exit();        
            }
            else{
                echo "Error: ".mysqli_error($con);
            }
        }
    ?>
</body>
</html>