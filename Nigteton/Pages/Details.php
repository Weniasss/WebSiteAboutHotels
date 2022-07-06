<?php


$conn_1 = mysqli_connect('localhost','shaun','22112001','hotelchain');

if(isset($_POST['delete'])){

    $id_to_delete = mysqli_real_escape_string($conn_1, $_POST['id_to_delete']);

    $sql = "DELETE FROM reservations WHERE reservationID = $id_to_delete";

    if(mysqli_query($conn_1, $sql)){
        header('Location: ../Hotteler.php?id=3&id2=1');
    } else {
        echo 'query error: '. mysqli_error($conn_1);
    }

}



if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn_1,$_GET['id']);


    $sql = "SELECT * FROM reservations WHERE reservationID = $id";


    $result = mysqli_query($conn_1,$sql);



    $rooms = mysqli_fetch_assoc($result);



    mysqli_free_result($result);


    mysqli_close($conn_1);

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>PHP Project 01</title>
    <link rel="stylesheet" href="../css/users.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
<section>
    <div class="imgBx">
        <img src="../Image/Main_Image/Header_Image.jpg">
    </div>
    <div class="contentBx">
        <div class="formBx">
            <h1>Reservation :</h1>
            <?php if($rooms): ?>
                <h3>Date In:</h3> <?php echo htmlspecialchars($rooms['checkIn']); ?>
                <h3>Date Out:</h3><?php echo htmlspecialchars($rooms['checkOut']); ?>
                <h3>Name room:</h3><?php echo htmlspecialchars($rooms['roomID']); ?>
                <br><br>
                <form action="Details.php" method="POST">
                    <input type="hidden" name="id_to_delete" value="<?php echo $rooms['reservationID']; ?>">
                    <input type="submit" name="delete" value="Delete" class="head-btn_2" style="background-color: red">
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>
</div>
</body>
</html>