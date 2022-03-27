<?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "" /*password*/ , "db_name" /*your database name*/ */) or die("Unsuccessfull connection");
    $email_or_mobile = '';
    $pwd = '';
    $errors = array(); //for validation
    $output = '';

    if(isset($_POST["sign-in"])){
        $email_or_mobile = $_POST["email_or_mobile"];
        $pwd = $_POST["password"];

        if(empty($email_or_mobile)){
            array_push($errors, 'Please enter mobile no. or email ID');
            $output .= '<li>Please enter mobile no. or email ID</li>';
        }
        
        if(empty($pwd)){
            array_push($errors, 'Please enter password');
            $output .= "<li>Please enter password</li>";
        }

        $check_user = '
            SELECT * FROM table
            WHERE email = "'.$email_or_mobile.'" OR mobile_number = "'.$email_or_mobile.'"
        ';
        $store_user = mysqli_query($connection, $check_user);
        $user_num = mysqli_num_rows($store_user);
        if($user_num){
            $user_data = mysqli_fetch_assoc($store_user);
            $db_pwd = $user_data['password'];
            $auth_pwd = password_verify($pwd, $db_pwd);
            if($auth_pwd){
                echo "<script>alert('Authentication successfull')</script>";
                $email = $user_data["email"];
                $user_id = $user_data["user_id"];
                // session_start();
                $_SESSION['email'] = $email;
                $_SESSION['user_id'] = $user_id;
                // set header
            }
            else{
                $output .= '<li>Password not matched!!!</li>';
            }
        }
        else{
            $output .= '<li>Email/Mobile number not found!!!</li>';
        }
    }
?>