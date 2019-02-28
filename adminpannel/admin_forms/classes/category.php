<?php

class category extends Db
{
    //fetch all data
    //select all data from the data base

public function getcategory()
{
    {
        $sql = "select * from categories";
        $result = $this->connect()->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $data[] = $row;

            }
            return $data;
        }
    }
}

}
