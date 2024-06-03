<?php
    if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == "admin"){
        echo "this is admin";
    } else {
        echo "";
    }

?>