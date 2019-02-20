<?php

class trustbook extends Db
{
    //fetch all data
    //select all data from the data base
    public function select()
    {
        $sql = "select book.id ,book.name  , trustbook.lend_of_book , trustbook.to_take_back from book,trustbook
WHERE book.id = trustbook.bookID
";
        $result = $this->connect()->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $data[] = $row;

            }
            return $data;
        }
    }

    public function getBooks()
    {
        $sql = "select * from book";
        $result = $this->connect()->query($sql);

        return $result->fetchAll();


    }
    public function getusers()
    {
        $sql = "select * from users";
        $result = $this->connect()->query($sql);

        return $result->fetchAll();


    }
    public function getwriters()
    {
        $sql = "select * from writer";
        $result = $this->connect()->query($sql);

        return $result->fetchAll();


    }




    public function insert($fields)
    {
//"INSERT INTO `book`(`id`, `writerID`, `name`, `date_of_print`, `title`, `num_of_print`, `categoryID`, `bookImage`)
// VALUES
// ('','',:name,:date_of_print,:title,:num_of_print,'','')"
        $trustbookcolumns = implode(',', array_keys($fields));
        $trustbookPlaceholder = implode(",:", array_keys($fields));
        $sql = "INSERT INTO trustbook ($trustbookcolumns) VALUES (:" . $trustbookPlaceholder . ")";
        $stmt = $this->connect()->prepare($sql);


        foreach ($fields as $key => $value) {
            $stmt->bindValue(':' . $key, $value);

        }


        $stmtExec = $stmt->execute();
        if ($stmtExec) {
            header('Location: listTrustBook.php');
        }
    }

    public function selectOne($id)
    {

        $sql = "SELECT * FROM trustbook WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }

    public function update($fields, $id)
    {
        $st = "";
        $counter = 1;
        $total_fields = count($fields);
        foreach ($fields as $key => $value) {
            if ($counter === $total_fields) {
                $set = "$key = :" . $key;
                $st = $st . $set;


            } else {
                $set = "$key = :" . $key . ", ";
                $st = $st . $set;
                $counter++;

            }

        }
        $sql = " ";

        $sql .= "UPDATE trustbook SET " . $st;
        $sql .= " WHERE id = " . $id;
        $stmt = $this->connect()->prepare($sql);
        foreach ($fields as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        $stmtExec = $stmt->execute();
        if ($stmtExec) {

            header('Location: listTrustBook.php');
        }
    }

    public function destroy($id)
    {
        $sql = "DELETE FROM trustbook WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

    }
}


?>