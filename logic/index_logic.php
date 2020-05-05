<?php

    $result_items = retrieve($conn, $_SESSION['user_id']);
    
    $checked_rows = checked_rows($conn);
    $all_checked_rows = array();
    foreach($checked_rows as $c_r){
        array_push($all_checked_rows, $c_r["id"]);
    }

    $json_checked_array = json_encode($all_checked_rows);

    if(!empty($_SESSION['user_id'])){
        if(!empty($item)){
            add_todo($conn, $item, $_SESSION['user_id']);
            header("Location: index.php");
            exit();
        }
    }

    if(isset($_REQUEST['delete']) && !empty($_REQUEST['delete'])){
        delete_item($conn, $delete_id);
        header("Location: index.php");
    }

    if(isset($_REQUEST['refresh'])){
        refresh($conn, $_SESSION['user_id']);
        header("Location: index.php");
    }

?>

