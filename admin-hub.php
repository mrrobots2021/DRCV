<?php
session_start();

if(!isset($_SESSION["loggedIn"]) || !$_SESSION["loggedIn"] || !$_SESSION['isadmin']){

    ob_start();
    header("Location: home.html");
    ob_end_flush();
    die();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Hub</title>
</head>
<body style="align-items: center;">
    <h1>
        <a href="remove-members.php" >
            Remove and See Existing Members
        </a>
    </h1>
    <h1>
        <a href="Register.html">
            Add New Members
        </a>
    </h1>
    <h1>
        <a href="members-only.php">
            Members Only Page
        </a>
    </h1>
    <form action="logout.php">
            <input type="submit" value="logout"> </input>
    </form>

    
</body>
</html>