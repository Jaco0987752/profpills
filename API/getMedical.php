<?php

require('./Helper/db.php');

if(isset($_POST['username'])) {
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con, $username);

    $stmt = mysqli_prepare($con,
        "SELECT ( `province`,`medical_history`, `vacinated`, `appointment`) FROM `users` WHERE username=?"
    );
    $stmt->bind_param("s", $username);

    /* execute query */
    $stmt->execute();
    /* bind result variables */
    $stmt->bind_result($province, $medical_history, $vacinated, $trn_date);
    /* fetch value */
    $stmt->fetch();
}
?>