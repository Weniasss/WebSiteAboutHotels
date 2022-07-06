<?php

session_start();
// connect to database
$conn = mysqli_connect('localhost','root','','hotelchain');

// check connection
if(!$conn){
    echo 'connection error:' . mysqli_connect_error();
}

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn,$_GET['id']);


    $sql_1_2 = "SELECT * FROM basicinfo WHERE id = $id";

    $result_1_2 = mysqli_query($conn, $sql_1_2);
    if( !$result_1_2){
        echo "<p> Query [$sql_1_2] couldn't be executed </p>";
        echo mysqli_error($conn);
    }

    $service_2 = mysqli_fetch_all($result_1_2, MYSQLI_ASSOC);

    mysqli_free_result($result_1_2);

    mysqli_close($conn);
}
else{
    $sql_1_2 = "SELECT * FROM basicinfo WHERE id = 1";

    $result_1_2 = mysqli_query($conn, $sql_1_2);
    if( !$result_1_2){
        echo "<p> Query [$sql_1_2] couldn't be executed </p>";
        echo mysqli_error($conn);
    }

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

require_once "languages/" . $_SESSION['id'] . ".php";


?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HOTEL GP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Hotteler.css">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <link rel = "icon" href = "images/logo.png" type = "image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<!-- header -->
<header class = "header" id = "header">

    <div class = "head-top">
        <div class = "site-name">
            <span style="color: #fff">LOGO</span>
        </div>
        <div class = "site-nav">
            <span id = "nav-btn" style="color: #fff">MENU <i class = "fas fa-bars"></i></span>
        </div>
    </div>


    <div class = "head-bottom flex">
        <div_1 title="WEBOTS">WEBOTS</div_1>
        <h2 style="color: #fff"><?php echo $id['title'] ?><i class="far fa-grin-beam"></i></h2>
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
            <li><a href = "About.php?id=<?php echo $id['chose'] ?>"><?php echo $id['about'] ?></a></li>
            <li><a href = "Hotels.php?id=<?php echo $id['chose'] ?>"><?php echo $id['hotels'] ?></a></li>
            <li><a href = "#"><?php echo $id['app'] ?></a></li>
            <h4><?php echo $id['language'] ?> </h4>
            <li><a href="index.php?id=1" style="text-decoration: none;margin: 15px;"><?php echo $id['1'] ?></a></li>
            <li><a href="index.php?id=2" style="text-decoration: none;margin: 15px;"><?php echo $id['2'] ?></a></li>
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
            "><?php echo $id['info'] ?> <i class="fas fa-info-circle"></i></h2>
</div>


<?php foreach($service_2 as $services){ ?>

    <section id="learn" class="p-5  text-dark">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <?php echo ($services['picture_place_1']) ?>

                <div class="col-md p-5" >
                    <h2 ><?php echo ($services['title']) ?></h2>
                    <p class="lead">
                        Info:
                    </p>
                    <p>
                        <?php echo ($services['info']) ?>
                    </p>

                    <p class="lead" >
                        <?php echo $id['steps'] ?>
                    </p>
                    <?php echo ($services['steps']) ?>
                </div>

                <?php echo ($services['picture_place_2']) ?>

            </div>
        </div>
        <hr class="featurette-divider">
    </section>

<?php } ?>

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