<?php

//connecting to database
require_once('sql_conn.php');
        $user_password = password_hash($_POST["user_password"], PASSWORD_DEFAULT);
        $username = mysqli_real_escape_string($dbc,$_POST["username"]);
        $fname = mysqli_real_escape_string($dbc, $_POST["fname"]);
        $lname = mysqli_real_escape_string($dbc,$_POST["lname"]);
        
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

        
        $sql = "INSERT INTO members (username, user_password, fname, lname)
        VALUES ('$username', '$user_password', '$fname', '$lname');";
        
        //ties dbc with sql query 
        //otherwise won't send 
        $response = @mysqli_query($dbc, $sql);

        if ($response) {
        echo "<br/>"; 
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

        //closes the database connection
        mysqli_close($dbc)
       
		?>