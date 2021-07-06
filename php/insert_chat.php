<?php

    session_start();
    if (isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($con,$_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($con,$_POST['incoming_id']);
        $message = mysqli_real_escape_string($con,$_POST['message']);

        echo $message;

        if (!empty($message)){
            $sql = mysqli_query($con,"INSERT INTO messages (outgoing_msg_id,incoming_msg_id,message) VALUES ({$outgoing_id},{$incoming_id},'{$message}')");
            if ($sql){
                echo "inserted";
            }
        }

    }else{
        header("location:login.php");
    }