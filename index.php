<?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "" , "sketch_art_hub") or die("Unsuccessfull connection");
    $queryUsername = '';
    $queryEmail = '';
    $queryText = '';
    $errorList = '';
    $queryErrors = array();

    if(isset($_POST["submitQuery"])){
        $queryUsername = $_POST["queryUsername"];
        $queryEmail = $_POST["queryEmail"];
        $queryText = $_POST["queryText"];

        if(empty($queryUsername)){
            array_push($queryErrors,"Name is required");
            $errorList .= '<li>Name is required </li>';
        }
        if(empty($queryEmail)){
            array_push($queryErrors,"Email is required");
            $errorList .= '<li>Email is required </li>';
        }
        if(empty($queryText)){
            array_push($queryErrors,"Enter Your Query");
            $errorList .= '<li>Enter Your Query </li>';
        }

        if(count($queryErrors) === 0){
            $insertQuery = "INSERT INTO user_query(name, email, query) VALUES('$queryUsername', '$queryEmail', '$queryText')";
            if(mysqli_query($connection, $insertQuery)){
                echo '<script>alert("Query Submitted succesfully!!!")</script>';
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
    <!-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assests/slick-master/slick/slick.css"/>
    <link rel="stylesheet" href="assests/slick-master/slick/slick-theme.css"/>
    <link rel="stylesheet" href="assests/style/styleCopy.css">
    <link rel="stylesheet" href="assests/style/modal.css">
    <title>Ganesh Sketch Art</title>

    <style>
        .hero-area{
            background-attachment: fixed;
        }
        .footer-bottom-grid{
            display: flex;
            align-items: center;
            justify-content: space-between;
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
    <?php
        // include 'modals/sign-in.php';
        // include 'modals/register.php';
        // include 'modals/priceTable.php';
    ?>

    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa fa-bars"></i>
        </label>
        <label for="logo" class="logo">GANESH SKETCH ART</label>
        <ul class="menu-list">
            <li><a href="index.php" class="active">Home</a></li>
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
            <li><a href="upload-img.php">Order</a></li>
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

    <div class="hero-area">
        <div class="container">
            <div class="text-container">
                <div class="inner-text">
                    <h1 class="text-title">GANESH SKETCH ART</h1>
                    <p class="text-detail">"Everyone do have a passsion for something in there life that motivates or inspires in some way"</p>
                    <div class="text-btn">
                        <!-- <a href="sign-in.php">Get Started</a> -->
                        <?php
                            if(isset($_SESSION['email'])){
                                echo '<a href="upload-img.php">Order Now</a>';
                            }
                            else{
                                echo '<a href="sign-in.php">Get Started</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- different sketch art types section-->
    <section class="small-blocks-area" data-scroll>
        <h2 class="block-section-title">Different types of arts</h2>
        <div class="box-wrapper" 
            data-aos-anchor-placement="top-bottom"
            data-aos="fade-right"
            data-aos-delay="0"
            data-aos-duration="2000"
        >
            <div class="boxes" data-scroll>
                
                <div class="block-outer">
                    <div class="block">
                        <div class="block-img">
                            <img src="assests\Sketches\Types of art\color.jpg" alt="">
                        </div>
                        <div class="block-text">
                            <a href="gallery/colordrawing.php">
                            <h2>Color Portrait</h2></a>
                        </div>
                    </div>
                </div>
                <div class="block-outer">
                    <div class="block">
                        <div class="block-img">
                            <img src="assests\Sketches\Types of art\portrait.jpg" alt="">
                        </div>
                        <div class="block-text">
                            <a href="gallery/portraitsketch.php">
                            <h2>Portrait Sketch</h2></a>
                        </div>
                    </div>
                </div>
                <div class="block-outer">
                    <div class="block">
                        <div class="block-img">
                            <img src="assests\Sketches\Types of art\artistic sketch.jpg" alt="">
                        </div>
                        <div class="block-text">
                            <a href="gallery/artistic.php">
                            <h2>Artistic Sketch</h2></a>
                        </div>
                    </div>
                </div>
                <div class="block-outer">
                    <div class="block">
                        <div class="block-img">
                            <img src="assests\Sketches\Types of art\Stippling art.jpg" alt="">
                        </div>
                        <div class="block-text">
                            <a href="gallery/stipplingart.php">
                            <h2>Stippling art</h2></a>
                        </div>
                    </div>
                </div>
                <div class="block-outer">
                    <div class="block">
                        <div class="block-img">
                            <img src="assests\Sketches\Types of art\quicksketch.jpg" alt="">
                        </div>
                        <div class="block-text">
                            <a href="gallery/quicksketch.php">
                            <h2>Quick sketch</h2></a>
                        </div>
                    </div>
                </div>
                
                <div class="block-outer">
                    <div class="block">
                        <div class="block-img">
                            <img src="assests\Sketches\Types of art\Digitalart.jpg" alt="">
                        </div>
                        <div class="block-text">
                            <a href="gallery/digitalart.php">
                            <h2>Digital Portrait</h2></a>
                        </div>
                    </div>
                </div>
                
               
            </div>
        </div>
    </section>

    <section class="recent-sketches-area first" data-scroll>
        <div class="sketch-container">
            <div class="area-heading" data-scroll>
                <h2>Recent sketches</h2>
                <div class="view-all-btn">
                    <a href="gallery/portraitsketch.php">View All</a>
                </div>
            </div>
            <div class="sketches first" data-scroll>
                <div class="sketch">
                    <div class="sketch-inner">
                        <div class="sketch-img">
                            <img src="assests\Sketches\recentsketch\1.jpg" alt="">
                        </div>
                        <div class="sketch-title">
                            <h3>Sketch one</h3>
                        </div>
                    </div>
                </div>
                <div class="sketch">
                    <div class="sketch-inner">
                        <div class="sketch-img">
                            <img src="assests\Sketches\recentsketch\2.jpg" alt="">
                        </div>
                        <div class="sketch-title">
                            <h3>Sketch two</h3>
                        </div>
                    </div>
                </div>
                <div class="sketch">
                    <div class="sketch-inner">
                        <div class="sketch-img">
                            <img src="assests\Sketches\recentsketch\3.jpg" alt="">
                        </div>
                        <div class="sketch-title">
                            <h3>Sketch three</h3>
                        </div>
                    </div>
                </div>
                <div class="sketch">
                    <div class="sketch-inner">
                        <div class="sketch-img">
                            <img src="assests\Sketches\recentsketch\4.jpg" alt="">
                        </div>
                        <div class="sketch-title">
                            <h3>Sketch four</h3>
                        </div>
                    </div>
                </div>
                <div class="sketch">
                    <div class="sketch-inner">
                        <div class="sketch-img">
                            <img src="assests\Sketches\recentsketch\5.jpg" alt="">
                        </div>
                        <div class="sketch-title">
                            <h3>Sketch five</h3>
                        </div>
                    </div>
                </div>
                <div class="sketch">
                    <div class="sketch-inner">
                        <div class="sketch-img">
                            <img src="assests\Sketches\recentsketch\6.jpg" alt="">
                        </div>
                        <div class="sketch-title">
                            <h3>Sketch six</h3>
                        </div>
                    </div>
                </div>
                <div class="sketch">
                    <div class="sketch-inner">
                        <div class="sketch-img">
                            <img src="assests\Sketches\recentsketch\7.jpg" alt="">
                        </div>
                        <div class="sketch-title">
                            <h3>Sketch seven</h3>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <section class="c2a-area">
        <div class="container">
            <div class="inner-wrapper">
                <div data-scroll class="c2a-heading">
                    <h1 >Order your sketch just in 3 steps</h1>
                </div>
                <div class="c2a-description" data-scroll>
                    <p>Go to order now page, upload image, select your best suite and pay the price!!</p>
                </div>
                <div class="c2a-btn" data-scroll>
                    <!-- <a href="#">Order now</a> -->
                    <!-- <button id="openTableModal">Order Now</button> -->
                    <a href="order.php" id="openTableModal">Order Now</a>
                </div>
            </div>
        </div>
    </section>

    <section class="recent-sketches-area second" data-scroll>
        <div class="sketch-container">
            <div class="area-heading"
            
            >
                <h2>All time favourites</h2>
               <!--- <div class="view-all-btn">
                    <a href="#">View All</a>
                </div> -->
            </div>
            <div class="sketches second" data-scroll>
                <div class="sketch">
                    <div class="sketch-inner">
                        <div class="sketch-img">
                            <img src="assests\Sketches\favourite\1.jpg" alt="">
                        </div>
                        <div class="sketch-title">
                            <h3>Sketch one</h3>
                        </div>
                    </div>
                </div>
                <div class="sketch">
                    <div class="sketch-inner">
                        <div class="sketch-img">
                            <img src="assests\Sketches\favourite\2.jpg" alt="">
                        </div>
                        <div class="sketch-title">
                            <h3>Sketch two</h3>
                        </div>
                    </div>
                </div>
                <div class="sketch">
                    <div class="sketch-inner">
                        <div class="sketch-img">
                            <img src="assests\Sketches\favourite\3.jpg" alt="">
                        </div>
                        <div class="sketch-title">
                            <h3>Sketch three</h3>
                        </div>
                    </div>
                </div>
                <div class="sketch">
                    <div class="sketch-inner">
                        <div class="sketch-img">
                            <img src="assests\Sketches\favourite\4.jpg" alt="">
                        </div>
                        <div class="sketch-title">
                            <h3>Sketch four</h3>
                        </div>
                    </div>
                </div>
                <!----<div class="sketch"> 
                    <div class="sketch-inner">
                        <div class="sketch-img">
                            <img src="https://images.pexels.com/photos/1109541/pexels-photo-1109541.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                        </div>
                        <div class="sketch-title">
                            <h3>Sketch five</h3>
                        </div>
                    </div>
                </div>
                <div class="sketch">
                    <div class="sketch-inner">
                        <div class="sketch-img">
                            <img src="https://images.pexels.com/photos/1109541/pexels-photo-1109541.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                        </div>
                        <div class="sketch-title">
                            <h3>Sketch six</h3>
                        </div>
                    </div>
                </div>
                <div class="sketch">
                    <div class="sketch-inner">
                        <div class="sketch-img">
                            <img src="https://images.pexels.com/photos/1109541/pexels-photo-1109541.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                        </div>
                        <div class="sketch-title">
                            <h3>Sketch seven</h3>
                        </div>
                    </div>
                </div> -->
                
            </div>
        </div>
    </section>

    <div class="query-request-section" data-scroll>
        <div class="container">
            <div class="form-container">
              
                <h2 class="query-heading">Ask your query</h2>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail">Name: </label>
                          <input type="text"  name="queryUsername" class="form-control" id="query-user-name" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Email: </label>
                          <input type="email"  name="queryEmail" class="form-control" id="query-user-password" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="query-input">Enter your query: </label><br>
                        <textarea name="queryText"  id="query-input" rows="5"></textarea>
                    </div>
                    <button type="submit" id="submitQuery" name="submitQuery" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <section class="client-feedback-area" data-scroll>
        <div class="container">
            <div class="feedback-heading">
                <h2>Our Happy Clients</h2>
            </div>
            <div class="feedbacks">
                <div class="feedback">
                    <div class="client" data-scroll>
                        <div class="client-img">
                            <img src="https://images.pexels.com/photos/618613/pexels-photo-618613.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                        </div>
                        <div class="client-description">
                            <h3 class="client-name">John Doe</h3>
                            <h5 class="client-work">Designer</h5>
                            <div class="feedback-para">
                                <p><span class="quotes"><i class="fa fa-quote-left"></i></span> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem aut suscipit veritatis sint repellendus culpa modi voluptatibus nihil animi quaerat!<span class="quotes"><i class="fa fa-quote-right"></i></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="art-image">
                        <img src="gallery/sketches\portrait\5.jpg" alt="#">
                    </div>
                </div>
                <div class="feedback">
                    <div class="client">
                        <div class="client-img">
                            <img src="https://images.pexels.com/photos/2897883/pexels-photo-2897883.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                        </div>
                        <div class="client-description">
                            <h3 class="client-name">Akash Singh</h3>
                            <h5 class="client-work">Web developer</h5>
                            <div class="feedback-para">
                                <p><span class="quotes"><i class="fa fa-quote-left"></i></span> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem aut suscipit veritatis sint repellendus culpa modi voluptatibus nihil animi quaerat!<span class="quotes"><i class="fa fa-quote-right"></i></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="art-image">
                        <img src="gallery/sketches\portrait\2.jpg" alt="#">
                    </div>
                </div>
                <div class="feedback">
                    <div class="client">
                        <div class="client-img">
                            <img src="https://images.pexels.com/photos/937483/pexels-photo-937483.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                        </div>
                        <div class="client-description">
                            <h3 class="client-name">Nishant Patil</h3>
                            <h5 class="client-work">Singer</h5>
                            <div class="feedback-para">
                                <p><span class="quotes"><i class="fa fa-quote-left"></i></span> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem aut suscipit veritatis sint repellendus culpa modi voluptatibus nihil animi quaerat!<span class="quotes"><i class="fa fa-quote-right"></i></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="art-image">
                        <img src="gallery/sketches\artisticsketch1\4.jpg" alt="#">
                    </div>
                </div>
                <div class="feedback">
                    <div class="client">
                        <div class="client-img">
                            <img src="https://images.pexels.com/photos/1438081/pexels-photo-1438081.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                        </div>
                        <div class="client-description">
                            <h3 class="client-name">Asif shaikh</h3>
                            <h5 class="client-work">Dancer</h5>
                            <div class="feedback-para">
                                <p><span class="quotes"><i class="fa fa-quote-left"></i></span> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem aut suscipit veritatis sint repellendus culpa modi voluptatibus nihil animi quaerat!<span class="quotes"><i class="fa fa-quote-right"></i></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="art-image">
                        <img src="gallery/sketches\artisticsketch1\1.jpg" alt="#">
                    </div>
                </div>
            </div>
        </div>
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

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <!-- <script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-storage.js"></script> -->
    <script src="assests/slick-master/slick/slick.js"></script>
    <!-- <script src="https://unpkg.com/aos@next/dist/aos.js"></script> -->
    <script src="assests/js/main.js"></script>
    <!-- <script src="assests/js/modals1.js"></script> -->
    <script src="assests/js/modals.js"></script>
    <!-- <script src="assests/js/modals1.js"></script> -->
    <script src="https://unpkg.com/scroll-out/dist/scroll-out.min.js"></script>

    <script>
        ScrollOut({
            threshold : 0.4,
            once: true
        });
    </script>
</body>
</html>