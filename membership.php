<?php

    //Get database connection from sql_conn.php file
    require_once('sql_conn.php');
        
    //Declare variables from login POST request
    $username = mysqli_real_escape_string($dbc, $_POST["username"]);
    $password = mysqli_real_escape_string($dbc, $_POST["password"]);

    //Perform MySQL query to retrieve matching user(s)
    $sql = "SELECT * FROM members WHERE username='$username'";
    $results = mysqli_query($dbc, $sql);

    //Iterate through query results...
    foreach($results as $result) {
        //Verify the password against the hashed password in the database
        $passwordCheck = password_verify($password, $result['user_password']);

        //If the password check is successful (user authenticated), create a session with the session variable 'username'
        if($passwordCheck) {
            $_SESSION['username'] = $result['username'];
        }
    }

    //Close the MySQL connection
    mysqli_close($dbc)

?>