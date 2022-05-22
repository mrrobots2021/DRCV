<?php

//connecting to database
require_once('sql_conn.php');
$user_password = mysqli_real_escape_string($dbc,$_POST["password"]);
$username = mysqli_real_escape_string($dbc,$_POST["username"]);

//where username = 
//does my password verfiy with what is stored 
//https://www.php.net/manual/en/function.password-verify
 //password_verfiy 
 
 //Handling Login
//Step 1: Select info from 'member' table based on username

//Step 2: Verify user exists

//Step 3: Check password w/ password_verify

//Step 4.... success? Login! failure? No login for you!


//sql query 
//match with user name password
//puts values in database 
//delcare query 

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

    //closes the database connection
    mysqli_close($dbc)

?>