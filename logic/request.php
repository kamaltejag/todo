<?php

    if(isset($_REQUEST['add_todo'])){
        if(isset($_REQUEST['item']) && !empty($_REQUEST['item'])){
            $item = $_REQUEST['item'];

        }
    }

    if(isset($_REQUEST['delete']) && !empty($_REQUEST['delete'])){
        $delete_id = $_REQUEST['delete'];

    }
    
    // retrieve from login page
    if(isset($_REQUEST['login'])){
        if(isset($_REQUEST['email'])){
            $email = $_REQUEST['email'];
        }
        if(isset($_REQUEST['password'])){
            $password = $_REQUEST['password'];
        }
    }

    // retrieve from signup page
    if(isset($_REQUEST['signup'])){
        if(isset($_REQUEST['username'])){
            $username = $_REQUEST['username'];
        }
        if(isset($_REQUEST['email'])){
            $email = $_REQUEST['email'];
        }
        if(isset($_REQUEST['password'])){
            $password = $_REQUEST['password'];
        }  
    }

    // retrieve for logout
    if(isset($_REQUEST['logout'])){
        logout();
    }

?>