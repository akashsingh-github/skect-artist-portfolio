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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assests/style/styleCopy.css">
    <title>Upload Image | Ganesh Sketch art</title>
    <style>
        .order-steps-container{
            width: 35%;
        }
        .order-steps-container,
        .modal-content{
            border-radius: 20px !important;
        }
        button a{
            display: block;
            color: #fff !important;
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
            <li><a href="order.php" class="active">Order</a></li>
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
            <div class="step1 steps active-steps">1</div>
            <div class="step2 steps">2</div>
            <div class="step3 steps">3</div>
        </div>
        <div class="floating-rect"></div>
    </div>

    <div class="order-img-page">
        <div class="order-steps-container">
            <div class="modal-content">
                <div class="modal-inner">
                    <h4 class="modal-heading">Drop an Image for sketch</h4>
                    <input type="file" id="imageToBeUpload">
                    <button onclick="uploadImage()" id="uploadImageBtn">Upload Image</button>
                    <div class="selected-image-container">
                        <img src="" alt="" id="selected-image">
                    </div>
                    <a id="url"></a>
                    <div class="selectImageBtn">
                        <button id="openPaymentModal" class="next-modal-btn"><a href="order.php"> NEXT</a></button>
                        <button id="closeImageModal" class="close-modal">CANCEL</button>
                    </div>
                    <!-- <input type="file" id="photo">
                    <button onclick="uploadImage()" id="upload">Upload Image</button>
                    <img src="" alt="" id="image">
                    <a id="url"></a>
                    <div id="compare"></div> -->
                </div>

            </div>
        </div>
    </div>

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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-storage.js"></script>
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyBsz-RSRgxxRcVfpSsfG4c_eCwm5p67fSY",
        authDomain: "imageupload-f3bf1.firebaseapp.com",
        databaseURL: "https://imageupload-f3bf1.firebaseio.com",
        projectId: "imageupload-f3bf1",
        storageBucket: "imageupload-f3bf1.appspot.com",
        messagingSenderId: "692880566205",
        appId: "1:692880566205:web:c4a52bf5faa28f4d0894d4"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    console.log(firebase);

    function uploadImage(){
      
        alert("Upload image")

        const ref = firebase.storage().ref()

        console.log(ref)

        const file = document.querySelector('#imageToBeUpload').files[0]

        const name = new Date() + '-' + file.name

        const metaData = {
            contentType:file.type
        }

        const task = ref.child(name).put(file, metaData)

        task
        .then(snapshot => snapshot.ref.getDownloadURL())
        .then(url => {
                // console.log(url)
                sendURL(url);
                alert("Image uploaded successfully")
                const image = document.querySelector("#selected-image")
                image.src = url
                // const imageURL = document.querySelector("#url")
                // imageURL.text = url
                // imageURL.href = url
        });
        ref = ''
        file = ''
        name = ''
    }

    function sendURL(url){
        console.log("Send url function!!")

        $.ajax({
            url: "./modals/upload.php",
            method: "post",
            data: {url:url},
            success: function(data)
            {
                $("#compare").html(data);
            }
        });
    }
</script>
</html>