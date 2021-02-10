<?php
require "../header.php";

if (isset($_POST["login-submit"])) {

    $mailuid = $_POST["mailuid"];
    $password = $_POST["pwd"];

    require_once "connectDatabase.php";
    require_once "consoleLog.php";
    include "../user.php";

    // connect to database
    $db = connect();

    // validation
    if (empty($mailuid) || empty($password)) {
        header("Location: ../index.php?error=emptyinputs");
        exit();
    }
    
    // Select from database
    $stmt = $db->prepare("SELECT id, uidUsers, emailUsers, pwdUsers FROM allusers WHERE emailUsers=?;");
    $stmt->bind_param("s", $mailuid);

    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($userId, $userName, $userMail, $userPwd);

    if($stmt->num_rows() == 1) {
        $stmt->fetch();
        
        // check if password matches hatched password 
        if(password_verify($password, $userPwd)) {
            $_SESSION["userId"] = $userMail;
            $_SESSION["pass"] = $userPwd;

            user($userId, $userName, $userMail, $password);
            exit();
        }
        else {
            // validation if password doesnt match hatched password
            $_SESSION = [];
            session_destroy();
            header("Location: ../index.php?error=wrongpassword");
            exit();
        }
    }
    else {
        // validation if no user is found
        $_SESSION = [];
        session_destroy();
        header("Location: ../index.php?error=nouserfound");
        exit();
    }
    // validation if login fails
    header("Location: ../index.php?error=loginfailed");
    exit();
    echo "login failed";
}
else {

    header("Location: ../index.php");
    exit();
}