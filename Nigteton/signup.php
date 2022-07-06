<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>PHP Project 01</title>
    <link rel="stylesheet" href="css/users.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

<section>
    <div class="imgBx">
        <img src="Image/Main_Image/Header_Image.jpg">
    </div>
    <div class="contentBx">
        <div class="formBx">
            <h2>Sign Up</h2>
            <form action="includes/signup.inc.php" method="post">
                <div class="inputBx">
                    <span>Name / Imię:</span>
                    <input type="text" name="name" placeholder="Full name...">
                </div>
                <div class="inputBx">
                    <span>Surname:</span>
                    <input type="text" name="surname" placeholder="Username...">
                </div>
                <div class="inputBx">
                    <span>Number:</span>
                    <input type="text" name="number" placeholder="Username...">
                </div>
                <div class="inputBx">
                    <span>Email:</span>
                    <input type="text" name="email" placeholder="Email...">
                </div>
                <div class="inputBx">
                    <span>Username / Nazwa użytkownika:</span>
                    <input type="text" name="uid" placeholder="Username...">
                </div>

                <div class="inputBx">
                    <span>Password / Hasło:</span>
                    <input type="password" name="pwd" placeholder="Password...">
                </div>
                <div class="inputBx">
                    <span>Repeat password / Powtórz hasło:</span>
                    <input type="password" name="pwdrepeat" placeholder="Repeat password...">
                </div>
                <div class="inputBx">
                    <button type="submit" class = "head-btn" name="submit" >Sign Up</button>
                </div>
                <div class="inputBx">
                    <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "emptyinput"){
                            echo "<p>Fill in all fields!</p>";
                        }
                        else if($_GET["error"] == "invaliduid"){
                            echo "<p>Choose a proper username!</p>";
                        }
                        else if($_GET["error"] == "invalidemail"){
                            echo "<p>Choose a proper email!</p>";
                        }
                        else if($_GET["error"] == "passwordsdontmatch"){
                            echo "<p>Passwords doesn't match!</p>";
                        }
                        else if($_GET["error"] == "stmtfailed"){
                            echo "<p>Something went wrong, try again!</p>";
                        }
                        else if($_GET["error"] == "usernametaken"){
                            echo "<p>Username already taken!</p>";
                        }
                        else if($_GET["error"] == "none"){
                            echo "<p>You have signed up!</p>";
                        }
                    }
                    ?>
                    <p>You have account? <a href="login.php">Log in</a></p>
                </div>
            </form>
        </div>
    </div>
</section>
</div>
</body>
</html>

<script src="js/script.js"></script>
