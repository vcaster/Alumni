<?php
//db details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'alumni_cms';

//Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

//$dbHost = 'sql211.epizy.com';
//$dbUsername = 'epiz_22621754';
//$dbPassword = 'DAQ3bX5aAPwcJCx';
//$dbName = 'epiz_22621754_alumni_cms';
//
////Connect and select the database
//$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
//
//if ($db->connect_error) {
//    die("Connection failed: " . $db->connect_error);
//}


?>