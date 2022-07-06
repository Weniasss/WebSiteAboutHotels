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
                <h2>Login</h2>
                <form action="includes/login.inc.php" method="post">
                    <div class="inputBx">
                        <span>Username / Nazwa użytkownika</span>
                        <input type="text"name="uid"placeholder="Full name..">
                    </div>
                    <div class="inputBx">
                        <span>Password / Hasło</span>
                        <input type="password"name="pwd"placeholder="Password...">
                    </div>
                    <div class="inputBx">
                        <button type="submit" class = "head-btn" name="submit" >Log In</button>
                    </div>
                    <div class="inputBx">
                        <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"] == "emptyinput"){
                                echo "<p>Fill in all fields!</p>";
                            }
                            else if($_GET["error"] == "wronglogin"){
                                echo "<p>Incorrect login information!</p>";
                            }
                        }
                        ?>
                        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    </div>
</body>
</html>

<script src="js/script.js"></script>
