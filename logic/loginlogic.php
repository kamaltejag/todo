<?php

    if(isset($_REQUEST['login'])){
        $result_users = retrieve_users($conn, $email);

        foreach($result_users as $r_users){
            $hashed_password = $r_users['password'];
            if(password_verify($password, $hashed_password)){
                $_SESSION['username'] = $r_users['username'];    
                $_SESSION['user_id'] = $r_users['id']; 
                header("Location: index.php");
                exit();
            }
        }   
    }
    
    
?>