<?php
/** Template Name: SignUp Form */
    require "./includes/createDatabase.php";
    require "header.php";
?>

<main>
    <h1>Log in</h1>
    <?php

        if(isset($_GET["error"])) {
        
            if($_GET["error"] == "emptyinputs") {
                echo "<p class='error'> Fill in all fields</p>";
            }
            else if($_GET["error"] == "wrongpassword") {
                echo "<p class='error'>Wrong password</p>";
            }
            else if($_GET["error"] == "nouserfound") {
                echo "<p class='error'>Sorry, no user found</p>";
            }

        }
            // Login Form
            echo '<form action="includes/login.inc.php" method="post" class="login">
                    <input type="text" name="mailuid" placeholder="Email...">        
                    <input type="password" name="pwd" placeholder="Password...">
                    <button type="submit" name="login-submit" class="btn btn-primary">Login</button>
                </form>
                <a href="signup.php">Sign Up</a>';
    ?>
</main>


<?php
    require "footer.php";
?>