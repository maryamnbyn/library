<?php

class user extends Db
{
    public function addUser($a)
    {
        $sql = "INSERT INTO `users`(`name`, `family`, `birthday`, `postcode`, `discipline`, `city`, `email`, `password`) 
              VALUES 
        ('{$a['name']}','{$a['lastName']}','{$a['birthday']}','{$a['postcode']}','{$a['discipline']}','{$a['city']}','{$a['email']}','{$a['password']}');
";

    }
}

