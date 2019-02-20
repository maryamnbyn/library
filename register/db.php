<?php
$dbhost = "localhost";
$dbname = "library";
$dbuser = "root";
$dbpass="";

try {
    $db = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex)
{

die($ex->getMessage());
}
include "login-class.php";
$login = new login($db);

?>

