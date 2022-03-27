<?php
    session_start();
    if( isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        $user_id = $_SESSION['user_id'];
    }
    else{
        echo "<script>alert('Sign In first!!!')</script>";
        header('location: sign-in.php');
    }
    // session_abort();
    $errors = array();
    $totalPrice = 0;
    $printError = '';

    if(isset($_POST["openImageModal"])){
        echo "<script>alert('Hello from php')</script>";
        $artTypePrice = $_POST["select-art-type"];
        $perHeadPrice = $_POST["select-heads"];
        $paperSizePrice = $_POST["select-paper-size"];
        
        if($artTypePrice == 0){
            echo "<script>alert('Please select the art type!!!')</script>";
            array_push($errors, 'Please select art type');
            $printError .= '<li>Please select the art type</li>';
        }
        else{
            $totalPrice = $totalPrice + $artTypePrice;
        }
        if($perHeadPrice == 0){
            echo "<script>alert('Please select the number of heads!!!')</script>";
            array_push($errors, 'Please select number of heads');
            $printError .= '<li>Please select the art type</li>';
        }
        else{
            $totalPrice = $totalPrice + $perHeadPrice;
        }
        if($paperSizePrice == 0){
            echo "<script>alert('Please select the paper size!!!')</script>";
            array_push($errors, 'Please select paper size');
            $printError .= '<li>Please select the paper size</li>';
        }
        else{
            $totalPrice = $totalPrice + $paperSizePrice;
        }

        if(count($errors) === 0){
            $_SESSION["checkoutPrice"] = $totalPrice;
            header("location: ./paytm/payment/PaytmKit/TxnTest.php");
            echo "<script>alert(".$_SESSION["checkoutPrice"].")</script>";
        }

        if(count($errors) != 0){
            echo "<script>alert('you can't go ahead!!')</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assests/style/modal.css">
    <!-- <link rel="stylesheet" href="assests/style/style.css"> -->
    <link rel="stylesheet" href="assests/style/styleCopy.css">
    <title>Order Art | Sketch Art Hub</title>
    <style>
        .floating-rect{
            top: 65%;
        }
        .footer-bottom-grid{
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 15px;
            padding-bottom: 15px;
        }
        .footer-bottom-grid p{
            padding-left: 100px;
        }
        .social-footer-flex{
            display: flex;
            align-items: center;
        }
        .social-footer-flex li{
            list-style: none;
            margin-right: 20px;
        }
        .social-footer-flex li a i{
            color: #fff;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa fa-bars"></i>
        </label>
        <label for="logo" class="logo">GANESH SKETCH ART</label>
        <ul class="menu-list">
            <li><a href="index.php">Home</a></li>
            <li class="submenu">
                Gallery
                <ul class="submenu-list">
                    <li class="submenu-list-item"><a href="gallery/artistic.php">Artistic art</a></li>
                    <li class="submenu-list-item"><a href="gallery/colordrawing.php">Color Drowing</a></li>
                    <li class="submenu-list-item"><a href="gallery/digitalart.php">Digital Skecth</a></li>
                    <li class="submenu-list-item"><a href="gallery/portraitsketch.php">Portrait Skecth</a></li>
                    <li class="submenu-list-item"><a href="gallery/stipplingart.php">Stippling art</a></li>
                    <li class="submenu-list-item"><a href="gallery/quicksketch.php">Quick Sketch</a></li>
                </ul>
            </li>
            <li><a href="upload-img.php" class="active">Order</a></li>
            <li><a href="about-me.php">About Me</a></li>
            <!-- <li><a href="sign-in.php" id="open-sign-in-modal"><i class="fa fa-user"></i>sign in</a></li> -->
            <?php
                // session_start();
                if(isset($_SESSION['email'])){
                    echo '<li><a href="logout.php" id="open-sign-in-modal"><i class="fa fa-power-off"></i>Log Out</a></li>';
                }
                else{
                    echo '<li><a href="sign-in.php" id="open-sign-in-modal"><i class="fa fa-user"></i>sign in</a></li>';
                }

            ?>
        </ul>
    </nav>

    <div class="steps-indicator">
        <div class="floating-steps">
            <div class="step1 steps">1</div>
            <div class="step2 steps active-steps">2</div>
            <div class="step3 steps">3</div>
        </div>
        <div class="floating-rect"></div>
    </div>

    <section class="order-now-section">
        <div class="order-now-section-inner">
            <div class="order-now-container">
                <div class="order-now-heading flex-center">
                    <div class="heading-container">
                        <!-- <h2>Order Now</h2> -->
                        <div class="line"></div>
                        <div class="order-tag-line">
                            <!-- <h4>Complete your order in just 3 steps</h4> -->
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>

        <!-- <a href="upload-img.php">upload image</a> -->

        <section>
            <div class="order-steps-container">
                <div class="modal-content">
                    <div class="modal-errors">
                        <ul id="price-table-errors">
                            
                        </ul>
                    </div>

                    <form action="" method="POST" name="price-table-form" id="price-table-form" onsubmit="return TableValidation()">
                        <div class="modal-inner">
                            <h4 class="modal-heading">Choose your best suite</h4>
                            <div class="selection-table">
                                <h2 class="price-head">Select Art type</h2>

                                <select name="select-art-type" id="select-art-type" class="select" require>
                                    <option  value="00">Select Your Art Type</option>
                                    <option value="500">Stippling Art</option>
                                    <option value="700">Artistics Art</option>
                                    <option value="900">Color Drawing </option>
                                    <option value="1000">Digital Sketch</option>
                                    <option value="1000">Portrait Sketch</option>
                                    <option value="1000">Quick Sketch</option>
                                </select>
                                <div class="disable-price">
                                    <input type="number" name="artTypePrice" id="input-art-type" class="form-control price" disabled>
                                </div>
                            </div>
                            <div class="selection-table">
                                <h2 class="price-head">Select Number of Heads</h2>

                                <select name="select-heads" id="select-heads" class="select" required>
                                    <option value="00">Select Number of Heads</option>
                                    <option value="1100">1</option>
                                    <option value="1200">2</option>
                                    <option value="1300">3</option>
                                    <option value="1400">4</option>
                                    <option value="1500">5</option>
                                </select>
                                <div class="disable-price">
                                    <input type="number" id="input-heads" class="form-control price" disabled>
                                </div>
                            </div>
                            <div class="selection-table">
                                <h2 class="price-head">Select Paper Size: </h2>

                                <select name="select-paper-size" id="select-paper-size" class="select">
                                    <option value="00">Select Paper Size</option>
                                    <option value="1100">A4</option>
                                    <option value="1200">A3</option>
                                    <option value="1300">A2</option>
                                    <option value="1400">A1</option>
                                </select>
                                <div class="disable-price">
                                    <input type="number" id="input-paper-size" class="form-control price" disabled>
                                </div>
                            </div>

                            <div class="total">
                                <h3>Total : </h3>
                                <h2 id="total-price">
                                </h2>
                            </div>

                            <div class="selectImageBtn">
                                <button id="openImageModal" name="openImageModal" class="next-modal-btn" type="submit">NEXT</button>
                                <!-- <a href="upload-img.php" id="openImageModal" class="next-modal-btn">NEXT</a> -->
                                <button id="closePriceTableModal" class="close-modal" type="button">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>


    <section class="footer-area">
        <footer>
            <div class="footer-grid">
                <div class="footer-comp">
                    <h5>GANESH SKETCH ART</h5>
                </div>
                <div class="footer-comp">
                    <h5>Nav</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#">Order</a></li>
                        <li><a href="#">About Me</a></li>
                        <li><a href="#">Sign In</a></li>
                    </ul>
                </div>
                <div class="footer-comp">
                    <ul>
                        <li>Privacy policy</li>
                        <li>shipment location</li>
                    </ul>
                </div>
                <div class="footer-comp address">
                    <h5>Address:</h5>
                    <p>Adivali gaon, near hanuman mandir, kalyan (E)</p>

                    <h6>Email: akash9321singh@gmail.com</h6>

                    <h6>Mobile: 9321585085</h6>
                </div>
            </div>
        </footer>
        <div class="bottom-footer">
            <div class="footer-inner">
                <div class="footer-bottom-grid">
                    <p>Copyright @ apratimkala.com</p>
                    <div class="social-footer-flex">
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // function TableValidation(){
    //     var getErrorList = document.querySelector("#price-table-errors");
        
    //     var getArtType = document.getElementById('select-art-type');
    //     var artTypePrice = parseInt(getArtType.value);
    //     if(artTypePrice == 0){
    //         // alert("Hi");
    //         getErrorList.innerHTML = '<li>Please select art type</li>';
    //         errorFlag = true;
    //         errorList = parseInt(errorList) + 1;
    //         return false;
    //     }
    //     else{
    //         errorList = parseInt(errorList) + 1;
    //     }
        
    //     var getHeads = document.getElementById('select-heads');
    //     var perHeadPrice = parseInt(getHeads.value);
    //     if(perHeadPrice == 0){
    //         getErrorList.innerHTML = '<li>Please select number of heads</li>';
    //         errorFlag = true;
    //         errorList = parseInt(errorList) + 1;
    //         return false;
    //     }
    //     console.log(errorFlag)
    //     var getPaperSize = document.getElementById('select-paper-size');
    //     var paperSizePrice = parseInt(getPaperSize.value);
    //     if(paperSizePrice == 0){
    //         getErrorList.innerHTML = '<li>Please select paper size</li>';
    //         errorFlag = true;
    //         errorList = parseInt(errorList) + 1;
    //         return false;
    //     }
    // }
    $('#select-art-type').on('change', function(){
        // alert("Hii")
        var getArtType = document.getElementById('select-art-type');
        var artTypePrice = parseInt(getArtType.value);
        $('#input-art-type').val(artTypePrice);
    })
    $('#select-heads').on('change', function(){
        var getHeads = document.getElementById('select-heads');
        var headsPerPrice = parseInt(getHeads.value);
        $('#input-heads').val(headsPerPrice);
    })
    $('#select-paper-size').on('change', function(){
        var getPaperSize = document.getElementById('select-paper-size');
        var paperSizePrice = parseInt(getPaperSize.value);
        $('#input-paper-size').val(paperSizePrice);
    })
    $('.select').on('change', function(){
        var totalSum = parseInt(0);
        $('.form-control.price').each(function(){
            var inputVal = $(this).val();
            if($.isNumeric(inputVal)){
                totalSum += parseFloat(inputVal);
            }
        })
        $('#total-price').text(totalSum);
    })

</script>
</html>