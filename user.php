<?php


function user($userId, $userName, $userMail, $password)
{
    echo "<main class='credentials'>";
    echo "<h1>CREDENTIALS</h1>";
    echo "<ul>";
    echo "<li>ID: $userId</li>";
    echo "<li>Name: $userName </li>";
    echo "<li>E-mail: $userMail </li>";
    echo "<li>Password: $password </li>";
    echo "</ul>";
    
    // logout button
    echo '<form action="../index.php" method="POST">
    <button type="submit" name="logout-submit" class="btn btn-primary">Logout</button>
    </form>';
    
    echo "</main>";
}