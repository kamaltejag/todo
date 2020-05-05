<?php

    if(!empty($item)){
        add_todo($conn, $item);
    }

    $result_items = retrieve($conn);

    if(isset($_REQUEST['delete']) && !empty($_REQUEST['delete'])){
        delete_item($conn, $delete_id);
        header("Location: index.php");
    }

    if(isset($_REQUEST['refresh'])){
        refresh($conn);
        header("Location: index.php");
    }

?>