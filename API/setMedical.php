<?php

require('./helper/db.php');
if(isset($_POST['username'])) {
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con, $username);
    if (isset($_POST['vaccinated'])) {
        $vaccinated = stripslashes($_REQUEST['vaccinated']);
        $vaccinated = mysqli_real_escape_string($con, $vaccinated);

        $stmt = mysqli_prepare($con,
            "UPDATE `users` SET `vacinated` = ? WHERE username=?"
        );
        $stmt->bind_param("ss", $vaccinated,$username);

        /* execute query */
        echo $stmt->execute();
    }
    if (isset($_POST['research_data'])) {
        $research_data = stripslashes($_REQUEST['research_data']);
        $research_data = mysqli_real_escape_string($con, $research_data);

        $stmt = mysqli_prepare($con,
            "UPDATE `users` SET `research_data` = ? WHERE username=?"
        );
        $stmt->bind_param("ss", $vaccinated,$username);

        /* execute query */
        echo $stmt->execute();
    }
}

