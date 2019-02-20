<?php

class adduser extends Db
{
    public function addUser($a)
    {
        $sql = "INSERT INTO `users`(`id`, `name`, `family`, `birthday`, `postcode`, `discipline`, `city`, `email`, `password`) 
              VALUES 
            ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])";
    }
}

