<?php
class login{
    private $database;
    function __construct($db)
    {
        $this->database = $db;
    }
    public function register($name,$email,$password){
        try{
            $stat = $this->database->prepare("INSERT INTO `register` (`id`, `name`, `email`, `password`) VALUES (NULL, '$name', '$email', '$password')");
            $stat->execute();
            return true;
        }
        catch(PDOException $ex)
        {

            die($ex->getMessage());
            return false;
        }
    }
}

?>