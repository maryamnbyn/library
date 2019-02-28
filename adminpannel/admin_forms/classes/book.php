<?php

class book extends Db
{
    //fetch all data
    //select all data from the data base
    public function select()
    {
        $sql    = "select * from book";
        $result = $this->connect()->query($sql);
        if ($result->rowCount() > 0)
        {
            while ($row = $result->fetch())
            {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function bookCondition($name)
    {
        $sql    = "select trustbook.lend_of_book,trustbook.to_take_back,book.name
                from trustbook,book
                where(book.id = trustbook.bookID AND lend_of_book<now() AND NOW()<to_take_back)
";
        $result = $this->connect()->query($sql);
        $Lists  = $result->fetchAll();
        $status=0;
        foreach ($Lists as $list)
        {
            if($list['name'] == $name)
            {
                echo  "Condition: ".$name." is not entity";
                $status = 1;
            }
        }
        if($status == 0) {
            echo "Condition : You Can trust"." " . $name;
        }
    }
    public function showcategory()
    {
        $sql = "SELECT book.name ,categories.title, categories.id ,book.bookImage
                from book 
                INNER JOIN categories on (book.categoryID = categories.id)
                GROUP BY categories.title  ";
        $result = $this->connect()->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function showCategoryBook($id)
    {
        {
            $sql = "SELECT book.name,categories.id ,categories.title ,book.bookImage ,book.description,book.title as booktitle,book.description, book.id as bookID
                    from book 
                    INNER JOIN categories on (book.categoryID = categories.id)
                    WHERE categories.id = :id  ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }
    }
    public function showOneBook($id)
    {
        {
            $sql = "SELECT book.name,categories.id ,categories.title ,book.bookImage ,book.title as booktitle,book.description,book.description,writer.name as WriterName
                    from book
                    INNER JOIN categories on (book.categoryID = categories.id)
                    RIGHT JOIN writer on(book.writerID=writer.id)
                    WHERE book.id = :id
 ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }
    }
    public function addbook($a, $b)
    {
        $images           = $b['picbook']['name'];
        $tmp_dir          = $b['picbook']['tmp_name'];
        $imagesize        = $b['picbook']['size'];
        $upload_dir       = 'uploads/';
        $imgExt           = strtolower(pathinfo($images, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
        $picBook          = rand(1000, 1000000).".".$imgExt;
        move_uploaded_file($tmp_dir, $upload_dir . $picBook);
        $sql = "INSERT INTO `book`(`name`,`writerID`, `date_of_print`, `title`, `num_of_print`, `categoryID` ,`bookImage`,`description`)
                VALUES 
                (:name ,:writerID ,:date_of_print,:title,:num_of_print,:categoryID,:bookImage,:description)
";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindparam(':name', $a['name']);
        $stmt->bindparam(':writerID', $a['writerID']);
        $stmt->bindparam(':date_of_print', $a['date']);
        $stmt->bindparam(':title', $a['title']);
        $stmt->bindparam(':num_of_print', $a['num']);
        $stmt->bindparam(':categoryID', $a['categoryID']);
        $stmt->bindparam(':description', $a['description']);
        $stmt->bindparam(':bookImage', $picBook);
        if ($stmt->execute())
        {
            ?>
            <script>
                alert("new record successul");
                window.location.href = ('index.php');
            </script>
            <?php
        }
        else
            {
            ?>
            <script>
                alert("Error");
                window.location.href = ('index.php');
            </script>
            <?php
        }
    }
    public function categoryBook()
    {
        $sql = "select * from categories";
        $result = $this->connect()->query($sql);
        return $result->fetchAll();
    }
    public function getwriters()
    {
        $sql = "select * from writer";
        $result = $this->connect()->query($sql);
        return $result->fetchAll();
    }
    public function selectOne($id)
    {
        $sql = "SELECT * FROM book WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function update($a,$b)
    {
        $images           = $b['picbook']['name'];
        $tmp_dir          = $b['picbook']['tmp_name'];
        $imagesize        = $b['picbook']['size'];
        $upload_dir       = 'uploads/';
        $imgExt           = strtolower(pathinfo($images, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
        $picBook          = rand(1000, 1000000).".".$imgExt;
        move_uploaded_file($tmp_dir, $upload_dir . $picBook);
        $sql ="UPDATE `book` SET 
               `writerID`=:writerID,`name`=:name,`date_of_print`=:date_of_print,`title`=:title,`num_of_print`=:num_of_print,`categoryID`=:categoryID,`bookImage`=:bookImage,`description`=:description WHERE `id`=:id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindparam(':id', $a['id']);
        $stmt->bindparam(':writerID', $a['writerID']);
        $stmt->bindparam(':name', $a['name']);
        $stmt->bindparam(':date_of_print', $a['date']);
        $stmt->bindparam(':title', $a['title']);
        $stmt->bindparam(':num_of_print', $a['num']);
        $stmt->bindparam(':categoryID', $a['categoryID']);
        $stmt->bindparam(':bookImage', $picBook);
        $stmt->bindparam(':description', $a['description']);
        if ($stmt->execute())
        {
            ?>
            <script>
                alert("record Edited");
                window.location.href = ('index.php');
            </script>
            <?php
        }
        else
            {
            ?>
            <script>
                alert("Error");
                window.location.href = ('index.php');
            </script>
            <?php
        }
    }
    public function destroy($id)
    {
        $sql  = "DELETE FROM book WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }
}


?>