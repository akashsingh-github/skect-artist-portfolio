<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assests/style/styleCopy.css">
    <!-- <link rel="stylesheet" href="assests/style/style.css"> -->
    <link rel="stylesheet" href="assests/slick-master/slick/slick.css"/>
    <link rel="stylesheet" href="assests/slick-master/slick/slick-theme.css"/>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="assests/style/animation.scss"/>
    <title>About Me | Ganesh Skecth art</title>
    <style>
        .card-down{
            transform: translateY(50%) !important;
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
            <li><a href="upload-img.php">Order</a></li>
            <li><a href="about-me.php" class="active">About Me</a></li>
            <!-- <li><a href="sign-in.php" id="open-sign-in-modal"><i class="fa fa-user"></i>sign in</a></li> -->
            <?php
                session_start();
                if(isset($_SESSION['email'])){
                    echo '<li><a href="logout.php" id="open-sign-in-modal"><i class="fa fa-power-off"></i>Log Out</a></li>';
                }
                else{
                    echo '<li><a href="sign-in.php" id="open-sign-in-modal"><i class="fa fa-user"></i>sign in</a></li>';
                }

            ?>
        </ul>
    </nav>

    <div class="outer-about" data-scroll>
        <div class="inner-about">
            <div class="artist-info about-card" data-scroll>
                <div class="about-card-container">
                    <div class="about-media">
                        <div class="artist-about-img">
                            <img src="assests\Sketches\Artistpic\artistpic.jpg" alt="">
                        </div>
                    </div>
                    <div class="about-text">
                        <div class="text-heading">
                            <h3>Basic information</h3>
                        </div>
                        <div class="info-list">
                            <li>Name: GANESH M. SAWANT</li>
                            <li>Contact No. : 9321585085</li>
                            <li>Email: akash9321singh@gmail.com</li>
                            <li>Address: Adivali goan, near hanuman mandir, kalyan(E)</li>
                        </div>
                    </div>
                </div>
            </div>
            <div class="artist-journey about-card" data-scroll>
                <div class="about-card-container">
                    <div class="about-text">
                        <div class="text-heading">
                            <h3>Artist Journey</h3>
                        </div>
                        <div class="journey-p text-justify f-17">
                            <p>Everyone do have a passion for something in their life that motivates or inspires in some way."
                                I am also one of them and passionate about portrait sketching that sometimes I don't even know what I am drawing but I draw.
                                In childhood I am not good in drawing.Those were the days when I used to draw some stuff on the last page of my notebook while the teacher was teaching some other subject. Last one and half  years I started to draw portrait sketches. when I get a time then I involved this time to improve my sketching skill . For me, Drawing and Painting is something that i can't live without. It's my Life.
                                I am not an expert artist but I will surely wanna be the one if I'll get a chance. Till then, I am improving my current skill level.</p>
                        </div>
                    </div>
                    <div class="about-media">
                        <div class="artist-journey-video">
                            <iframe class="journey-video" src="https://www.youtube.com/embed/I6mCTKst9II" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="small-blocks-area" data-scroll>
            <h2 class="block-section-title">Different types of arts</h2>
            <div class="box-wrapper" 
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
    </div>


    <section class="why-choose-us-area">
        <div class="section-container">
            <div class="section-heading" data-scroll>
                <h2>Why choose us?</h2>
            </div>
            <div class="feature-card-container">
                <div class="inner-card">
                    <div>
                        <div class="feature-card-wrapper card-up" data-scroll>
                            <div class="feature-top">
                                <div class="feature-title">
                                    <h3>Door to Door shipment</h3>
                                </div>
                                <div class="feature-description">
                                    <p>Our shipment policy is better than local shipments, we guranteed the shipment on the time.</p>
                                </div>
                            </div>
                            <div class="feature-bottom">
                                <div class="feature-img">
                                    <img src="https://images.pexels.com/photos/159752/pencil-office-design-creative-159752.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="feature-card-wrapper card-down" data-scroll>
                            <div class="feature-top">
                                <div class="feature-img">
                                    <img src="https://images.pexels.com/photos/1779487/pexels-photo-1779487.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt=""/>
                                </div>
                            </div>
                            <div class="feature-bottom">
                                <div class="feature-title">
                                    <h3>Experience in sketching</h3>
                                </div>
                                <div class="feature-description">
                                    <p>I have more than 3 year experience in taking order for sketch. I have made 50+ sketches for local people.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="feature-card-wrapper card-up" data-scroll>
                            <div class="feature-top">
                                <div class="feature-title">
                                    <h3>Awesome Sketches</h3>
                                </div>
                                <div class="feature-description">
                                    <p>I have won many competition in local as well as online competition, this helps me to recognize as best sketch artist.</p>
                                </div>
                            </div>
                            <div class="feature-bottom">
                                <div class="feature-img">
                                    <img src="https://images.pexels.com/photos/1714208/pexels-photo-1714208.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="feature-card-wrapper card-down" data-scroll>
                            <div class="feature-top">
                                <div class="feature-img">
                                    <img src="https://images.pexels.com/photos/2007647/pexels-photo-2007647.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt=""/>
                                </div>
                            </div>
                            <div class="feature-bottom">
                                <div class="feature-title">
                                    <h3>Customer satisfaction</h3>
                                </div>
                                <div class="feature-description">
                                    <p>We have provided our services in different art-type like portrait, pencil sketch for more than 50+ people. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <!-- <section class="footer">
        <footer>
            <div class="footer-inner">
                <div class="footer-grid">
                    <div class="footer-logo">
                        <img src="#"/>
                    </div>
                    <div class="footer-p footer-title">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas quasi quia animi molestiae aliquam porro, recusandae, vel sint provident qui odit nobis nemo, eveniet autem.</p>
                    </div>
                </div>
                <div class="footer-grid">
                    <div class="footer-title">
                        <h3>Quick Links</h3>
                    </div>
                    <div class="footer-list">
                        <ul>
                            <li class="footer-list-item"><a href="#">HOME</a></li>
                            <li class="footer-list-item"><a href="#">GALLERY</a></li>
                            <li class="footer-list-item"><a href="#">ORDER</a></li>
                            <li class="footer-list-item"><a href="#">ABOUT US</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-grid">
                    <div class="footer-title">
                        <h3>Connect With Us</h3>
                    </div>
                    <div class="footer-list">
                        <ul>
                            <li class="footer-list-item facebook"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i>FACEBOOK</a></li>
                            <li class="footer-list-item whatsapp"><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i>WHATSAPP</a></li>
                            <li class="footer-list-item instagram"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i>INSTAGRAM</a></li>
                            <li class="footer-list-item twitter"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i>TWITTER</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-grid">
                    <div class="footer-title">
                        <h3>Contact Us</h3>
                    </div>
                    <div class="footer-list">
                        <ul>
                            <li class="footer-list-item">Address: </li>
                            <li class="footer-list-item">Email: XXXXXXXXXXXXXX</li>
                            <li class="footer-list-item">Mobile: 9321585085</li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </section> -->

    <section class="footer-area">
        <footer>
            <div class="footer-grid">
                <div class="footer-comp">
                    <h5>Logo will be here</h5>
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
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="https://unpkg.com/scroll-out/dist/scroll-out.min.js"></script>
<script src="assests/slick-master/slick/slick.js"></script>
<script src="assests/js/main.js"></script>

<script src="https://unpkg.com/scroll-out/dist/scroll-out.min.js"></script>
<script src="assests/slick-master/slick/slick.js"></script>
<script src="assests/js/main.js"></script>

<script src="assests/js/main.js"></script>
<script>
    ScrollOut({
        threshold : 0.65,
        once: true
    });
</script>
</html>