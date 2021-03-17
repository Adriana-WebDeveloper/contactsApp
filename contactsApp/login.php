<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactsApp - Invalid login</title>
</head>
<body>
    <div class="container">
    <?php
    include_once "model/persist/FileUserAccess.class.php";
    $validation = FileUserAccess::validatePassword($_POST["user"], $_POST["password"]);
    //If validation is correct redirect to contacts.php and set SESSION variable to true
    if ($validation){
        $_SESSION["logedUser"] = $_POST["user"];
        $_SESSION["userValid"] = true;
        header('Location: contacts.php');
    }else {
        echo "<h2>Invalid login</h2>";
        echo "<a href='index.php'>Try again</a>";
    }
    ?>
    </div>    
</body>
</html>