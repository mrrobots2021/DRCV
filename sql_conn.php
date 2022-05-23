<?php
// Defined as constants so that they can't be changed
DEFINE ('DB_USER', 'drcv2012_user');
DEFINE ('DB_PASSWORD', 'WebSystems2022');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'drcv2012_DRCV');
// $dbc will contain a resource link to the database
// @ keeps the error from showing in the browser

//DBC is the connection!
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());

?>