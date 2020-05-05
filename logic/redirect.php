<?php

    $url = (isset($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $split = explode("/",$url);

    if(end($split) == ''){
        if(!empty($_SESSION['username'])){
            header("Location: index.php");
            exit();
        }
        else{
            header("Location: login.php");
            exit();
        }
    }
?>