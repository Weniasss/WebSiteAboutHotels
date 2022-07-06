<?php

session_start();

$conn = mysqli_connect('localhost', 'shaun', '22112001', 'hotelchain');

if(isset($_POST['submit'])){
    if(false) {

    }else{
        $rating = mysqli_real_escape_string($conn, $_POST['rating']);
        $anons = mysqli_real_escape_string($conn, $_POST['anons']);
        $idHotel = '3';

        $sql = "INSERT INTO reviews(hotelID,rating,anons) VALUES('$idHotel','$rating','$anons')";

        if(mysqli_query($conn,$sql)){
            $language= $_SESSION['id'] ;
            $road = 'Location:../Hotteler.php?id=3&id2=';
            $b = $road . $language;
            header($b);
        }
        else{
            echo 'query error:' .mysqli_error($conn);
        }
    }
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Glassmorphism</title>
    <link rel="stylesheet" href="../css/add_page.css">
</head>

<body>

<section>
    <div class="box">
        <div class="container">
            <div class="form">
                <h2 style="text-shadow: .05em .05em 0 #626567;"><?php echo $id['add_review'] ?></h2>
                <form action="add.php" class="white" method="POST">
                    <div class="inputBox">
                        <input type="number" placeholder="<?php echo $id['rating'] ?>..." name="rating" value="<?php echo htmlspecialchars($rating) ?>">
                    </div>
                    <div class="inputBox">
                        <textarea type="text" name="anons" value="<?php echo htmlspecialchars($anons) ?>" placeholder="Anons..."></textarea>
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="submit" value="<?php echo $id['submit'] ?>" class="btn brand z-depth-0">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

</body>

</html>
