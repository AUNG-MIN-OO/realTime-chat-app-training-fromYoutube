<?php
    session_start();

    include_once "config.php";
    $fname = mysqli_real_escape_string($con,$_POST['fname']);
    $lname = mysqli_real_escape_string($con,$_POST['lname']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
//        check email valid or not
        if (filter_var($email,FILTER_VALIDATE_EMAIL)){
//            check email is already exist or not
            $sql = mysqli_query($con, "SELECT email FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($sql) > 0){
                echo $email . " - This email already exists!";
            }else{
                if (isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
                    $extensions = ['jpg','jpeg','png'];
//                    echo in_array($img_ext,$extensions);
//                    exit();
                    if (in_array($img_ext,$extensions) == true){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if (move_uploaded_file($tmp_name,"images/".$new_img_name)){
                            $status = "Active now";
                            $random_id = rand(time(),1000000);
                            $sql2 = mysqli_query($con,"INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                                VALUES ('{$random_id}','{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}','{$status}')");
                            if ($sql2){
                                $sql3 = mysqli_query($con,"SELECT * FROM users WHERE email = '{$email}'");
                                if (mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['$unique_id'] = $row['unique_id'];
                                    echo 'success';
                                }
                            }
                        }
                    }else{
                        echo "Image must be jpg or jpeg or png";
                    }
                }else{
                    echo "Image is required";
                }
            }
        }else{
            echo $email . " - This email is invalid!";
        }
    }else{
        echo "all input are required"   ;
    }
?>