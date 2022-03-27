<?php
    //session_start();
    $connection = mysqli_connect("localhost", "root", "" , "sketch_art_hub") or die("Unsuccessfull connection");
    $email_or_mobile = '';
    $pwd = '';
    $errors = array();
    $output = '';

    if(isset($_POST["sign-in"])){
        // echo "<script>alert('Form hit')</script>";

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
            SELECT * FROM user_data
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

                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['user_id'] = $user_id;
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assests/style/modal.css">
    <!-- <link rel="stylesheet" href="../assests/style/newModal.css"> -->
    <script src="../assests/js/modal.js"></script>
    <title>SIGN IN | APRATIMKALA</title>
</head>
<body>
    <div id="sign-in-modal"
    <?php
        if(count($errors) !== 0){
            echo 'class="show-sign-in-modal"';
        }
    ?>
    >
        <div class="form-modal-container">
            <div class="modal-content">
                <div class="logo-modal-heading">
                    <h2>APRATIMKALA</h2>
                </div>
                <div class="errors-list-container">
                    <ul>
                        <?php echo $output ?>
                    </ul>
                </div>
                <form action="" method="POST" id="sign-in-form" name="sign-in-form">
                    <div class="modal-form-container">
                        <div class="form-group">
                            <label for="email_or_mobile">Email:</label>
                            <input type="text" name="email_or_mobile" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password">
                        </div>
                        <div class="modal-form-action">
                            <button type="submit" id="sign-in" name="sign-in" class="modal-action-btn">SIGN IN</button>
                        </div>
                        <p>Haven't account yet <a href="#" id="open-register-modal">Register now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>

    // var email_or_mobile = document.forms['sign-in-form']['email_or_mobile'].val;
    // alert($email_or_mobile);
    // console.log(email_or_mobile);

    // $('#sign-in-form').submit(function(e){
        // e.preventDefault();
        // alert("form submit")
    // })

    // function validadateForm(email, pwd){

    //     $.ajax({
    //         url: 'sign-in-validadate.php',
    //         method: "post",
    //         data: {
    //             email: email,
    //             pwd: pwd
    //             },
    //         success: function(data)
    //         {
    //             $('.errors-list-container').html(data)
    //         }
    //     })
    // }
</script>

</html>