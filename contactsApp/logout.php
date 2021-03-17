<?php
session_start();
//If user is logged redirect to contacts
if(!isset($_SESSION['userValid'])){
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactsApp - Contacts</title>
</head>
<body>
    <?php
    session_destroy();
    header('Location: index.php');
    ?>
</body>
</html>