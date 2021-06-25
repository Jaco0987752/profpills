<?php

require('./../Helper/db.php');

if(isset($_POST['username'])) {
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con, $username);

    $stmt = mysqli_prepare($con,
        "SELECT `province`,`medical_history`, `vaccinated`, `appointment` FROM `clients` WHERE username=?"
    );
    $stmt->bind_param("s", $username);

    if($stmt == false){
        echo "failed to fetch from database";
        die();
    }
    /* execute query */
    $stmt->execute();
    /* bind result variables */
    $stmt->bind_result($province, $medical_history, $vacinated, $trn_date);
    /* fetch value */
    $stmt->fetch();
    echo $province . $medical_history . $vacinated . $trn_date;
}else{
    echo "no post variable username set";
}


