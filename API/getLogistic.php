<?php

require('./Helper/db.php');


$stmt = mysqli_prepare($con,
   "SELECT ( `id`, `province`, `appointment`) FROM `users` WHERE appointment = NOT NULL and `vaccinated = False`"
);
/* execute query */
$stmt->execute();
/* bind result variables */
$stmt->bind_result($id, $province, $vacinated, $trn_date);
/* fetch value */
$stmt->fetch();


`id` int(11) NOT NULL AUTO_INCREMENT,
 `email` varchar(50) NOT NULL,
 `password` varchar(60) NOT NULL,
 `trn_date` datetime NOT NULL,
 `province` varchar(50),
 `client_approved` boolean,
 `appointment` datetime,
 `vacinated` boolean, 
 `placebo` boolean,
 `medical_history` varchar(100),
 `research_data` varchar(100),
 `vaccine_delivered` bool