<?php

session_start();
if (isset($_SESSION['unique_id'])){
    include_once "config.php";
    $outgoing_id = mysqli_real_escape_string($con,$_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($con,$_POST['incoming_id']);
    $message = mysqli_real_escape_string($con,$_POST['message']);
    $output = "";

    $sql = "SELECT * FROM messages
            LEFT JOIN users ON users.unique_id = messages.incoming_msg_id
            WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
            OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id ASC ";
    $result = mysqli_query($con,$sql);
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            if ($row['outgoing_msg_id']===$outgoing_id){//he is a message sender
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['message'] .'</p>
                                </div>
                            </div>';
            }else{
                $output .= '<div class="chat incoming">
                                <img src="php/images/'. $row['img'] .'" alt="">
                                <div class="details">
                                    <p>'. $row['message'] .'</p>
                                </div>
                            </div>';
            }
        }
        echo $output;
    }
}else{
    header("location:login.php");
}