<?php
try {
   $db =  new PDO("mysql:host=localhost;dbname=library", "root", "");
}
catch (PDOException $e){
    die($e->getMessage());
}
