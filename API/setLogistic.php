<?php

// mag

require('./../Helper/db.php');
if(isset($_POST['id'])) {
    $id = stripslashes($_REQUEST['id']);
    $id = mysqli_real_escape_string($con, $id);
    if (isset($_POST['vaccine_delivered'])) {
        $vaccinated = stripslashes($_REQUEST['vaccine_delivered']);
        $vaccinated = mysqli_real_escape_string($con, $vaccinated);

        $stmt = mysqli_prepare($con,
            "UPDATE `clients` SET `vaccine_delivered` = ? WHERE id=?"
        );
        if($stmt == false){
            echo "failed to update database";
            die();
        }
        $stmt->bind_param("ss", $vaccine_delivered,$id);

        /* execute query */
        echo $stmt->execute();
    }
}else
{
    echo "no ID given";
}
