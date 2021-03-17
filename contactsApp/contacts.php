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
    <link rel="stylesheet" href="css/contacts.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactsApp - Contacts</title>
</head>
<body>
    <form action="contacts.php" method="post">
        <input type="text" name="name"required="true" placeholder="Name" />
        <input type="text" name="phone"required="true" placeholder="Phone" />
        <input type="text" name="email"required="true" placeholder="Email" />
        <input value="Add Contact" type="submit" name="addContact" />
    </form>
    <form action="logout.php" method="post">
        <button class="logout_button" type="submit">Log out</button>
    </form>
    <?php
    include_once "model/persist/FileContactsAccess.class.php";
    if(isset($_POST["addContact"])){
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])){
            FileContactsAccess::addContact($_POST['name'], $_POST['email'], $_POST['phone'], $_SESSION['logedUser']);
        }else{
            echo "Invalid form input";
        }
    }
    $contactList = FileContactsAccess::getContacts($_SESSION['logedUser']);
    if(count($contactList)>0){
        echo "<table><tr><th>Name</th><th>Email</th><th>Phone</th></tr>";
        for ($i=0; $i < count($contactList); $i++) { 
            echo "<tr><td>".$contactList[$i][0]."</td><td>".$contactList[$i][1]."</td><td>".$contactList[$i][2]."</td></tr>";
        }
        echo "</table>";
    }

    ?>
</body>
</html>