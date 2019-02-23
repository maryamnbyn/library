<?php
class connection{
    public function dbConnect(){
        return new PDO("mysql:host=localhost; dbname=library" , "root" , "");
    }
}




?>