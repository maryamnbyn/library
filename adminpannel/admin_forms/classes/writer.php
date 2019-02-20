<?php

class writer extends Db
{
    //fetch all data
    //select all data from the data base
    public function select()
    {
        $sql = "select * FROM writer;
";
        $result = $this->connect()->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $data[] = $row;

            }
            return $data;
        }
    }
    public function insert($fields)
    {
        // INSERT INTO `users`(`id`, `bookID`, `name`, `family`, `birthday`, `date`, `postcode`, `discipline`, `city`, `email`, `password`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])
        $trustbookcolumns = implode(',', array_keys($fields));
        $trustbookPlaceholder = implode(",:", array_keys($fields));
        $sql = "INSERT INTO writer ($trustbookcolumns) VALUES (:" . $trustbookPlaceholder . ")";
        $stmt = $this->connect()->prepare($sql);


        foreach ($fields as $key => $value) {
            $stmt->bindValue(':' . $key, $value);

        }


        $stmtExec = $stmt->execute();
        if ($stmtExec) {
            header('Location: ');
        }
    }





}

