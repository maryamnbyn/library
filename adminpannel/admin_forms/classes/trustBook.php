<?php

class trustbook extends Db
{
    //fetch all data
    //select all data from the data base
    public function select()
    {
        $sql = "select trustbook.id,trustbook.lend_of_book,trustbook.to_take_back ,book.name , writer.name as writerName,users.name as UserName
                from trustbook
                LEFT JOIN  writer on(writer.id = trustbook.writerID)
                LEFT JOIN book on(book.id = trustbook.bookID)
                LEFT JOIN  users on(users.id = trustbook.userID)

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
        $trustbookcolumns = implode(',', array_keys($fields));
        $trustbookPlaceholder = implode(",:", array_keys($fields));
        $sql = "INSERT INTO trustbook ($trustbookcolumns) VALUES (:" . $trustbookPlaceholder . ")";
        $stmt = $this->connect()->prepare($sql);
        foreach ($fields as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        if ($stmt->execute())
        {
            ?>
            <script>
                alert("Trust Book added!");
                window.location.href = ('listTrustBook.php');
            </script>
            <?php
        } else
            {
            ?>
            <script>
                alert("Error");
                window.location.href = ('index.php');
            </script>
            <?php
        }
    }

    public function selectOne($id)
    {
        $sql  = "SELECT * from trustbook WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update($fields){
        $sql ="UPDATE `trustbook` SET `userID`=:userID,`bookID`=:bookID,`writerID`=:writerID,`lend_of_book`=:lendOfBook,`to_take_back`=:ToTakeBook WHERE `id`=:id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindparam(':id', $fields['id']);
        $stmt->bindparam(':writerID', $fields['writerName']);
        $stmt->bindparam(':userID', $fields['UserName']);
        $stmt->bindparam(':bookID', $fields['bookName']);
        $stmt->bindparam(':lendOfBook', $fields['date']);
        $stmt->bindparam(':ToTakeBook', $fields['datee']);
        if ($stmt->execute()) {
            ?>
            <script>
                alert("record Edited");
                window.location.href = ('listTrustBook.php');
            </script>
            <?php
        } else
            {
    ?>
    <script>
        alert("Error");
        window.location.href = ('listTrustBook.php');
    </script>
    <?php
}
}

    public function destroy($id)
    {
        $sql  = "DELETE FROM trustbook WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

    }
}


?>