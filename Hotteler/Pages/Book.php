<?php

session_start();

$conn = mysqli_connect('localhost', 'shaun', '22112001', 'hotelchain');

if(isset($_POST['submit'])){
    if(false) {

    }else{
        $Date_In = mysqli_real_escape_string($conn, $_POST['Date_In']);
        $Date_Out = mysqli_real_escape_string($conn, $_POST['Date_Out']);
        $Rooms = (int) $_POST['Rooms'];
        $Id_Users = (int) $_POST['Id_Users'];


        $sql = "INSERT INTO reservations(checkIn,checkOut,roomID,clientID) VALUES('$Date_In','$Date_Out','$Rooms','$Id_Users')";

        if(mysqli_query($conn,$sql)){
            $language= $_SESSION['id'] ;
            $road = 'Location:../Hotteler.php?id=4&id2=';
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




<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <title>Funda Of Web IT</title>
    <link rel="stylesheet" href="../css/book.css">

</head>
<body>


<header class = "header" id = "header">
    <div class = "head-top">
        <div class = "site-name">
            <span style="color: #fff">LOGO</span>
        </div>
    </div>

    <div class = "head-bottom flex">
        <div_1 title="HOTTELER">HOTTELER</div_1>
        <h2 style="color: #fff" ><?php echo $id['title'] ?> <i class="far fa-grin-beam"></i></h2>
        <a href="../Hotteler.php?id=4&id2=<?php echo $id['chose'] ?>" type = "button" class = "head-btn" style="text-decoration: none"><?php echo $id['button_2'] ?></a>
    </div>
</header>


<div class = "head-bottom flex">
    <h2 style="  color: #292826;
                         font-size: 64px;
                         text-shadow: .05em .05em 0 #626567;
                         letter-spacing: 10px;
                         text-transform: uppercase;
            "><?php echo $id['Search'] ?> <i class="fas fa-search"></i></h2>
</div>

<div class = "head-bottom flex">
    <form class = "book-form" action="Book.php" method="POST">
        <div class = "form-item">
            <label for = "checkin-date"><?php echo $id['checkIn'] ?> </label>
            <input style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.75);" type="text" name="dateInSearch" value="<?php echo htmlspecialchars($dateInSearch) ?>">
        </div>
        <div class = "form-item">
            <label for = "checkout-date"><?php echo $id['checkOut'] ?> </label>
            <input style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.75);" type="text" name="dateOutSearch" value="<?php echo htmlspecialchars($dateOutSearch) ?>">
        </div>

        <div class = "form-item">
            <button style="background-color: #1c1b29" type="submit" name="submitSearch" value="submit" class="btn btn-primary"><?php echo $id['submit'] ?></button>
        </div>

    </form>
</div>

<br>
<div class = "head-bottom flex">
<table style="width:100%">
    <tr>
        <th><?php echo $id['RoomNumber'] ?></th>
        <th><?php echo $id['nameRoom'] ?></th>
        <th><?php echo $id['price'] ?></th>

    </tr>
<?php
if(isset($_POST['submitSearch'])) {
    if(false) {

    }else{
        $dateInSearch  = mysqli_real_escape_string($conn, $_POST['dateInSearch']);
        $dateOutSearch = mysqli_real_escape_string($conn, $_POST['dateOutSearch']);

        $dateInSearch = strtotime($dateInSearch);

        $dateInSearch = date('Y-m-d',$dateInSearch);

        $dateOutSearch = strtotime($dateOutSearch);
        $dateOutSearch = date('Y-m-d',$dateOutSearch);

        if($dateInSearch >= $dateOutSearch || $dateInSearch=="1970-01-01" || $dateOutSearch=="1970-01-01"){
            echo "zle";
        }
        else{

            $conn = mysqli_connect('localhost','shaun','22112001','hotelchain');

            $sql = "SELECT roomNumber, checkIn, checkOut FROM reservations AS re JOIN rooms AS ro ON ro.roomID = re.roomID WHERE ro.hotelID=4";

            $result = mysqli_query($conn,$sql);

            $array = array();

            while (true){

                $search = mysqli_fetch_assoc($result);

                if ($search == NULL){
                    break;
                }

                if (  (($search['checkIn'] <= $dateInSearch) && ($dateInSearch<= $search['checkOut']))  || (($search['checkIn'] <= $dateOutSearch) && ($dateOutSearch<= $search['checkOut'])) || ($dateInSearch <= $search['checkIn'] && $dateOutSearch >= $search['checkOut'])){
                    array_push($array,$search['roomNumber']);

                }

            }


            $sql = "SELECT roomNumber, roomName, price FROM rooms AS r JOIN roomstypes as t on r.roomType = t.ID WHERE hotelID=4 ORDER BY roomNumber";

            $result = mysqli_query($conn,$sql);

            $flag = 0;

            while (true){

                $search = mysqli_fetch_assoc($result);

                if ($search == NULL){
                    break;
                }

                $size = sizeof($array);

                for($i = 0; $i < $size;$i++){
                    if ($array[$i] == $search['roomNumber']) {
                        $flag = 1;

                    }
                }
                if ($flag == 0){
                    echo "<tr>";
                    echo "<th>"; echo $search['roomNumber']; echo "</th>";
                    echo "<th>"; echo $search['roomName']; echo "</th>";
                    echo "<th>"; echo $search['price']; echo "</th>";
                    echo "</tr>";
                }
                $flag = 0;
            }
        }
    }
}


?>

</table>
</div>
<br><br>

<div class = "book">
</div>


<br>

<div class = "head-bottom flex">
    <h2 style="  color: #292826;
                         font-size: 64px;
                         text-shadow: .05em .05em 0 #626567;
                         letter-spacing: 10px;
                         text-transform: uppercase;
            "><?php echo $id['book_room'] ?> <i class="fas fa-shopping-basket"></i></h2>
    <form class = "book-form" action="Book.php" method="POST">
        <div class = "form-item">
            <label for = "checkin-date"><?php echo $id['checkIn'] ?> </label>
            <input style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.75);" type="text" name="Date_In" value="<?php echo htmlspecialchars($Date_In) ?>">
        </div>
        <div class = "form-item">
            <label for = "checkout-date"><?php echo $id['checkOut'] ?> </label>
            <input style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.75);" type="text" name="Date_Out" value="<?php echo htmlspecialchars($Date_Out) ?>">
        </div>
        <div class = "form-item">
            <label for = "rooms"><?php echo $id['RoomNumber'] ?>: </label>
            <input style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.75);" style="background-color: #4B045F" type = "text" name="Rooms" value="<?php echo htmlspecialchars($Rooms) ?>">
        </div>

        <div class = "form-item">
            <label for = "Id_Users"><?php echo $id['idUsers'] ?> </label>
            <input style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.75);" style="background-color: #4B045F" type = "text" name="Id_Users" value="<?php echo htmlspecialchars($Id_Users) ?>">
        </div>

        <div class = "form-item">
            <button style="background-color: #1c1b29" type="submit" name="submit" value="submit" class="btn btn-primary"><?php echo $id['submit'] ?></button>
        </div>

    </form>

</div>

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


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>