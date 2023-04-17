<?php
    require('header.php');
    for($i = 1; $i<=count($_POST); $i++) {
        $_POST["check_$i"] = isset($_POST["check_$i"]) ? $_POST["check_$i"] : 0;
        if ($_POST["check_$i"]==1){
            check_message($i);
        }
    }
    redirect_to('/admin.php');
?>