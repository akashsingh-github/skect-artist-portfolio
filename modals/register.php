<?php
    // session_start();
    $connection = mysqli_connect("localhost", "root", "" , "sketch_art_hub") or die("Unsuccessfull connection");
    $first_name = '';
    $last_name = '';
    $email = '';
    $mobile_number = '';
    $address_line_1 = '';
    $address_line_2 = '';
    $address_line_3 = '';
    $pin = '';
    $state = '';
    $output = '';
    $errors = array();
    $pwd = '';
    $confirm_pwd = '';

    if(isset($_POST["register"])){
        // echo "<script>alert('regsiter btn clicked now')</script>";
        $first_name = $_POST["first_name"]; 
        $last_name = $_POST["last_name"]; 
        $email = $_POST["email"];
        $mobile_number = $_POST["mobile_number"];
        $address_line_1 = $_POST["address_line_1"];
        $address_line_2 = $_POST["address_line_2"];
        $address_line_3 = $_POST["address_line_3"];
        $city = $_POST["city"];
        $pin = $_POST["pin"];
        $pwd = $_POST["pwd"];
        $confirm_pwd = $_POST["confirm_pwd"];
        $encrpt_pwd = password_hash($pwd, PASSWORD_BCRYPT);

        if($pwd !== $confirm_pwd){
            array_push($errors, 'Password mismatch');
            $output .= '<li>Password not matched!!!</li>';
        }
        if(empty($first_name)){
            array_push($errors, 'First Name is required');
            $output .= '<li>First Name must be required!!!</li>';
        }
        if(empty($last_name)){
            array_push($errors, 'Name is required');
            $output .= '<li>Last Name must be required!!!</li>';
        }
        if(empty($email)){
            array_push($errors, 'Email is required');
            $output .= '<li>Email must be required!!!</li>';
        }
        else{
            $email_exists = '
                SELECT * FROM user_data
                WHERE email = "'.$email.'"
            ';
            $store_email = mysqli_query($connection, $email_exists);
            if(mysqli_num_rows($store_email) > 0){
                $output .= '<li>Email already exists</li>';
            }
        }
        if(empty($mobile_number)){
            array_push($errors, 'Mobile Number is required');
            $output .= '<li>Mobile Number is required!!!</li>';
        }
        else{
            $mobile_number_exists = '
                SELECT * FROM user_data
                WHERE mobile_number = "'.$mobile_number.'"
            ';
            $store_mobile_number = mysqli_query($connection, $mobile_number_exists);
            if(mysqli_num_rows($store_mobile_number) > 0){
                $output .= '<li>Mobile Number already exists</li>';
            }
        }
        if(empty($address_line_1)){
            array_push($errors, 'Address line 1 is required');
            $output .= '<li>Address Line 1 is required!!!</li>';
        }
        if(empty($address_line_2)){
            array_push($errors, 'Address line 2 is required');
            $output .= '<li>Address Line 2 is required!!!</li>';
        }
        if(empty($pwd)){
            array_push($errors, 'Please select your password');
            $output .= '<li>Please select your password</li>';
        }
        if(empty($confirm_pwd)){
            array_push($errors, 'Please enter the confirm password field');
            $output .= '<li>Confirm your password</li>';
        }
        if(empty($pin)){
            array_push($errors, 'Enter the pin');
            $output .= '<li>Please enter the pin</li>';
        }
        if(empty($city)){
            array_push($errors, 'Enter the city name: ');
            $output .= '<li>Please enter the city name</li>';
        }
        if(count($errors) === 0){
            $insertQuery = "INSERT INTO user_data(first_name, last_name, email, password, address_line_1, address_line_2, address_line_3, state, pin, mobile_number, city) VALUES('$first_name', '$last_name', '$email', '$encrpt_pwd', '$address_line_1', '$address_line_2', '$address_line_3', '$state', '$pin', '$mobile_number', '$city')";
            if(mysqli_query($connection, $insertQuery)){
                echo '<script>alert("Form submitted successfully!!!")</script>';
            }
            else{
                echo "Error: " . $insertQuery . "<br/>" . mysqli_error($connection);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assests/style/modal.css">
    <!-- <link rel="stylesheet" href="../assests/style/style.css"> -->
    <title>REGISTER | APRATIMKALA</title>
    
</head>
<body>
    <div id="register-modal"
    <?php
        if(count($errors) !== 0){
            echo 'class="register-modal-show"';
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
                <div class="modal-form-container">
                    <form action="" method="POST">
                        <div class="form-group-grid">
                            <div class="form-group">
                                <label for="first_name">First Name: </label>
                                <input type="text" name="first_name" id="first_name">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name: </label>
                                <input type="text" name="last_name" id="last_name">
                            </div>
                        </div>
                        <div class="form-group-grid">
                            <div class="form-group">
                                <label for="email">Email: </label>
                                <input type="email" name="email" id="email">
                            </div>
                            <div class="form-group">
                                <label for="mobile_number">Mobile Number: </label>
                                <input type="number" name="mobile_number" id="mobile_number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address_line_1">Address Line 1</label>
                            <input type="text" name="address_line_1" id="address_line_1">
                        </div>
                        <div class="form-group">
                            <label for="address_line_2">Address line 2</label>
                            <input type="text" name="address_line_2" id="address_line_2">
                        </div>
                        <div class="form-group">
                            <label for="address_line_3">Address Line 3</label>
                            <input type="text" name="address_line_3" id="address_line_3">
                        </div>
                        <div class="form-group-grid-3">
                            <div class="form-group">
                                <label for="state">state</label>
                                <select name="state" id="stateLisr=t">
                                    <option value="Maharashtra">MAHARASHTRA</option>
                                    <option value="BIHAR">BIHAR</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pin">PIN</label>
                                <input type="number" name="pin" id="pin" placeholder="Enter your pin code">
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" name="city" id="city">
                            </div>
                        </div>
                        <div class="form-group-grid">
                            <div class="form-group">
                                <label for="password">Password: </label>
                                <input type="password" name="pwd" id="password">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password: </label>
                                <input type="password" name="confirm_pwd" id="confirm_password">
                            </div>
                        </div>

                        <div class="modal-form-action">
                            <button type="submit" id="register" name="register" class="modal-action-btn">REGISTER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
</script>
<script src="../assests/js/modals1.js"></script>

</html>