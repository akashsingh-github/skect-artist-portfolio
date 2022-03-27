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
        $state = $_POST["state"];
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
        else{
            if(strlen($pwd) <= '8'){
                array_push($errors, 'Password must contain at least 8 characters!!');
                $output .= '<li>Password must contain at least 8 characters!!</li>';
            }
            elseif(!preg_match('#[0-9]+#', $pwd)){
                array_push($errors, 'Your password must contain at least 1 number!!');
                $output .= '<li>Your password must contain at least 1 number!!</li>';
            }
            elseif(!preg_match('#[A-Z]+#', $pwd)){
                array_push($errors, 'Your password must contain at least 1 Capital Letter!!');
                $output .= '<li>Your password must contain at least 1 Capital Letter!!</li>';
            }
            elseif(!preg_match('#[a-z]+#', $pwd)){
                array_push($errors, 'Your password must contain at least 1 Small Letter!!');
                $output .= '<li>Your password must contain at least 1 Small Letter!!</li>';
            }
            elseif(!preg_match('/[\'^$%&*()}{@#~?><>,|=_+-]/', $pwd)){
                array_push($errors, 'Your Password must contain at least 1 special letter!!!');
                $output .= '<li>Your Password must contain at least 1 special letter!!!</li>';
            }
        }
        if(empty($confirm_pwd)){
            array_push($errors, 'Please confirm the password');
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
                header('location: sign-in.php');
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
    <link rel="stylesheet" href="assests/style/modal.css">
    <link rel="stylesheet" href="assests/style/styleCopy.css">
    <title>REGISTER | APRATIMKALA</title>
    <style>
        #register-modal{
            display: block;
        }
        .form-modal-container{
            width: 70%;
            top: 10%;
            bottom: 10%;
            transform: translate(-50%, 0%);
            overflow-y: scroll;
            overflow-x: hidden;
        }
        .form-group-grid-3{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 25px;
        }
        .selectState{
            width: 100% !important;
            display: none;
        }
        select{
            width: 100%;
            height: 45px;
        }
        .errors-list-container ul li{
            color: #fff !important;
        }
    </style>
</head>
<body>
    <div id="register-modal register-modal-show">
        <div class="form-modal-container">
            <div class="modal-content">
                <div class="logo-modal-heading">
                    <h2>REGISTER</h2>
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
                                <label for="state">state</label><br>
                                <select name="state" id="stateLisrt" name="selectState">
                                    <option value="">---- select state ----</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chattishgarh">Chattishgarh</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujrat">Gujrat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="West Bengal">West Bengal</option>
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
<script src="assests/js/modals.js"></script>

</html>