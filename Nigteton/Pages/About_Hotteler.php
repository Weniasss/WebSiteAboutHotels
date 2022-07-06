
<?php
session_start();

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
    </div>

    <div class = "head-bottom flex">
        <div_1 title="NIGTETON">NIGTETON</div_1>
        <h2 style="color: #fff" ><?php echo $id['title'] ?><i class="far fa-grin-beam"></i></h2>
        <a href="../Hotteler.php?id=3&id2=<?php echo $id['chose'] ?>" type = "button" class = "head-btn" style="text-decoration: none"><?php echo $id['button_2'] ?></a>
    </div>
</header>

<div class = "head-bottom flex">
    <h2 style="  color: #292826;
                         font-size: 64px;
                         text-shadow: .05em .05em 0 #626567;
                         letter-spacing: 10px;
                         text-transform: uppercase;
            "><?php echo $id['location'] ?> <i class="fas fa-map-marked-alt"></i></h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19753.073505602377!2d19.41894307605081!3d51.7671539994186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471a3532c70a394d%3A0x8cdb8071a863cb0a!2zT2xkIFBvbGVzaWUsIDkwLTAwMSDQm9C-0LTQt9GM!5e0!3m2!1sru!2spl!4v1638348612602!5m2!1sru!2spl" width="600" height="450" style="border-radius:5px;border: 0" allowfullscreen="" loading="lazy"></iframe>
    <p style="  color: #292826;
                         font-size: 19px;
                         text-shadow: .05em .05em 0 #626567;
                         letter-spacing: 10px;
                         text-transform: uppercase;
            "><?php echo $id['adres'] ?><br>
    </p>
</div>

<div class = "book">
</div>


<section class = "overwiew">
    <div class = "head-bottom flex">
        <h2 style="  color: #292826;
                         font-size: 64px;
                         text-shadow: .05em .05em 0 #626567;
                         letter-spacing: 10px;
                         text-transform: uppercase;
            "><?php echo $id['overwiew'] ?> <i class="fas fa-book-reader"></i></h2>
    </div>
    <div class = "overwiew_info ">
        <p style="font-size: 18px;
                                ">
            <?php echo $id['info_overview'] ?>
        </p>
    </div>

</section>




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



</body>
</html>