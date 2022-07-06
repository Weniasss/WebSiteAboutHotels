<?php
session_start();
?>

<?php

$conn_1 = mysqli_connect('localhost','shaun','22112001','hotelchain');

// check connection
//


if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn_1,$_GET['id']);


    $sql = "SELECT * FROM users WHERE usersId = $id";


    $result = mysqli_query($conn_1,$sql);



    $rooms = mysqli_fetch_assoc($result);



    mysqli_free_result($result);


    mysqli_close($conn_1);

}

?>

<?php
$conn = mysqli_connect('localhost', 'shaun', '22112001', 'hotelchain');

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn,$_GET['id']);


    $sql_2_2 = "SELECT * FROM reservations WHERE clientID = $id";


    $result_2_2 = mysqli_query($conn, $sql_2_2);


    $service_1 = mysqli_fetch_all($result_2_2, MYSQLI_ASSOC);


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

require_once "../languages/" . $_SESSION['id2'] . ".php";

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HOTEL GP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <link rel = "icon" href = "images/logo.png" type = "image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<header class = "header" id = "header">
    <div class = "head-top">
        <div class = "site-name">
            <span style="color: #fff">LOGO</span>
        </div>
    </div>

    <div class = "head-bottom flex">
        <div_1 title="PROFILE">PROFILE</div_1>
        <h2 style="color: #fff" ><?php echo $id2['Hello'] ?>
            <?php if($rooms): ?>
                <?php echo htmlspecialchars($rooms['usersName']); ?>
            <?php endif; ?>

            <?php echo $id2['in'] ?>  <i class="far fa-grin-beam"></i>
        </h2>
        <a href="../Hotteler.php?id=4&id2=<?php echo $id2['chose'] ?>" type = "button" class = "head-btn" style="text-decoration: none"><?php echo $id['button_2'] ?></a>
    </div>
</header>

<div class = "head-bottom flex">
    <h2 style="  color: #292826;
                         font-size: 64px;
                         text-shadow: .05em .05em 0 #626567;
                         letter-spacing: 10px;
                         text-transform: uppercase;
            "><?php echo $id2['about'] ?> <i class="fas fa-concierge-bell"></i></h2>
</div>
<section class = "rooms sec-width" id = "rooms">

    <div class = "rooms-container">

            <article class = "room">
                <div class = "room-image">
                    <img src = "../Image/Main_Image/Header_Image.jpg" >
                </div>
                <div class = "room-text" style="background-color: #242527 " >
                    <h3 style="font-size: 28px;
                            letter-spacing: 6px;
                            text-shadow: .05em .05em 0 #797D7F;
                            text-transform: uppercase;"><?php echo $id2['prof_info'] ?>
                    </h3>
                    <ul>
                        <li>
                            <h3 style="font-size: 18px;
                                "><?php if($rooms): ?>Email:
                                    <?php echo htmlspecialchars($rooms['usersEmail']); ?>
                                <?php endif; ?> </h3>
                        </li>
                        <li>
                            <h3 style="font-size: 18px;
                                "> <?php if($rooms): ?><?php echo $id2['user_name'] ?>:
                                    <?php echo htmlspecialchars($rooms['usersName']); ?>
                                <?php endif; ?> </h3>
                        </li>
                        <li>
                            <h3 style="font-size: 18px;
                                "> <?php if($rooms): ?><?php echo $id2['user_uid'] ?>:
                                    <?php echo htmlspecialchars($rooms['usersUid']); ?>
                                <?php endif; ?> </h3>
                        </li>
                        <li>
                            <h3 style="font-size: 18px;
                                "><?php echo $id2['user_id'] ?>:<?php
                                if(isset($_SESSION["userid"])){
                                    echo  $_SESSION["userid"];
                                }
                                ?>
                            </h3>
                        </li>
                    </ul>
                </div>

            </article>

    </div>
</section>


<br><br><br>

<div class = "book">
</div>

<section class = "reservetions" id = "reservetions">
    <div class = "sec-width">

        <div class = "head-bottom flex">
            <h2 style="  color: #292826;
                         font-size: 64px;
                         text-shadow: .05em .05em 0 #626567;
                         letter-spacing: 10px;
                         text-transform: uppercase;
            "><?php echo $id2['reservetion'] ?> <i class="fas fa-concierge-bell"></i></h2>
        </div>
        <div class = "reservetions-container">
            <?php foreach($service_1 as $services){ ?>
                <div class = "reservetion">

                    <h3><?php echo $id2['name_room'] ?>: <?php echo ($services['roomID']) ?></h3>
                    <h3><?php echo $id2['Date_In/Out'] ?>:</h3>  <h3><?php echo ($services['checkIn']) ?> <br>-</br> <?php echo ($services['checkOut']) ?></h3>
                    <h3>Id : <?php echo ($services['clientID']) ?></h3>
                    <a href="Details.php?id=<?php echo ($services['reservationID']) ?>" type = "button" class = "head-btn"><?php echo $id2['Read more'] ?></a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


<footer class = "footer">
    <div class = "footer-container">
        <div>
            <h2><?php echo $id2['footer_h2_1'] ?></h2>
            <p>
                <?php echo $id2['footer_info'] ?>
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
            <h2><?php echo $id2['footer_h2_2'] ?></h2>
            <a href = "#"><?php echo $id2['footer_a_links_1'] ?></a>
            <a href = "#"><?php echo $id2['footer_a_links_2'] ?></a>
            <a href = "#"><?php echo $id2['footer_a_links_3'] ?></a>
            <a href = "#"><?php echo $id2['footer_a_links_4'] ?></a>
        </div>

        <div>
            <h2><?php echo $id2['footer_h2_3'] ?></h2>
            <a href = "#"><?php echo $id2['footer_a_links_5'] ?></a>
            <a href = "#"><?php echo $id2['footer_a_links_6'] ?></a>
            <a href = "#"><?php echo $id2['footer_a_links_7'] ?></a>
            <a href = "#"><?php echo $id2['footer_a_links_8'] ?></a>
        </div>

        <div>
            <h2><?php echo $id2['footer_h2_4'] ?></h2>
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

</body>
</html>