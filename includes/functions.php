<?php

    //get the time for the changing of images in homepage according to time of the day 
    function timestamp(){
        date_default_timezone_set('Asia/Kolkata');
        $day = date('d');
        $month = date('m');
        $month = date("F", mktime(0, 0, 0, $month, 10));
        $day_of_week = date('l');
        $time = date('H');        
        $full_date = array($day_of_week, $month, $day, $time);
        return $full_date;
    }

    // Create a item
    function add_todo($conn, $item, $user_id){
        $sql = "INSERT INTO todo_data(item, user_id) VALUES('$item', '$user_id')";
        $query = mysqli_query($conn, $sql);
    }

    // retrieve the data from todo_data for specific user
    function retrieve($conn, $user_id){
        $sql = "SELECT * FROM todo_data WHERE user_id = '$user_id'";
        $query = mysqli_query($conn, $sql);
        return $query;
    }

    // Delete a specific item form the table
    function delete_item($conn, $delete_id){
        $sql = "DELETE FROM todo_data WHERE id = $delete_id";
        $query = mysqli_query($conn, $sql);
    }

    // truncate the table
    function refresh($conn, $user_id){
        $sql = "DELETE FROM todo_data WHERE user_id = '$user_id'";
        $query = mysqli_query($conn, $sql);
    }

    //retrieve users with specific email 
    function retrieve_users($conn, $email){
        $sql = "SELECT * FROM todo_users WHERE email= '$email'";
        $query = mysqli_query($conn, $sql);
        return $query;
    }

    //retrieve all the todo_users 
    function retrieve_all_users($conn){
        $sql = "SELECT * FROM todo_users";
        $query = mysqli_query($conn, $sql);
        return $query;
    }

    // Signup form logic function
    function insert_users($conn, $username, $email, $password){
        $result_all_users = retrieve_all_users($conn);
        foreach($result_all_users as $r_a_u){
            if($username == $r_a_u['username']){
                header("Location:signup.php?usernameTaken");
                exit();
            }
        }
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO todo_users(username, email, password) VALUES('$username', '$email', '$hash_password')";
        $query = mysqli_query($conn, $sql);
    }

    // Logout functionality
    function logout(){
        unset($_SESSION['username']);
        echo $_SESSION['username'];
    }

    // Select all the rows which are checked
    function checked_rows($conn){
        $sql = "SELECT * FROM todo_data WHERE checkbox_check = 'checked'";
        $query = mysqli_query($conn, $sql);
        return $query;
    }


    // Uncheck all the todo's
    function uncheck_all_todo_data($conn){
        $sql = "UPDATE todo_data SET checkbox_check = 'unchecked'";
        $query = mysqli_query($conn, $sql);
    }

    // check specific todo
    function check_specific_todo($conn, $id){
        $sql = "UPDATE todo_data SET checkbox_check = 'checked' WHERE id = '$id'";
        $query = mysqli_query($conn, $sql);
    }

?>