<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Portrait Skecth | Ganesh Skecth Art</title>
    <!-- <link rel="stylesheet" href="../assests/style/style.css"> -->
    <link rel="stylesheet" href="../assests/style/style.css">
    <link rel="stylesheet" href="../assests/style/lightbox.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
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
            <li><a href="../index.php">Home</a></li>
            <li class="submenu" class="active">
                Gallery
                <ul class="submenu-list">
                    <li class="submenu-list-item"><a href="artistic.php">Artistic art</a></li>
                    <li class="submenu-list-item"><a href="colordrawing.php">Color Drowing</a></li>
                    <li class="submenu-list-item"><a href="digitalart.php">Digital Skecth</a></li>
                    <li class="submenu-list-item"><a href="portraitsketch.php">Portrait Skecth</a></li>
                    <li class="submenu-list-item"><a href="stipplingart.php">Stippling art</a></li>
                    <li class="submenu-list-item"><a href="quicksketch.php">Quick Sketch</a></li>
                </ul>
            </li>
            <li><a href="../upload-img.php">Order</a></li>
            <li><a href="../about-me.php">About Me</a></li>
            <!-- <li><a href="sign-in.php" id="open-sign-in-modal"><i class="fa fa-user"></i>sign in</a></li> -->
            <?php
                session_start();
                if(isset($_SESSION['email'])){
                    echo '<li><a href="../logout.php" id="open-sign-in-modal"><i class="fa fa-power-off"></i>Log Out</a></li>';
                }
                else{
                    echo '<li><a href="../sign-in.php" id="open-sign-in-modal"><i class="fa fa-user"></i>sign in</a></li>';
                }

            ?>
        </ul>
    </nav>

    <div class="gallery-section portrait">
        <div class="gallery-section-inner">
            <div class="gallery-section-header">
                <h3>Qucik sketches</h3>
                <div class="view-all-btn">
                    <a href="gallery/quicksketch.html">View All</a>
                </div>
            </div>
            <div class="gallery-section-images">
                <div class="all-gallery-image">
                    <a href="sketches\quicksketches1\1.jpg" data-lightbox="mygallery">
                        <img src="sketches\quicksketches\1.jpg" alt="">
                    </a>
                </div>
                <div class="all-gallery-image">
                    <a href="sketches\quicksketches1\2.jpg" data-lightbox="mygallery">
                        <img src="sketches\quicksketches\2.jpg" alt="">
                    </a>
                </div>
                <div class="all-gallery-image">
                    <a href="sketches\quicksketches1\3.jpg" data-lightbox="mygallery">
                        <img src="sketches\quicksketches\3.jpg" alt="">
                    </a>
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


    <script src="../assests/js/lightbox-plus-jquery.min.js"></script>
</body>
</html>