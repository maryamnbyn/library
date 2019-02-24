<?php

class book extends Db
{
    //fetch all data
    //select all data from the data base
    public function select()
    {
        $sql = "select * from book";
        $result = $this->connect()->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $data[] = $row;

            }
            return $data;
        }
    }


    public function addbook($a, $b)
    {

        $images = $b['picbook']['name'];
        $tmp_dir = $b['picbook']['tmp_name'];
        $imagesize = $b['picbook']['size'];

        $upload_dir = 'uploads/';
        $imgExt = strtolower(pathinfo($images, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
        $picBook = rand(1000, 1000000) . "." . $imgExt;
        move_uploaded_file($tmp_dir, $upload_dir . $picBook);

        $sql = "INSERT INTO `book`(`name`,`writerID`, `date_of_print`, `title`, `num_of_print`, `categoryID` ,`bookImage`)
 VALUES 
 (:name ,:writerID ,:date_of_print,:title,:num_of_print,:categoryID,:bookImage)
";
        $stmt = $this->connect()->prepare($sql);

        $stmt->bindparam(':name', $a['name']);
        $stmt->bindparam(':writerID', $a['writerID']);
        $stmt->bindparam(':date_of_print', $a['date']);
        $stmt->bindparam(':title', $a['title']);
        $stmt->bindparam(':num_of_print', $a['num']);
        $stmt->bindparam(':categoryID', $a['categoryID']);
        $stmt->bindparam(':bookImage', $picBook);


        if ($stmt->execute()) {
            ?>
            <script>
                alert("new record successul");
                window.location.href = ('index.php');
            </script>
            <?php
        } else {
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

        $sql .= "UPDATE book SET " . $st;
        $sql .= " WHERE id = " . $id;
        $stmt = $this->connect()->prepare($sql);
        foreach ($fields as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        $stmtExec = $stmt->execute();
        if ($stmtExec) {

            header('Location: index.php');
        }
    }

    public function destroy($id)
    {
        $sql = "DELETE FROM book WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

    }
}


?>