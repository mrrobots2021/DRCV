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
    <title>Remove Members</title>
</head>
<body>


<form action="remove-members.php" method="post">
<h1><p align ='center'><u>ENTER DETAILS</u></p></h1><br><br>
<h3>
    <a href="admin-hub.php" style="display: block;">
        Return to the Admin Hub
    </a>
<h3>
<h2><b>Enter ID of the Member You Want to Remove: </b><br>
<input type="number" name="deleteID"><br><br>
<input type ="submit">
</h2>

    <div style="display: block;">
        <?php

            // Get a connection for the database
            require_once('sql_conn.php');

            //checks to see if deleteID even exists yet
            if(isset($_POST["deleteID"])){

                //if it does, check if it's only numbers, and if the number is too long.
                if(ctype_digit($_POST["deleteID"]) && strlen($_POST["deleteID"])<10){
                

                    $query = "DELETE FROM members WHERE user_id=".$_POST["deleteID"];
                
                    $response = @mysqli_query($dbc, $query);
                
                    if(!$response){
                        echo "Couldn't issue database query<br />";
                
                        echo mysqli_error($dbc);
                    }
                
                }else {
                    echo '<script>';
                    echo 'alert("Error: You must enter a valid, non-negative number of appropriate size.")';
                    echo '</script>';
                }

            }

            // Create a query for the database
            $query = "SELECT user_id, username, fname, lname, isadmin FROM members";

            // Get a response from the database by sending the connection
            // and the query
            $response = @mysqli_query($dbc, $query);

            // If the query executed properly proceed
            if($response){

            echo '<table align="left" cellspacing="5" cellpadding="8" border="solid">
                <tr>
                    <td align="left"><b>User Id</b></td>
                    <td align="left"><b>Username</b></td>
                    <td align="left"><b>First Name</b></td>
                    <td align="left"><b>Last Name</b></td>
                    <td align="left"><b>Is Admin</b></td>
                </tr>';
                

            // mysqli_fetch_array will return a row of data from the query
            // until no further data is available
            while($row = mysqli_fetch_array($response)){

            echo '<tr><td align="left">' . 
            $row['user_id'] . '</td><td align="left">' .
            $row['username'] . '</td><td align="left">' . 
            $row['fname'] . '</td><td align="left">' .
            $row['lname'] . '</td><td align="left">' .
            $row['isadmin'] . '</td>';

            echo '</tr>';
            }

            echo '</table>';

            } else {

            echo "Couldn't issue database query<br />";

            echo mysqli_error($dbc);

            }



            // Close connection to the database
            mysqli_close($dbc);

        ?>
    </div>
   

</body>