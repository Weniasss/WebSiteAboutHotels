<?php

$conn = mysqli_connect('localhost','shaun','22112001','hotelchain');

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    $sql = "SELECT * FROM reviews WHERE hotelID = $id";
    $result = mysqli_query($conn, $sql);
    $review_1 = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);

}

?>


<?php

session_start();
// connect to database
$conn = mysqli_connect('localhost','shaun','22112001','hotelchain');

// check connection
if(!$conn){
    echo 'connection error:' . mysqli_connect_error();
}

if(isset($_GET['id2'])){
    $id = mysqli_real_escape_string($conn,$_GET['id2']);

    $sql_1_2 = "SELECT * FROM service WHERE id = $id";
    $sql_2_2 = "SELECT * FROM main_info_rooms WHERE id = $id";

    $result_1_2 = mysqli_query($conn, $sql_1_2);
    $result_2_2 = mysqli_query($conn, $sql_2_2);

    $service_2 = mysqli_fetch_all($result_1_2, MYSQLI_ASSOC);
    $service_1 = mysqli_fetch_all($result_2_2, MYSQLI_ASSOC);

    mysqli_free_result($result_1_2);
    mysqli_free_result($result_2_2);

    mysqli_close($conn);
}


if (!isset($_SESSION['id2']))
    $_SESSION['id2'] = "1";
else if (isset($_GET['id2']) && $_SESSION['id2'] != $_GET['id2'] && !empty($_GET['id2'])) {
    if ($_GET['id2'] == "1")
        $_SESSION['id2'] = "1";
    else if ($_GET['id2'] == "2")
        $_SESSION['id2'] = "2";
}

require_once "languages/" . $_SESSION['id2'] . ".php";


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>HOTEL GP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <link rel = "icon" href = "images/logo.png" type = "image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>
<body>

<!-- header -->
<header class = "header" id = "header">

    <div class = "head-top">
        <div class = "site-name">
            <span>LOGO</span>
        </div>
        <div class = "site-nav">
            <span id = "nav-btn">MENU <i class = "fas fa-bars"></i></span>
        </div>
    </div>

    <div class = "head-bottom flex">
        <div_1 title="HOTTELER">HOTTELER</div_1>
        <h2 style="color: #fff"><?php echo $id['title'] ?><i class="far fa-grin-beam"></i></h2>
        <a href="../Main/index.php?id=<?php echo $id['chose'] ?>" type = "button" class = "head-btn" style="text-decoration: none;"><?php echo $id['button'] ?></a>
    </div>

</header>
<!-- end of header -->

<!-- side navbar -->
<div class = "sidenav" id = "sidenav">
            <span class = "cancel-btn" id = "cancel-btn">
                <i class = "fas fa-times"></i>
            </span>

    <ul class = "navbar">
        <h4><?php echo $id['pages'] ?> </h4>
        <div class="row">
            <li><a href = "Rooms/Sales_Rooms.php?id=<?php echo $id['chose'] ?>"><?php echo $id['Rooms'] ?></a></li>
            <li><a href = "Pages/About_Hotteler.php?id=<?php echo $id['chose'] ?>"><?php echo $id['About'] ?></a></li>
            <li><a href="Pages/profile.php?id=<?php echo  $_SESSION["userid"] ?>&id2=<?php echo $id['chose'] ?>"><?php echo $id['Profile Page'] ?></a></li>
            <li><a href = "Pages/Book.php?id=<?php echo $id['chose'] ?>"><?php echo $id['Book Room'] ?></a></li>
            <?php
                if(isset($_SESSION["useruid"])){
                    echo '<li><a href="includes/logout.inc.php">Log out</a></li>';
                }
                else{
                    echo "<li><a href='signup.php'>Sign up</a></li>";
                    echo "<li><a href='login.php'>Log in</a></li>";
                }
            ?>
            <br>
            <h4><?php echo $id['language'] ?> </h4>
            <li><a href="Hotteler.php?id=4&id2=1" style="text-decoration: none;margin: 15px;"><?php echo $id['1'] ?></a></li>
            <li><a href="Hotteler.php?id=4&id2=2" style="text-decoration: none;margin: 15px;"><?php echo $id['2'] ?></a></li>
        </div>
    </ul>
