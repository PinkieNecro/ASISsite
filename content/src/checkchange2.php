<?php
    require('header.php');
    for($i = 1; $i<=count($_POST); $i++) {
        $_POST["check2_$i"] = isset($_POST["check2_$i"]) ? $_POST["check2_$i"] : 0;
        if ($_POST["check2_$i"]==1){
            check_order($i);
        }
    }
    redirect_to('/admin.php');
?>