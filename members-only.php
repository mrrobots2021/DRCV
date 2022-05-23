<?php
session_start();

if(!isset($_SESSION["loggedIn"]) || !$_SESSION["loggedIn"]){

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
    <title>Members Only</title>
</head>
<body>
    <h1 style="text-align: center;">
        <B>This is the Members Only Page!</B> <br>
        No content currently exists here. <br>
        <form action="logout.php">
            <input type="submit" value="logout"> </input>
        </form>

    </h1>
</body>
</html>