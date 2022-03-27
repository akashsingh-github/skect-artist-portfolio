<?php
    $output = '';
    $errors = array();
    if(isset($_POST["sign-in"])){
        $email = $_POST["email"];
        $pwd = $_POST["password"];

        if($email == 'admin@web.com'){
            if($pwd == 'Admin@2512'){
                echo "<script>alert('Authentication Successfull!!!')</script>";
                header("location: admin.php");
            }
            else{
                array_push($errors, 'wrong password');
                $output .= '<li>Password not matched!!!</li>';
            }
        }
        else{
            array_push($errors, 'wrong email');
            $output .= '<li>Email ID not found!!</li>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assests/style/modal.css">
    <link rel="stylesheet" href="../assests/style/styleCopy.css">
    <title>Admin | Skecth art</title>
</head>
<body>
    <div id="sign-in-modal show-sign-in-modal">
        <div class="form-modal-container">
            <div class="modal-content">
                <div class="logo-modal-heading">
                    <h2>ADMIN</h2>
                </div>
                <div class="errors-list-container">
                    <ul>
                        <?php echo $output ?>
                    </ul>
                </div>
                <form action="" method="POST" id="sign-in-form" name="sign-in-form" enctype="multipart/form-data">
                    <div class="modal-form-container">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password">
                        </div>
                        <div class="modal-form-action">
                            <button type="submit" id="sign-in" name="sign-in" class="modal-action-btn">SIGN IN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</html>