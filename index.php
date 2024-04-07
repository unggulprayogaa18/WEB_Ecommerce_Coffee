<?php
session_start();

$session_status = isset($_SESSION['status_home']) ? $_SESSION['status_home'] : null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coffee shop</title>
    <link rel="icon" href="img/hot-coffees.jpg" type="image/x-icon">

    <!-- links for font-awesome and bootstrap4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="main.css">
</head>

<body>

    <div class="info">
        <div class="info-left">
            <section>
                <i class="fas fa-phone"></i> +123-456-789
            </section>
            <section>
                <i class="fas fa-envelope"></i> abdulahsidik@gmail.com
            </section>
        </div>
        <div class="info-right">
            <div class="social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="info-link">
                <a href="#">shop now</a>
            </div>
        </div>

    </div>

    <!-- start header section  -->

    <header>
        <div class="logo">
            <h1 style="color: burlywood;">Coffee Shop</h1>
        </div>

        <nav class="navigation">
            <li><a href="#home" style="text-decoration: underline;">home</a></li>

            <li><a href="<?php
            if ($session_status == null || empty($session_status)) {
                echo 'shop.php';
            } else {
                echo 'shop_user.php';
            }
            ?>">shop</a></li>

            <li><a href="<?php
            if ($session_status == null || empty($session_status)) {
                echo 'login.php';
                $login = 'login';
            } else {
                echo 'loggout.php';
                $login = 'logout';
            }
            ?>">
                    <?php echo $login ?>
                </a></li>
        </nav>
        <div class="bars">
            <img src="pic/menu.png" alt="" class="bar">
        </div>
    </header>
    <!-- end header section  -->

    <!-- start home section  -->

    <div class="home-section" id="home">
        <div class="home-content">
            <h1>Bangun Semangat dengan <br> Seteguk Kebangkitan.</h1>
            <p>
                Nikmati Tiap Terasa, Rasakan Keajaiban <br> dalam Setiap Tetes .
            </p>
            <div class="home-links">
                <div class="first">
                    <a href="shop.php">Go to shop</a>
                </div>
                <div class="second">
                    <a href="#">read more</a>
                </div>
            </div>
        </div>
    </div>

    <!-- end home section  -->

    <!-- start section two  -->

    <div class="bg-service">
        <div class="service-one">
            <img src="pic/img1.jpg" alt="">
            <div class="overlay">
                <div class="over-txt">
                    <p>for drinks</p>
                    <h4>
                        coffee & drinks
                    </h4>
                </div>
            </div>
        </div>
        <div class="service-one">
            <img src="pic/img2.jpg" alt="">
            <div class="overlay">
                <div class="over-txt">
                    <p>for entertainment</p>
                    <h4>
                        beans & sweets
                    </h4>
                </div>
            </div>
        </div>
        <div class="service-one">
            <img src="pic/img3.jpg" alt="">
            <div class="overlay">
                <div class="over-txt">
                    <p>for food</p>
                    <h4>
                        croissant & cakes
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <!-- end section two  -->


    <!-- start section four  -->

    <div class="bg-menu" id="menu">
        <div class="menu-title">
            <section>what happens here</section>
            <h2>time for coffee</h2>
            <hr>
        </div>
        <div class="menu-flex">
            <div class="menu1">
                <div class="small-image">
                    <img src="pic/cup1.jpg" alt="">
                </div>
                <div>
                    <h4>caffee latte</h4>
                </div>
                <div class="line"></div>
                <div>
                    <h4>$3.86</h4>
                </div>
            </div>

            <div class="menu1">
                <div class="small-image">
                    <img src="pic/cup2.jpg" alt="">
                </div>
                <div>
                    <h4>caffee latte</h4>
                </div>
                <div class="line"></div>
                <div>
                    <h4>$4.72</h4>
                </div>
            </div>

            <div class="menu1">
                <div class="small-image">
                    <img src="pic/cup3.jpg" alt="">
                </div>
                <div>
                    <h4>caffee latte</h4>
                </div>
                <div class="line"></div>
                <div>
                    <h4>$2.45</h4>
                </div>
            </div>

            <div class="menu1">
                <div class="small-image">
                    <img src="pic/cup4.jpg" alt="">
                </div>
                <div>
                    <h4>caffee latte</h4>
                </div>
                <div class="line"></div>
                <div>
                    <h4>$5.95</h4>
                </div>
            </div>

            <div class="menu1">
                <div class="small-image">
                    <img src="pic/cup6.jpg" alt="">
                </div>
                <div>
                    <h4>caffee latte</h4>
                </div>
                <div class="line"></div>
                <div>
                    <h4>$7.02</h4>
                </div>
            </div>

            <div class="menu1">
                <div class="small-image">
                    <img src="pic/cup8.jpg" alt="">
                </div>
                <div>
                    <h4>caffee latte</h4>
                </div>
                <div class="line"></div>
                <div>
                    <h4>$6.25</h4>
                </div>
            </div>

            <div class="menu1">
                <div class="small-image">
                    <img src="pic/cup7.jpg" alt="">
                </div>
                <div>
                    <h4>caffee latte</h4>
                </div>
                <div class="line"></div>
                <div>
                    <h4>$4.00</h4>
                </div>
            </div>

            <div class="menu1">
                <div class="small-image">
                    <img src="pic/cup8.jpg" alt="">
                </div>
                <div>
                    <h4>caffee latte</h4>
                </div>
                <div class="line"></div>
                <div>
                    <h4>$5.21</h4>
                </div>
            </div>

            <div class="menu1">
                <div class="small-image">
                    <img src="pic/cup9.jpg" alt="">
                </div>
                <div>
                    <h4>caffee latte</h4>
                </div>
                <div class="line"></div>
                <div>
                    <h4>$3.16</h4>
                </div>
            </div>

            <div class="menu1">
                <div class="small-image">
                    <img src="pic/cup10.jpg" alt="">
                </div>
                <div>
                    <h4>caffee latte</h4>
                </div>
                <div class="line"></div>
                <div>
                    <h4>$4.95</h4>
                </div>
            </div>

        </div>
        <div class="menu-link">
            <a href="#">view menu</a>
        </div>
    </div>

    <!-- end section four  -->


    <!-- start section five  -->

    <div class="bg-gallery">
        <div class="gallery-flex">
            <div class="image-one event">
                <img src="pic/gallery1.jpg" alt="">
                <div class="overlay"></div>
            </div>
            <div class="inside-gallery">
                <div class="left">
                    <div class="event">
                        <img src="pic/gallery2.jpg" alt="">
                        <div class="overlay"></div>
                    </div>
                    <div class="event">
                        <img src="pic/gallery3.jpg" alt="">
                        <div class="overlay"></div>
                    </div>
                </div>

                <div class="right">
                    <div class="event">
                        <img src="pic/gallery4.jpg" alt="">
                        <div class="overlay"></div>
                    </div>
                    <div class="event">
                        <img src="pic/gallery5.jpg" alt="">
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>

            <div class="last-image event">
                <img src="pic/gallery6.jpg" alt="">
                <div class="overlay"></div>
            </div>
        </div>
    </div>

    <!-- end section five  -->


    <!-- start section six  -->

    <div class="bg-about" id="about">
        <div class="about-flex">
            <div class="about1">
                <div>
                    <img src="pic/about1.jpg" alt="">
                </div>
                <div class="image-logo">
                    <img src="pic/logo.png" alt="">
                </div>
            </div>

            <div class="about1">
                <div>
                    <img src="pic/about2.jpg" alt="">
                </div>
                <div class="about1-txt">
                    <h3>opening hours & <br> reservations</h3>
                    <div class="txt-inside">
                        <section>saturday - friday</section>
                        <section>9.00am - 9.00pm</section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end section six  -->


    <!-- start footer section  -->

    <div class="footer" id="contact">
        <div class="footer-flex">
            <div class="footer1">
                <div>
                    <img src="pic/logo.png" alt="">
                </div>
                <section>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium modi nobis qui? Vero cumque
                    iure velit quibusdam.
                </section>
                <div class="footer-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <div class="footer1">
                <h3>contact info</h3>
                <div class="location">
                    <span><i class="fas fa-map-marker-alt"></i></span>
                    <a href="#">our location</a>
                    <section>indonesia, java, kota bandung </section>
                </div>
                <div class="location">
                    <span><i class="fas fa-phone"></i></span>
                    <a href="#">our phone</a>
                    <section>+62895376555179</section>
                    <section>+628882355115</section>
                </div>
            </div>
            <div class="footer1">


                <h3>subscribe</h3>
                <form action="">
                    <input type="email" name="" id="" placeholder="your Email">
                    <a href="#">subscribe</a>
                </form>
                <div class="check">
                    <input type="checkbox" name="" id="inpt">
                    <label for="inpt">I have read and agree to all terms & conditions.</label>
                </div>

            </div>
            <div>
                <span class="text-white" style="margin-left: 380px;">@Copyright by 21552011215_ABDULAH SIDIK_TIF
                    221PB</span>
            </div>
        </div>




    </div>



    <!-- end footer section  -->





    <script src="mixitup.min.js"></script>
    <script>
        var mixer = mixitup('.consts');
    </script>
    <!-- links for jquery and bootstrap4 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>