</div>

    <!-- body content  -->
    <section class = "services sec-width" id = "services">

        <div class = "head-bottom flex">
            <h2 style="  color: #292826;
                         font-size: 64px;
                         text-shadow: .05em .05em 0 #626567;
                         letter-spacing: 10px;
                         text-transform: uppercase;
            "><?php echo $id['servic'] ?><i class="fas fa-concierge-bell"></i></h2>
        </div>
        <div class = "services-container">
            <?php foreach($service_2 as $services){ ?>
                <article class = "service">
                    <div class = "service-icon">
                        <span>
                            <i class = "<?php echo ($services['icon']) ?>"></i>
                        </span>
                    </div>
                    <div class = "service-content">


                        <h3 style="font-size: 28px;
                            letter-spacing: 6px;
                            text-shadow: .05em .05em 0 #797D7F;
                            text-transform: uppercase;"><?php echo ($services['title']) ?></h3>
                        <p style="font-size: 18px;
                                "><?php echo ($services['anons']) ?></p>
                    </div>

                </article>
            <?php } ?>
        </div>
    </section>

    <div class = "book">
    </div>






    <section class = "rooms sec-width" id = "rooms">

        <div class = "head-bottom flex">
            <h2 style="  color: #292826;
                         font-size: 64px;
                         text-shadow: .05em .05em 0 #626567;
                         letter-spacing: 10px;
                         text-transform: uppercase;
            "><?php echo $id['offert'] ?><i class="fas fa-fire-alt"></i></h2>
        </div>
        <div class = "rooms-container">
            <?php foreach($service_1 as $rooms){ ?>
                <article class = "room">
                    <div class = "room-image">
                        <img src = "<?php echo ($rooms['name_picture']) ?>" >
                    </div>
                    <div class = "room-text" >
                        <h3 style="font-size: 28px;
                            letter-spacing: 6px;
                            text-shadow: .05em .05em 0 #797D7F;
                            text-transform: uppercase;"><?php echo ($rooms['name_room']) ?>
                        </h3>
                        <ul>
                            <li>
                                <p style="font-size: 18px;
                                "><i class="fas fa-plus-circle"></i><?php echo $id['first_dev'] ?></p>
                            </li>
                            <li>

                                <p style="font-size: 18px;
                                "><i class="fas fa-plus-circle"></i><?php echo $id['second_dev'] ?></p>
                            </li>
                            <li>
                                <p style="font-size: 18px;
                                "><i class="fas fa-plus-circle"></i><?php echo $id['third_dev'] ?></p>
                            </li>
                        </ul>
                        <p style="font-size: 18px;
                                "><?php echo ($rooms['anons']) ?></p>
                        <p class = "rate">
                            <span class="strikediag" ><?php echo ($rooms['price']) ?> PLN</span><span style="font-size: 52px; color: indianred;text-shadow: .05em .05em 0 #922B21;">  <?php echo ($rooms['sale_price']) ?> PLN</span> <span style="font-size: 32px">/ <?php echo $id['nigth'] ?></span>
                        </p>
                    </div>

                </article>
            <?php } ?>
        </div>
    </section>


    <section class = "customers" id = "customers">

        <div class = "sec-width">
            <div class = "head-bottom flex">
                <h2 style="  color: #fff;
                         font-size: 64px;
                         text-shadow: .05em .05em 0 #626567;
                         letter-spacing: 10px;
                         text-transform: uppercase;
            "><?php echo $id['review'] ?> <i class="fas fa-book"></i></h2>
            </div>
            <br>
            <a href="Pages/add.php?id=<?php echo $id['chose'] ?>" type = "button" class = "head-btn" style="text-decoration: none"><?php echo $id['add_review'] ?></a>
            <div class = "customers-container">

                <?php foreach($review_1 as $rewiews){ ?>
                    <div class = "customer">
                        <h3>Rating : <?php echo  htmlspecialchars($rewiews['rating']) ?></h3>
                        <p style="font-size: 18px;
                                "><?php echo  htmlspecialchars($rewiews['anons']) ?></p>

                    </div>
                <?php } ?>
            </div>
        </div>
    </section>



<!-- footer -->
<footer class = "footer">
    <div class = "footer-container">
        <div>
            <h2><?php echo $id['footer_h2_1'] ?></h2>
            <p>
                <?php echo $id['footer_info'] ?>
            </p>
            <ul class = "social-icons">
                <li class = "flex">
                    <i class = "fa fa-twitter fa-2x"></i>
                </li>
                <li class = "flex">
                    <i class = "fa fa-facebook fa-2x"></i>
                </li>
                <li class = "flex">
                    <i class = "fa fa-instagram fa-2x"></i>
                </li>
            </ul>
        </div>

        <div>
            <h2><?php echo $id['footer_h2_2'] ?></h2>
            <a href = "#"><?php echo $id['footer_a_links_1'] ?></a>
            <a href = "#"><?php echo $id['footer_a_links_2'] ?></a>
            <a href = "#"><?php echo $id['footer_a_links_3'] ?></a>
            <a href = "#"><?php echo $id['footer_a_links_4'] ?></a>
        </div>

        <div>
            <h2><?php echo $id['footer_h2_3'] ?></h2>
            <a href = "#"><?php echo $id['footer_a_links_5'] ?></a>
            <a href = "#"><?php echo $id['footer_a_links_6'] ?></a>
            <a href = "#"><?php echo $id['footer_a_links_7'] ?></a>
            <a href = "#"><?php echo $id['footer_a_links_8'] ?></a>
        </div>

        <div>
            <h2><?php echo $id['footer_h2_4'] ?></h2>
            <div class = "contact-item">
                        <span>
                            <i class = "fas fa-map-marker-alt"></i>
                        </span>
                <span>
                            203 Fake St.Mountain View, San Francisco, California, USA
                        </span>
            </div>
            <div class = "contact-item">
                        <span>
                            <i class = "fas fa-phone-alt"></i>
                        </span>
                <span>
                            +84545 37534 48
                        </span>
            </div>
            <div class = "contact-item">
                        <span>
                            <i class = "fas fa-envelope"></i>
                        </span>
                <span>
                            info@domain.com
                        </span>
            </div>
        </div>
    </div>
</footer>
<!-- end of footer -->

<script src="script.js"></script>
</body>
</html>