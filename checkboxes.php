<?php

    include 'includes/db.php';
    include 'includes/functions.php';

    if(isset($_REQUEST['cbIds'])){
        $cbIds = explode(',', $_REQUEST['cbIds']);

        uncheck_all_todo_data($conn);
        for($i=0; i<count($cbIds); $i++){
            check_specific_todo($conn, $cbIds[$i]);
        }

    }

?>