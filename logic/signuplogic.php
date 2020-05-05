<?php

    if(isset($_REQUEST['signup'])){
        insert_users($conn, $username, $email, $password);
        $_SESSION['username'] = $username;
        header("Location: index.php");
    }
    

?>