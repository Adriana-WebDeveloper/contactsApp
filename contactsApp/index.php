<?php
session_start();
//If user is logged redirect to contacts
if(isset($_SESSION['userValid'])){
    header('Location: contacts.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactsApp - Login</title>
</head>
<body>
    <form class="login-form" action="login.php" method="post">
    <p class="login-text">
        <span class="fa-stack fa-lg">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-lock fa-stack-1x"></i>
        </span>
    </p>
    <input type="text" name="user" class="login-username" autofocus="true" required="true" placeholder="User Name" />
    <input type="password" name="password" class="login-password" required="true" placeholder="Password" />
    <input type="submit" class="login-submit" />
    </form>
    <div class="underlay-photo"></div>
    <div class="underlay-black"></div> 
</body>
</html>
