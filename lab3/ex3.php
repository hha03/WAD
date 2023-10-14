<?php
$t1=array("Firstname","Lastname","Age");
$jill=array("Jill","Smith","50");
$eve=array("Eve","Jackson","94");
$john=array("John","Doe","80");
$people=array($jill,$eve,$john);
echo "<table border='1'>";
echo "<tr>";
foreach($t1 as $th){
    echo "<th>$th</th>";
}
echo "</tr>";
foreach($people as $person) {
    echo "<tr>";
	foreach($person as $item) {
        echo "<td>$item</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>