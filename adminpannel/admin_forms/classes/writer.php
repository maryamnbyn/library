<?php

class writer extends Db
{
    //fetch all data
    //select all data from the data base
    public function selectWriter()
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
    public function destroy($id)
    {
        $sql = "DELETE FROM writer WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

    }
    public function updateWriter($getWriter,$id){

        $sql ="update `writer` set `name`=:name, `birthday`=:birthday , `city`=:city where `id`=".$id;
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":name", $getWriter['name'], PDO::PARAM_STR);
        $stmt->bindValue(":birthday", $getWriter['birthday'], PDO::PARAM_STR);
        $stmt->bindValue(":city", $getWriter['city'], PDO::PARAM_STR);
        $stmt->bindValue(":id", $getWriter['id'], PDO::PARAM_STR);
        $stmt->execute();

    }


    public function  selectOne($id)
    {

        $sql ="SELECT * FROM writer WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id",$id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }



}

