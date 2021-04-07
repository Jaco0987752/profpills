<?php

require('./helper/db.php');


$stmt = mysqli_prepare($con,
   "SELECT ( `id`, `province`, `appointment`) FROM `users` WHERE appointment = NOT NULL and `vaccinated = False`"
);
/* execute query */
$stmt->execute();
/* bind result variables */
$stmt->bind_result($id, $province, $vacinated, $trn_date);
/* fetch value */
$stmt->fetch();
?>