<?php
define('DB_SERVER','bnw530k7urgmxgzkeziw-mysql.services.clever-cloud.com');
define('DB_USER','uuvo090e1awwwfz0');
define('DB_PASS' ,'WknalOFgRERGk4rldEsr');
define('DB_NAME', 'bnw530k7urgmxgzkeziw');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

?>

