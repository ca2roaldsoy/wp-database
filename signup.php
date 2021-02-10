<?php 
    require "header.php";
?>

    <main>
      <h1>Sign Up</h1>

        <?php
            // error messages
            if(isset($_GET["error"])) {
                if($_GET["error"] == "emptyfields") {
                    echo "<p class='error'> Fill in all fields</p>";
                }
                else if($_GET["error"] == "invalidmail&uid") {
                    echo "<p class='error'>invalid username and e-mail</p>";
                }
                else if($_GET["error"] == "usertaken") {
                    echo "<p class='error'>Email already exist</p>";
                }
                else if($_GET["error"] == "invalidemail") {
                    echo "<p class='error'>invalid email</p>";
                }
                else if($_GET["error"] == "invalidpassword") {
                    echo " 
                        <ul class='error'>Password must contain of least:
                            <li>one uppercase letter</li>
                            <li>one lowercase letter</li>
                            <li>one digit</li>
                            <li>8 characters</li>
                        </ul>";
                }
                else if($_GET["error"] == "passwordcheck") {
                    echo "<p class='error'>password do not match</p>";
                }
                else if($_GET["error"] == "email_exists") {
                    echo "<p class='error'>email already exists</p>";
                }
            } 
          
            if (isset($_GET["signup"])) {
                echo "<h2 class='success'>SUCCESS</h2>";
            } 
        ?>

        <!-- Signup Form -->
        <form action="./includes/signup.inc.php" method="post" class="signup">
            <input type="text" name="uid" placeholder="Username" value="<?php if(isset($_GET["uid"])) echo htmlspecialchars($_GET["uid"]) /* if error, keep value */ ?>">
            <input type="text" name="mail" placeholder="E-mail" value="<?php if(isset($_GET["mail"])) echo htmlspecialchars($_GET["mail"]) /* if error, keep value */ ?>">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwd-repeat" placeholder="Repeat password">
            <button type="submit" name="signup-submit" class="btn btn-primary">Sign Up</button>
        </form>
            <a href="index.php">&larr; Log in</a>
    
    </main>
               
<?php
    require "footer.php";
?>