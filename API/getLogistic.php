<?php

require('./../Helper/db.php');

$stmt = mysqli_prepare($con,
   "SELECT date, time, hospitals.hospital, hospitals.province FROM (`appointments` INNER JOIN hospitals ON hospitals.id = appointments.hospital)"
);

if($stmt == false){
    echo "failed to fetch from database";
    die();
}
/* execute query */
$stmt->execute();
/* bind result variables */
$stmt->bind_result($date, $time, $hospital, $province);
/* fetch value */

echo "id, date, time, hospital, province<br>";
while($stmt->fetch()){
	echo $date .', '. $time .', '. $hospital .',' . $province ."<br>";
}