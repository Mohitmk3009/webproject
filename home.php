<?php

include 'config.php';

session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:login.php');
}

if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if (mysqli_num_rows($check_cart_numbers) > 0) {
        $message[] = 'already added to cart!';
    } else {
        mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
        $message[] = 'product added to cart!';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-------- title ----------->
    <title>Online Book Shop by Mohit</title>

    <!-------- customer style link ----------->
    <link rel="stylesheet" href="./css/style.css">


    <!-------- font awesome cdn link --------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />


    <!------- swipper cdn link ------------>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <style>

    </style>

</head>

<body>
    <?php include 'header.php'; ?>


    </div>
    <section class="home" id="home">

        <div class="row">

            <div class="content">
                <h3>WELCOME TO READEASE</h3>
                <p> Discover Worlds Between the Pages, Where Every Book is a Journey Waiting to Begin.Your Gateway to Endless Stories, Unleash Your Imagination with Every Click, Dive into the Magic of Books</p>
                <a href="" class="btn">Shop now</a>
            </div>

            <div class="swiper books-list">

                <div class="swiper-wrapper">
                    <a href="https://www.bookchor.com/book/9780141357034/all-the-bright-places" class="swiper-slide"><img src="./image/book-1.png" alt=""></a>
                    <a href="" class="swiper-slide"><img src="./image/book-2.png" alt=""></a>
                    <a href="" class="swiper-slide"><img src="./image/book-3.png" alt=""></a>
                    <a href="" class="swiper-slide"><img src="./image/book-4.png" alt=""></a>
                    <a href="" class="swiper-slide"><img src="./image/book-5.png" alt=""></a>
                    <a href="" class="swiper-slide"><img src="./image/book-6.png" alt=""></a>
                </div>

                <img src="./image/stand.png" class="stand" alt="">

            </div>


        </div>

    </section>

    <!-------- home section ends  ----------->

    <!-------- icons section start  ----------->

    <section class="icons-container">

        <div class="icons">
            <i class="fas fa-plane"></i>
            <div class="content">
                <h3>Over payment</h3>
                <p>Over payment &#8377;100</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-lock"></i>
            <div class="content">
                <h3>Secure payment</h3>
                <p>Secure payment</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-headset"></i>
            <div class="content">
                <h3>24/7 support</h3>
                <p>Call us anytime</p>
            </div>
        </div>

    </section>

    <!-------- icons section ends  ----------->

    <!-------- featured section start  ----------->

    <section class="featured" id="featured">

        <div class="heading"><span>Now Trending</span></div>

        <div class="swiper featured-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=1974743360"> <img src="./new images/boruto.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Boruto Blue Vortex Ch-4</h3>
                        <div class="price">&#8377;720.00<span>&#8377;899.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=1569317143"><img src="./new images/uzumaki.png" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Uzumaki Vol-1</h3>
                        <div class="price">&#8377;400.00 <span>&#8377;499.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=8416243662"> <img src="./new images/vegabond-vol37.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Vegabond Vol-37</h3>
                        <div class="price">&#8377;1,474.00 <span>&#8377;1,670.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=kagurabachi"><img src="./new images/kagurabachi.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Kagurabachi</h3>
                        <div class="price">&#8377;489.00<span>&#8377;520.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=1409181634"> <img src="./new images/the silent patient.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>The Silent Patient</h3>
                        <div class="price">&#8377;218.00<span>&#8377;320.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=0143460242"><img src="./new images/i-hear-you.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>I Hear You</h3>
                        <div class="price">&#8377;170.00<span>&#8377;220.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=9390166268"><img src="./new images/pom.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>The Psychology of Money</h3>
                        <div class="price">&#8377;310.00<span>&#8377;380.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=1421549309"><img src="./new images/vegabond-vol30.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Vegabond Vol-30</h3>
                        <div class="price">&#8377;1,320.00<span>&#8377;1,400.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=1974738700"><img src="./new images/one piece.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>One Piece Vol-103</h3>
                        <div class="price">&#8377;835.00<span>&#8377;899.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=1786330895"><img src="./new images/ikigai.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Iskigai</h3>
                        <div class="price">&#8377;350.00<span>&#8377;449.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=75960620137203011"><img src="./new images/moonknight.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Moon Knight #30</h3>
                        <div class="price">&#8377;520.00<span>&#8377;599.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>


    <!-------- featured section ends  ----------->

    <!-------- featured section start  ----------->

    <section class="featured" id="featured">

        <div class="heading"><span>Best Sellers</span></div>

        <div class="swiper featured-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=0143456555"><img src="./new images/the hidden hindu 3.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>The Hidden Hindu 3</h3>
                        <div class="price">&#8377;194.00<span>&#8377;299.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=9356290520"><img src="./new images/it start with us.webp" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>It Starts with Us</h3>
                        <div class="price">&#8377;599.00 <span>&#8377;499.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=0143456555"><img src="./new images/The_Immortals_Of_Meluha.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>The Immortals of Meluha</h3>
                        <div class="price">&#8377;320.00 <span>&#8377;439.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href=""></a> <a href="book.php?bookisbn=1612681131"><img src="./new images/rich-dad-poor-dad-cover.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Rich Dad Poor Dad</h3>
                        <div class="price">&#8377;429.00<span>&#8377;549.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=0670097111"><img src="./new images/doglapan.webp" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Doglapan</h3>
                        <div class="price">&#8377;290.00<span>&#8377;499.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=978-0143452673"> <img src="./new images/karma.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Karma</h3>
                        <div class="price">&#8377;169.00<span>&#8377;299.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=978-1847941831"> <img src="./new images/atomic habits.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Atomic Habits</h3>
                        <div class="price">&#8377;471.00<span>&#8377;799.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <img src="./new images/the-love-hypothesis.jpg" alt="">
                    </div>

                    <div class="content">
                        <h3>The Love Hypothesis</h3>
                        <div class="price">&#8377;215.00<span>&#8377;399.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=9356290970"> <img src="./new images/raavan.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Raavan</h3>
                        <div class="price">&#8377;271.00<span>&#8377;320.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=1786330895"><img src="./new images/ikigai.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Iskigai</h3>
                        <div class="price">&#8377;350.00<span>&#8377;449.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=9390166268"><img src="./new images/pom.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>The Psychology of Money</h3>
                        <div class="price">&#8377;310.00<span>&#8377;380.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>


    <!-------- featured section ends  ----------->

    <!-------- arrivals section start  ----------->

    <!-- <section class="arrivals" id="arrivals">

            <div class="heading"><span>new arrivals</span></div>

            <div class="swiper arrivals-slider">

                <div class="swiper-wrapper">

                    <a href="" class="swiper-slide box">
                        <div class="image">
                            <img src="./image/book-1.png" alt="">
                        </div>
                        <div class="content">
                            <h3>new arrivals</h3>
                            <div class="price">$15.99 <span>$20.99</span></div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </a>

                    <a href="" class="swiper-slide box">
                        <div class="image">
                            <img src="./image/book-2.png" alt="">
                        </div>
                        <div class="content">
                            <h3>new arrivals</h3>
                            <div class="price">$15.99 <span>$20.99</span></div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </a>

                    <a href="" class="swiper-slide box">
                        <div class="image">
                            <img src="./image/book-3.png" alt="">
                        </div>
                        <div class="content">
                            <h3>new arrivals</h3>
                            <div class="price">$15.99 <span>$20.99</span></div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </a>

                    <a href="" class="swiper-slide box">
                        <div class="image">
                            <img src="./image/book-4.png" alt="">
                        </div>
                        <div class="content">
                            <h3>new arrivals</h3>
                            <div class="price">$15.99 <span>$20.99</span></div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </a>

                    <a href="" class="swiper-slide box">
                        <div class="image">
                            <img src="./image/book-5.png" alt="">
                        </div>
                        <div class="content">
                            <h3>new arrivals</h3>
                            <div class="price">$15.99 <span>$20.99</span></div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </a>

                </div>
            </div>

            <div class="swiper arrivals-slider">

                <div class="swiper-wrapper">

                    
                    <a href="" class="swiper-slide box">
                        <div class="image">
                            <img src="./image/book-6.png" alt="">
                        </div>
                        <div class="content">
                            <h3>new arrivals</h3>
                            <div class="price">$15.99 <span>$20.99</span></div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </a>

                    <a href="" class="swiper-slide box">
                        <div class="image">
                            <img src="./image/book-7.png" alt="">
                        </div>
                        <div class="content">
                            <h3>new arrivals</h3>
                            <div class="price">$15.99 <span>$20.99</span></div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </a>

                    <a href="" class="swiper-slide box">
                        <div class="image">
                            <img src="./image/book-8.png" alt="">
                        </div>
                        <div class="content">
                            <h3>new arrivals</h3>
                            <div class="price">$15.99 <span>$20.99</span></div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </a>

                    <a href="" class="swiper-slide box">
                        <div class="image">
                            <img src="./image/book-9.png" alt="">
                        </div>
                        <div class="content">
                            <h3>new arrivals</h3>
                            <div class="price">$15.99 <span>$20.99</span></div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </a>

                    <a href="" class="swiper-slide box">
                        <div class="image">
                            <img src="./image/book-10.png" alt="">
                        </div>
                        <div class="content">
                            <h3>new arrivals</h3>
                            <div class="price">$15.99 <span>$20.99</span></div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
      </section> -->


    <!-------- arrivals section ends  ----------->

    <!-- <section class="products">

        <h1 class="title">Latest products</h1>

        <div class="box-container">


            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {


            ?>
                    <form action="" method="post" class="box">
                        <a href="book.php?bookisbn=<?php echo $fetch_products['book_isbn']; ?>">
                            <img class="image" src="uploaded_img/<?php echo $fetch_products['book_image']; ?>" alt="">
                        </a>
                        <div class="name"><?php echo $fetch_products['book_name']; ?></div>
                        <div class="name">"by"<?php echo $row['author_name']; ?></div>
                        <div class="price">&#8377;<?php echo $fetch_products['book_price']; ?>/-</div>
                        <input type="number" min="1" name="product_quantity" value="1" class="qty">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_products['book_name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_products['book_price']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_products['book_image']; ?>">
                        <a href="uploads/files/<?= $book['file'] ?>"class="btn btn-success">Open</a>
                        <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                    </form>

            <?php
                }
            } else {
                echo '<p class="empty">no products added yet!</p>';
            }
            ?>
        </div>

        <div class="load-more" style="margin-top: 2rem; text-align:center">
            <a href="shop.php" class="option-btn">load more</a>
        </div>

    </section> -->


    <!-------- deal section start  ----------->

    <section class="deal">

        <div class="content">
            <h3>Deal of the day</h3>
            <h1>upto 40% offers</h1>
            <p>
                You can take up to 40% off to step up your studies and skills with ReadEase Deal of the Day Books. Buy books online such as Rich Dad Poor Dad, Manorama, Ikigai, etc.
            </p>
            <a href="" class="btn">Shop now</a>
        </div>

        <div class="image">
            <img src="./image/deal-img.jpg" alt="">
        </div>

    </section>

    <!-------- deal section ends  ----------->
    <!-------- arrivals section start  ----------->

    <section class="arrivals" id="arrivals">

        <div class="heading"><span>Discount</span></div>

        <div class="swiper arrivals-slider">

            <div class="swiper-wrapper">
                <a href="book.php?bookisbn=1408855666" class="swiper-slide box">
                    <div class="price" style="position: absolute;top: 1rem;right: 1rem;border-radius: 50%;padding: 1.5rem .9rem;font-size: 2rem;color: var(--white);background-color: var(--red);">40%</div>

                    
                    <div class="image">
                        <img src="./new images/harry_potter_and_the_chamber_of_secrets.jpeg" alt="">
                    </div>
                    <div class="content">
                        <h3>Harry Potter and the Chamber of Secrets</h3>
                        <div class="price">&#8377;389.00 <span>&#8377;599.00</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>


                <a href="" class="swiper-slide box">
                <div class="price" style="position: absolute;top: 1rem;right: 1rem;border-radius: 50%;padding: 1.5rem .9rem;font-size: 2rem;color: var(--white);background-color: var(--red);">40%</div>

                    <div class="image">
                        <img src="./new images/a-good-girls-guide-to-murder.jpeg" alt="">
                    </div>
                    <div class="content">
                        <h3>A Good Girl's Guide to Murder</h3>
                        <div class="price">&#8377;320 <span>&#8377;429.00</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="" class="swiper-slide box">
                <div class="price" style="position: absolute;top: 1rem;right: 1rem;border-radius: 50%;padding: 1.5rem .9rem;font-size: 2rem;color: var(--white);background-color: var(--red);">40%</div>

                    <div class="image">
                        <img src="./new images/The_Oath_of_the_Vayuputras.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>The Oath of the Vayuputras</h3>
                        <div class="price">&#8377;367.00 <span>&#8377;450.00</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="" class="swiper-slide box">
                <div class="price" style="position: absolute;top: 1rem;right: 1rem;border-radius: 50%;padding: 1.5rem .9rem;font-size: 2rem;color: var(--white);background-color: var(--red);">40%</div>

                    <div class="image">
                        <img src="./new images/jjk.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>Jujutsu Kaisan Vol-14</h3>
                        <div class="price">&#8377;777.00 <span>999.00</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="" class="swiper-slide box">
                <div class="price" style="position: absolute;top: 1rem;right: 1rem;border-radius: 50%;padding: 1.5rem .9rem;font-size: 2rem;color: var(--white);background-color: var(--red);">40%</div>

                    <div class="image">
                        <img src="./new images/the-kid-who-come-from-space.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>A Kid Who Come From Space</h3>
                        <div class="price">&#8377;281.00 <span>&#8377;399.00</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

            </div>
        </div>

        <div class="swiper arrivals-slider">

            <div class="swiper-wrapper">


                <a href="" class="swiper-slide box">
                <div class="price" style="position: absolute;top: 1rem;right: 1rem;border-radius: 50%;padding: 1.5rem .9rem;font-size: 2rem;color: var(--white);background-color: var(--red);">40%</div>

                    <div class="image">
                        <img src="./new images/house-of-dragon.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>House of Dragons</h3>
                        <div class="price">&#8377;999.00 <span>&#8377;1,050.00</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="" class="swiper-slide box">
                <div class="price" style="position: absolute;top: 1rem;right: 1rem;border-radius: 50%;padding: 1.5rem .9rem;font-size: 2rem;color: var(--white);background-color: var(--red);">40%</div>

                    <div class="image">
                        <img src="./new images/harry_potter_azkaban.jpeg" alt="">
                    </div>
                    <div class="content">
                        <h3>Harry Potter and the Prisoner of Azkaban</h3>
                        <div class="price">&#8377;416.00 <span>&#8377;599.00</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="" class="swiper-slide box">
                <div class="price" style="position: absolute;top: 1rem;right: 1rem;border-radius: 50%;padding: 1.5rem .9rem;font-size: 2rem;color: var(--white);background-color: var(--red);">40%</div>

                    <div class="image">
                        <img src="./new images/cyber-encounters.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>Cyber Encounters</h3>
                        <div class="price">&#8377;201.00 <span>&#8377;299.00</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="" class="swiper-slide box">
                <div class="price" style="position: absolute;top: 1rem;right: 1rem;border-radius: 50%;padding: 1.5rem .9rem;font-size: 2rem;color: var(--white);background-color: var(--red);">40%</div>

                    <div class="image">
                        <img src="./new images/kasturba.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>Kasturba</h3>
                        <div class="price">&#8377;505.00<span>&#8377;599.00</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="" class="swiper-slide box">
                <div class="price" style="position: absolute;top: 1rem;right: 1rem;border-radius: 50%;padding: 1.5rem .9rem;font-size: 2rem;color: var(--white);background-color: var(--red);">40%</div>

                    <div class="image">
                        <img src="./new images/harrypotter-phoenix.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>Harry Potter and the Order of the Phoenix</h3>
                        <div class="price">&#8377;391.00 <span>&#8377;499.00</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-------- arrivals section ends  ----------->

    <!-------- deal section start  ----------->


    <section class="deal" style=" height:350px; background: url(https://media.comicbook.com/2020/04/anime-manga-best-top-shonen-jump-show-series-ranked-1215900.jpeg?auto=webp&width=1400&height=628&crop=1200:628,smart)no-repeat center center/cover; ">


    </section>

    <!-------- deal section ends  ----------->
    <!-------- featured section start  ----------->

    <section class="featured" id="featured">

        <div class="heading"><span>Manga</span></div>

        <div class="swiper featured-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=1974725324"><img src="./new images/jjk.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Jujutsu Kaisan Vol-14</h3>
                        <div class="price">&#8377;777.00<span>&#8377;999.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=1974743360"><img src="./new images/boruto.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Boruto Blue Vortex Ch-4</h3>
                        <div class="price">&#8377;720.00 <span>&#8377;899.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <img src="./new images/One-Punch-Man-manga-volumen-23.jpg" alt="">
                    </div>

                    <div class="content">
                        <h3>One Punch Man Vol-23</h3>
                        <div class="price">&#8377;110.00 <span>&#8377;299.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=1506703984"><img src="./new images/berserk.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Berserk Vol-38</h3>
                        <div class="price">&#8377;1,069.00<span>&#8377;1,299.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=8416243662"><img src="./new images/vegabond-vol37.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Vegabond Vol-37</h3>
                        <div class="price">&#8377;1,474.00<span>&#8377;1,670.00</span></div>
                        <a href="" class="btn">add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <img src="./new images/spy x family.jpg" alt="">
                    </div>

                    <div class="content">
                        <h3>Spy x Family Vol-12</h3>
                        <div class="price">&#8377;1,295.00<span>&#8377;1,295.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=1569317143"><img src="./new images/uzumaki.png" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Uzumaki Vol-1</h3>
                        <div class="price">&#8377;400.00<span>&#8377;499.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=1974720004"><img src="./new images/black-clover.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Black Clover</h3>
                        <div class="price">&#8377;424.00<span>&#8377;599.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=1974738700"><img src="./new images/one piece.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>One Piece Vol-103</h3>
                        <div class="price">&#8377;835.00<span>&#8377;899.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=kagurabachi"><img src="./new images/kagurabachi.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Kagurabachi</h3>
                        <div class="price">&#8377;489.00<span>&#8377;520.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <img src="./new images/Solo-Leveling-01.jpg" alt="">
                    </div>

                    <div class="content">
                        <h3>Solo Leveling Vol-1</h3>
                        <div class="price">&#8377;205.00<span>&#8377;399.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>


    <!-------- featured section ends  ----------->


    <section class="deal" style=" height:300px; background: url(https://wallpapercave.com/wp/wp2903360.jpg)no-repeat center center/cover; ">

        <!-- <div class="content">
    <h3>Deal of the day</h3>
    <h1>upto 50% offers</h1>
    <p style="display:flex; flex-direction: column; color:white; ">
    You can take up to 50% off to step up your studies and skills with ReadEase Deal of the Day Books. Buy books online such as Rich Dad Poor Dad, Manorama, Ikigai, etc.
    </p>
    <a href="" class="btn">Shop now</a>
</div> -->

        <!-- <div class="image">
    <img src="./new images/manga-section.jpg" alt="">
</div> -->

    </section>

    <!-------- featured section start  ----------->

    <section class="featured" id="featured">

        <div class="heading"><span>Comics</span></div>

        <div class="swiper featured-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=B08WHVLWD9"><img src="./new images/batman106.jpg" alt="">
                    </div>

                    <div class="content">
                        <h3>Batman Issue-106</h3>
                        <div class="price">&#8377;1,250.00<span>&#8377;1500.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <img src="./new images/spider-verse1.jpg" alt="">
                    </div>

                    <div class="content">
                        <h3>Spider Verse Issue-1</h3>
                        <div class="price">&#8377;649.00 <span>&#8377;899.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=75960620137203011"><img src="./new images/moonknight.jpg" alt="">
                    </div>

                    <div class="content">
                        <h3>Moon Knight Isuue-30</h3>
                        <div class="price">&#8377;520.00 <span>&#8377;599.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <img src="./new images/Invincible-133.webp" alt="">
                    </div>

                    <div class="content">
                        <h3>Invincible Issue-133</h3>
                        <div class="price">&#8377;895.00<span>&#8377;1,200.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <img src="./new images/spiderman-1.jpg" alt="">
                    </div>

                    <div class="content">
                        <h3>The Amazing Spiderman Issue-1</h3>
                        <div class="price">&#8377;1,295.00<span>&#8377;1,495.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=B09BD6YZYY"><img src="./new images/Batman and superman-1.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Batman and Superman Issue-1</h3>
                        <div class="price">&#8377;625.00<span>&#8377;1,095.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="book.php?bookisbn=978-1302924867" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=978-1302924867"><img src="./new images/Avengers-7.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>The Avengers Isuue-7</h3>
                        <div class="price">&#8377;1,275.00<span>&#8377;1,495.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="book.php?bookisbn=55751155" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <a href="book.php?bookisbn=978-1779517333"><img src="./new images/aquaman andromeda-1.jpg" alt=""></a>
                    </div>

                    <div class="content">
                        <h3>Aquaman Andromeda Isuue-1</h3>
                        <div class="price">&#8377;1,967.00<span>&#8377;2,295.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <img src="./new images/boys-65.jpg" alt="">
                    </div>

                    <div class="content">
                        <h3>The Boys Issue-65</h3>
                        <div class="price">&#8377;499.00<span>&#8377;995.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <img src="./new images/justice_league_vs_godzilla_vs_kong_issue_1.jpg" alt="">
                    </div>

                    <div class="content">
                        <h3>JL vs Godzilla vs Kong</h3>
                        <div class="price">&#8377;1,208.00<span>&#8377;1,499.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="" class="fas fa-search"></a>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                    </div>

                    <div class="image">
                        <img src="./new images/daredevil-5.webp" alt="">
                    </div>

                    <div class="content">
                        <h3>Daredevil Issue-5</h3>
                        <div class="price">&#8377;1,205.00<span>&#8377;1,399.00</span></div>
                        <a href="" class="btn">Add to cart</a>
                    </div>
                </div>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>


    <!-------- featured section ends  ----------->

    <!-------- review section start  ----------->

    <section class="reviews" id="reviews">

        <h1 class="heading"><span>User's reviews</span></h1>

        <div class="swiper reviews-slider">

            <div class="swiper-wrapper">
                <div class="swiper-slide box">
                    <img src="./image/pic-1.png" alt="">
                    <h3>Ankit</h3>
                    <h4>~Naruto Vol 1</h4>
                    <p>
                        This book is just AMAZING and the price is BRILLIANT definitely worth it u should definitely buy it...it is the best naruto manga ever also the package arrived a day ago I just love it.
                    </p>

                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="./image/pic-3.png" alt="">
                    <h3>Mohit</h3>
                    <h4>~The Immortals of Meluha (Shiva Triology Part-1)</h4>
                    <p>
                        Previously I bought this book from another shopping website and the book was fake copy. So this time I bought from my all time trusted website ReadEase and got the genuine book at low price.
                    </p>

                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="./image/pic-4.png" alt="">
                    <h3>Ishita</h3>
                    <h4>~Ikigai</h4>
                    <p>
                        I love this volume better than the first and the purchase is Worth the price.Genuine product ,Amazing experience with ReadEase.
                    </p>

                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <!-- <i class="fas fa-star-half-alt"></i> -->
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="./images/author-5.jpg" alt="">
                    <h3>Dev</h3>
                    <h4>~The Psychology of Money</h4>
                    <p>
                        The book is very nice if you are thinking to know about billionaire and how the people think about money you should definitely give it a try the quality of pages are good too
                    </p>

                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="./image/pic-2.png" alt="">
                    <h3>Sakshi Tripathi</h3>
                    <h4>~It Starts with Us</h4>
                    <p>
                        I got book earlier than they told and I am happy with that. Overall book was in good condition when I got. Yes, you should buy book from ReadEase, if you want book at cheap cost.
                    </p>

                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="./image/pic-5.png" alt="">
                    <h3>Ajay Balaut</h3>
                    <h4>~Stoelting's Anesthesia & Co-Existing Disease, Third South Asia Edition</h4>
                    <p>
                        Good packaging.Came with the plastic cover on the book. Book in good condition.T recommend to buy from books from ReadEase
                    </p>

                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <!-- <i class="fas fa-star-half-alt"></i> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-------- review section ends  ----------->


    <!-------- blog section start  ----------->

    <section class="blogs" id="blogs">

        <div class="heading"><span>Our Blogs</span></div>

        <div class="swiper blog-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="./images/Sadhguru.jpg" alt="">
                    </div>

                    <div class="content">
                        <h3>Sadhguru Books: A List of Top 15 Books by the Mystic</h3>
                        <h4>SANKALPITA SINGH . OCTOBER 27, 2023</h4>
                        <p>
                            Discover the profound teachings of Sadhguru in our curated list of the 15 Best Sadhguru Books. Dive into a world of ancient wisdom, meditation, and spirituality as this revered spiritual leader takes you on a journey of self-discovery and inner peace. These books are more than just words; they’re a map to awakening your spirit and finding profound truths. Join us as we explore the transformative power of Sadhguru’s teachings.
                        </p>
                        <a href="" class="btn">Read more</a>
                    </div>

                </div>

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="./images/Thriller-Novels.jpg" alt="">
                    </div>

                    <div class="content">
                        <h3>Best Legal Thriller Novels: Legal Thrillers Beyond John Grisham</h3>
                        <h4>SANKALPITA SINGH . OCTOBER 20, 2023</h4>
                        <p>
                            Delve into the expansive world of legal thrillers beyond John Grisham’s celebrated works. Our curated collection features international and Indian titles, offering intricate plots, complex characters, and gripping courtroom drama. Whether you’re a seasoned fan or new to the genre, these books promise to keep you engrossed as you navigate the complex world of jurisprudence, uncovering secrets, unveiling conspiracies, and questioning justice itself.
                        </p>
                        <a href="" class="btn">Read more</a>
                    </div>

                </div>

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="./images/fantasy-romance.webp" alt="">
                    </div>

                    <div class="content">
                        <h3>SWORDS & SMOOCHES: 8 HIGH FANTASY ROMANCE NOVELS</h3>
                        <h4>Lyndsie Manusos . Nov 24, 2023</h4>
                        <p>
                            I love fantasy in all its forms, which I’ve broken down into various subgenres in a past Book Riot post. I also love romance, with its delicious tropes, yearning, and emotional breakthroughs. When you put them together in high fantasy romance books, it makes for a unique, high-stakes, romping good time.
                        </p>
                        <a href="" class="btn">Read more</a>
                    </div>

                </div>

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="./images/cvsb.webp" alt="">
                    </div>

                    <div class="content">
                        <h3>COMIC VS. BOOK: TEN DAYS IN A MAD-HOUSE</h3>
                        <h4>Eileen Gonzalez . Nov 24, 2023</h4>
                        <p>
                            Everyone knows that books can be adapted into movies. It happens all the time. But did you know they can be adapted into graphic novels, too? In this series, I’ll be taking a look at classic novels and their illustrated counterparts to determine what each did well, what each did wrong, and how they approach the same story decades apart and in such different media.
                        </p>
                        <a href="" class="btn">Read more</a>
                    </div>

                </div>

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="./images/AI.webp" alt="">
                    </div>

                    <div class="content">
                        <h3>20 OF THE BEST BOOKS ON AI TO STAY CURRENT WITH INDUSTRY TRENDS</h3>
                        <h4>Arvyn Cerézo . Nov 22, 2023</h4>
                        <p>
                            Artificial intelligence is evolving at a breakneck pace. There are many unknowns about the future, especially in the professional world. What will the world look like in 5, 10, 20, or so years? Will AI make our lives better or worse? There are many questions and concerns, but thankfully, literature, such as the best books on AI I curated below, can provide some insight into what lies ahead.
                        </p>
                        <a href="" class="btn">Read more</a>
                    </div>

                </div>


            </div>
        </div>
    </section>
    <!-------- news letter section start  ----------->

    <section class="newsletter">

        <form action="">

            <h3>subcribe for latest update</h3>
            <input type="email" name="" placeholder="Enter your email" class="box">
            <input type="submit" value="subcribe" class="btn">
        </form>
    </section>


    <!-------- news letter section ends  ----------->

    <?php include 'footer.php'; ?>
    <!-------- blog section ends  ----------->

    <!---- swiper cdn link ---------->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!------- customer script link --------->

    <script src="./js/script.js"></script>

</body>

</html>