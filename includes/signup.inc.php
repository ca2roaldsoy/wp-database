<?php

if(isset($_POST["signup-submit"])) {

    include "connectDatabase.php";

    $db = connect();

    $username = $db->real_escape_string($_POST["uid"]);
    $email = $db->real_escape_string($_POST["mail"]);
    $password = $db->real_escape_string($_POST["pwd"]);
    $passwordRepeat = $db->real_escape_string($_POST["pwd-repeat"]);

    // validation
    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invalidmail&uid");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();
    }
    else if (!preg_match( "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password)) {
        header("Location: ../signup.php?error=invalidpassword&uid=".$username."&mail=".$email);
        exit();
    }
    else if ($password !== $passwordRepeat) {
        header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }
    else {
        // Select from database table = allusers
        $sql = "SELECT emailUsers FROM allusers WHERE emailUsers=?";

        $statement = $db->prepare($sql);
        $statement->bind_param("s", $email);
        $statement->execute();
     
        $statement->store_result();
        $statement->bind_result($email);
            
        //check if email already exists
        $resultCheck = $statement->num_rows();
        if ($resultCheck > 0) {
            header("Location: ../signup.php?error=usertaken&username=".$username);
            exit();
        }
        else {

            // insert to database
            $sql = "INSERT INTO allusers(id, uidUsers, emailUsers, pwdUsers) VALUES(?, ?, ?, ?)";
 
            $statement = $db->prepare($sql);
 
            if (!$db->prepare($sql)) {
                header("Location: ../signup.php?error=sqlerror");
                exit();
            } 
            else {
                $statement->fetch();

                // make password "unreadble"
                $hashPwd = password_hash($password, PASSWORD_DEFAULT);

                $statement = $db->prepare($sql);
                $statement->bind_param("isss", $id, $username, $email, $hashPwd);
                $statement->execute();

                header("Location: ../signup.php?signup=success");
                echo "SUCCESS";
            }
        }
    }
}

else {
    header("Location: ../signup.php");
    exit();
}