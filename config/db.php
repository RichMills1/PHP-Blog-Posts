<?php
    //Setup or Create Connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    //Check Connection
    if(mysqli_connect_errno()){
        echo 'Failed to connect to localhost '. mysqli_connect_errno();
    } 