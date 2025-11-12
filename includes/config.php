<?php

//user pass database 
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'PDCS_2411500075';

//mematiikan error reporting untuk mysqli
//mysqli_report(MYSQLI_REPORT_OFF);

//membuat koenksi
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

//error handling
if ($mysqli->connect_error){
    die ("koneksi gagal : " . $mysqli->connect_error);
}
?>