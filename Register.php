<?php

//connecting to database
require_once('sql_conn.php');
        $user_password = password_hash($_POST["user_password"], PASSWORD_DEFAULT);
        $username = mysqli_real_escape_string($dbc,$_POST["username"]);
        $fname = mysqli_real_escape_string($dbc, $_POST["fname"]);
        $lname = mysqli_real_escape_string($dbc,$_POST["lname"]);
        //DO NOT PUT THE BELOW 2 VARIABLES IN THE DATABASE
        $text_password = mysqli_real_escape_string($dbc, $_POST["user_password"]);
        $password_confirm = mysqli_real_escape_string($dbc, $_POST["confirm_password"]);
        $isadmin = $_POST["is_admin"];

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
        if(strcmp($password_confirm, $text_password) != 0){
          echo "<br/>"; 
            echo "Passwords do not match";
        }else{

          if($isadmin == "true"){

            $access = True;

          }else if($isadmin =="false"){
            $access = False;
          }else{
            echo "unexpected behavior";
          }

          $sql = "INSERT INTO members (username, user_password, fname, lname, isadmin)
          VALUES ('$username', '$user_password', '$fname', '$lname', '$access');";
            
          //ties dbc with sql query
          //otherwise won't send
          $response = @mysqli_query($dbc, $sql);
    
          if ($response) {
          echo "<br/>"; 
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

        }
        
        //closes the database connection
        mysqli_close($dbc)
       
		?>