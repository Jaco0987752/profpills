<?php

require('./../Helper/db.php');

$stmt = mysqli_prepare($con,
   "SELECT `id`, `province`, `appointment` FROM `clients` WHERE `appointment` IS NOT NULL AND vaccinated = false"
);
if($stmt == false){
    echo "failed to fetch from database";
    die();
}
/* execute query */
$stmt->execute();
/* bind result variables */
$stmt->bind_result($id, $province, $vaccinated);
/* fetch value */
$stmt->fetch();
echo $id . $province . $vaccinated;