<?php

//connecting to database
require_once('sql_conn.php');
$user_password = mysqli_real_escape_string($dbc,$_POST["password"]);
$username = mysqli_real_escape_string($dbc,$_POST["username"]);
$captcha=$_POST['g-recaptcha-response'];

//recaptcha Check. Base code provided by https://codeforgeek.com/google-recaptcha-tutorial/
if(!$captcha){
    echo '
Please check the the captcha form.
';
    die();
  }
  $secretKey = "6Lfq7gEgAAAAABrtDmkDFVXmrJ1Q888R5G77tLQp";
  $ip = $_SERVER['REMOTE_ADDR'];
  // post request to server
  $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
  $response = file_get_contents($url);
  $responseKeys = json_decode($response,true);
  // should return JSON with success as true

  //if the captcha succeeded
  if($responseKeys["success"]) {
          
    //if the user failed to type the same password twice
    if(!isset($user_password)){

        echo "you need to input a password. <br> <a href=membership.html> Back to Login Page </a>";

    }else if (!isset($username)){

        echo "you need to input a username. <br> <a href=membership.html> Back to Login Page </a>";

    }else{

            $credentialsMatch = False;
            $databaseUser;

        // get the username and password of all accounts in the database
        $query = "SELECT username, user_password, isadmin FROM members";

        $response = @mysqli_query($dbc, $query);

        if(!$response){
            echo "Couldn't issue database query<br />";

            echo mysqli_error($dbc);
        }


        //check every username and password for a match
        while($row = mysqli_fetch_array($response)){

            /*
            echo "username: ".$row['username']."<br>";
            echo "entered username: ".$username."<br>";
            echo "password: ".$row['user_password']."<br>";
            echo "entered password: ".$user_password."<br>";
            $compared = $row['username'] ==  $username;
            echo "compare usernames: ".$compared."<br>";
            echo "compare passwords: ".password_verify($user_password, $row['user_password'])."<br>";
            */
            //if a match is found, save that particular user's credentials
            if($row['username'] ==  $username && password_verify($user_password, $row['user_password']) ){
                $credentialsMatch = True;
                $databaseUser = $row;
            }

        }

        //if we found a match, direct them to the admin hub if they're an admin, or the members-only page if they're
        //just a member.

        //echo "credentials match: ".$credentialsMatch;
        if($credentialsMatch){
            session_start();
            $_SESSION["loggedIn"] = True;

            if($databaseUser['isadmin']){
                $_SESSION["isadmin"] = True;
                ob_start();
                header("Location: admin-hub.php");
                ob_end_flush();
                die();
            }else{
                $_SESSION["isadmin"] = False;
                ob_start();
                header("Location: members-only.php");
                ob_end_flush();
                die();
            }

        }else{
            echo "Incorrect username or password. <br> <a href=membership.html> Back to Login Page </a>";
        }

    }


  } else {
          echo "reCAPTCHA failed. Please try again.";
  }

    //closes the database connection
    mysqli_close($dbc)

?>