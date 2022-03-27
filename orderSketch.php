<?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "" , "sketch_art_hub") or die("Unsuccessfull connection");
    $firstName = '';
    $lastName = '';
    $emailID = '';
    $mobileNo = '';
    $addressLine1 = '';
    $addressLine2 = '';
    $addressLine3 = '';
    $state = '';
    $city = '';
    $zip = 000;
    $sketch_img_1 = '';
    $sketch_img_2 = '';
    $sketch_img_3 = '';
    $fileSeperator = '-';
    $error_output = '';
    $errors = array();

    if(isset($_POST["submitSketch"])){
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $emailID = $_POST["emailID"];
        $mobileNo = $_POST["mobileNo"];
        $addressLine1 = $_POST["addressLine1"];
        $addressLine2 = $_POST["addressLine2"];
        $addressLine3 = $_POST["addressLine3"];
        $state = $_POST["state"];
        $city = $_POST["city"];
        $zip = $_POST["zip"];   
        $file = $_FILES['sketchImage'];
        $fileName = $_FILES['sketchImage']['name'];
        $fileTmpName = $_FILES['sketchImage']['tmp_name'];
        $fileSize = $_FILES['sketchImage']['size'];
        $fileError = $_FILES['sketchImage']['error'];
        $fileType = $_FILES['sketchImage']['type'];
        $fileExtension  = explode('.', $fileName);
        $fileActualExtension = strtolower(end($fileExtension));
        $allowed = array('jpg', 'jpeg', 'png', 'zip');
        // print_r($file);
        // echo $fileName;
        if(in_array($fileActualExtension, $allowed)){
            $output .= '
                        <div class="error-output-container">
                            <ul class="error-list">
                        ';
            if($fileError === 0){
                $sketch_img_1  = $emailID.$fileSeperator.$firstName.$fileSeperator."$fileName";
                echo $sketch_img_1;
                if($fileSize < 1000000){
                    $newSkecthName = uniqid('', true).".".$fileActualExtension;
                    $fileDestination = 'Image-to-be-sketch/'.$sketch_img_1;
                    move_uploaded_file($fileTmpName, $fileDestination);
                }   
                else{
                    echo "File size is too big";
                }
            }
            else{
                array_push($errors, "Error in uploading Image");
                echo "There is an error while uploading Image try Again!!!";
            }
        }
        else{
            array_push($errors, "File type Erros");
            $output .= '<li>Please select .jpg, .png and .jpeg file type only</li>';
        }
        if(empty($fileName)){
            array_push($errors,"File must be uploaded");
            $output .= '<li>Please select the file</li>';
        }
        if(empty($firstName)){
            array_push($errors, "First Name must be required !!!");
            $output .= '<li>First Name is required!!!</li>';
        }
        if(empty($lastName)){
            array_push($errors, "Last Name must be required !!!");
            $output .= '<li>Last Name is required!!!</li>';
        }
        if(empty($emailID)){
            array_push($errors, "Email is required!!!");
            $output .= '<li>Email is required!!!</li>';
        }
        if(empty($addressLine1)){
            array_push($errors, "Adress Line 1 is required!!!");
            $output .= '<li>Address line 1 is required!!!</li>';
        }
        if(empty($addressLine2)){
            array_push($errors, "Adress Line 2 is required!!!");
            $output .= '<li>Address line 2 is required!!!</li>';
        }
        // if(empty($state)){
        //     array_push($errors, 00);
        //     $output .= '<li>Please select the state!!!</li>';
        // }
        if(empty($zip)){
            array_push($errors, 000);
            $output .= '<li>Plaese enter the zip code</li>';
        }
        if(empty($city)){
            array_push($city, "city is required!!!");
            $output .= '<li>City name is required!!!</li>';
        }
        if(empty($mobileNo)){
            array_push($errors, "Mobile number is required");
            $output .= '<li>Please enter your mobile number!!!</li>';
        }

        //couting error if it is not zero
        if(count($errors) === 0){

            // $insertQuery = "INSERT INTO order_sketch(first_name, last_name, email_id, mobile_number, address_line_1, address_line_2, address_line_3, state, city, pin_code, image_1, image_2, image_3) VALUES('$firstName', '$lastName', '$emailID', '$mobileNo' , '$addressLine1', '$addressLine2', '$addressLine3', '$state', '$city', '$zip', '$sketch_img_1', '$sketch_img_2', '$sketch_img_3')";
            // if(mysqli_query($connection, $insertQuery)){
            //     echo "Record added succesfully!!!";
            // }
            // else{
            //     echo "Error: " . $insertQuery . "<br/>" . mysqli_error($connection);
            // }
        }
        else{
            echo "error before execution!!!";
        }
        $output .= '
                        </ul>
                    </div>
        ';
        echo $output;
    }
?>