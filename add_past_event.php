<?php

//connecting to database
require_once('sql_conn.php');
        $event_name = mysqli_real_escape_string($dbc,$_POST["event_name"]);
        $event_date = mysqli_real_escape_string($dbc,$_POST["event_date"]);
        $event_overview = mysqli_real_escape_string($dbc, $_POST["event_overview"]);
        $event_lessons = mysqli_real_escape_string($dbc,$_POST["event_lessons"]);
        
        //where username = 
//Step 1: Select info from 'member' table based on username

//Step 2: Verify user exists

//Step 3: Check password w/ password_verify

//Step 4.... success? Login! failure? No login for you!


        //sql query 
        //match with user name password
        //puts values in database 
        //delcare query 

        
        $sql = "INSERT INTO events (event_name, event_date, event_overview,event_lessons)
        VALUES ('$event_name', '$event_date', '$event_overview','$event_lessons')";
        
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