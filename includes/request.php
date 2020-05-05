<?php

    if(isset($_REQUEST['add_todo'])){
        if(isset($_REQUEST['item']) && !empty($_REQUEST['item'])){
            $item = $_REQUEST['item'];

        }
    }
    if(isset($_REQUEST['delete']) && !empty($_REQUEST['delete'])){
        $delete_id = $_REQUEST['delete'];

    }

?>