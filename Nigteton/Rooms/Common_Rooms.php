<?php

session_start();
// connect to database
$conn = mysqli_connect('localhost','shaun','22112001','hotelchain');

// check connection
if(!$conn){
    echo 'connection error:' . mysqli_connect_error();
}

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn,$_GET['id']);

    if( $id == 1){
        $sql_1_2 = "SELECT roomName,anons,price,place_picture_1,place_picture_2,services,price FROM roomstypes WHERE pageId = 1";
    }
    else{
        $sql_1_2 = "SELECT roomNamePl as roomName,anonsPl as anons,price,place_picture_1,place_picture_2,services,price FROM roomstypes WHERE pageId = 1";
    }
    $result_1_2 = mysqli_query($conn, $sql_1_2);

    $service_2 = mysqli_fetch_all($result_1_2, MYSQLI_ASSOC);

    mysqli_free_result($result_1_2);

    mysqli_close($conn);
}


if (!isset($_SESSION['id']))
    $_SESSION['id'] = "1";
else if (isset($_GET['id']) && $_SESSION['id'] != $_GET['id'] && !empty($_GET['id'])) {
    if ($_GET['id'] == "1")
        $_SESSION['id'] = "1";
    else if ($_GET['id'] == "2")
        $_SESSION['id'] = "2";
}

require_once "../languages/" . $_SESSION['id'] . ".php";


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
            <span style="color: #979A9A">LOGO</span>
        </div>
        <div class = "site-nav">
            <span id = "nav-btn" style="color: #979A9A">MENU <i class = "fas fa-bars"></i></span>
        </div>
    </div>

    <div class = "head-bottom flex">
        <div_1 title="NIGTETON">NIGTETON</div_1>
        <h2 style="color: #fff" ><?php echo $id['title'] ?> <i class="far fa-grin-beam"></i></h2>
        <a href="../Hotteler.php?id=3&id2=<?php echo $id['chose'] ?>" type = "button" class = "head-btn" style="text-decoration: none"><?php echo $id['button_2'] ?></a>
    </div>
</header>

<div class = "sidenav" id = "sidenav">
            <span class = "cancel-btn" id = "cancel-btn">
                <i class = "fas fa-times"></i>
            </span>

    <ul class = "navbar">
        <div class="row">
            <h4><?php echo $id['Rooms'] ?> </h4>
            <li><a href = "Sales_Rooms.php?id=<?php echo $id['chose'] ?>"><?php echo $id['offert'] ?> <i class="fas fa-fire-alt"></i></a></li>
            <li><a href = "Luxury_Rooms.php?id=<?php echo $id['chose'] ?>"><?php echo $id['lux'] ?> <i class="fas fa-coins"></i></a></li>
            <br><br><br>

            <h4><?php echo $id['language'] ?> </h4>
            <li><a href="Common_Rooms.php?id=1" style="text-decoration: none;margin: 15px;"><?php echo $id['1'] ?></a></li>
            <li><a href="Common_Rooms.php?id=2" style="text-decoration: none;margin: 15px;"><?php echo $id['2'] ?></a></li>
        </div>
    </ul>
</div>
<br>
<div class = "head-bottom flex">
    <h2 style="  color: #292826;
                         font-size: 64px;
                         text-shadow: .05em .05em 0 #626567;
                         letter-spacing: 10px;
                         text-transform: uppercase;
            "><?php echo $id['common'] ?> <i class="fas fa-home"></i></h2>
</div>


<?php foreach($service_2 as $services){ ?>

    <section id="learn" class="p-5  text-dark">
        <div class="container">
            <div class="row align-items-center justify-content-between">
<?php echo ($services['place_picture_2']) ?>

                <div class="col-md p-5">
                    <h2><?php echo ($services['roomName']) ?></h2>
                    <p class="lead">
                        Info:
                    </p>
                    <p>
                        <ul style="font-size: 18px;">
                            <?php echo ($services['anons']) ?>
                        </ul>
                    </p>

                    <p class="lead">
                        <?php echo $id['servic'] ?>
                    </p>
                    <?php echo ($services['services']) ?>
                    <h2> <?php echo ($services['price']) ?> PLN /  <?php echo $id['nigth'] ?></h2>
                </div>

                <?php echo ($services['place_picture_1']) ?>

            </div>
        </div>
        <hr class="featurette-divider">
    </section>

<?php } ?>


<br><br>
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


<script src="../script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



</body>
</html>