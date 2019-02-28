<?php

require_once(__DIR__ . '/Db.php');

class writer extends Db
{
    private $connection;

    public function __construct()
    {
        //connection
        try {
            $this->connection = new PDO("mysql:host=localhost;dbname=library", 'root', '');
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            return "Connection failed: " . $e->getMessage();
        }
    }
    public function showBooksWriter($id)
    {

        {

            $sql = "select book.id , book.name , book.bookImage , book.title , book.date_of_print,book.description,
writer.name as writerName
from book 
INNER JOIN writer on (writer.id = book.writerID)
WHERE writer.id = :id  ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;

        }
    }


    public function addWriter($a, $b)
    {
        $images = $b['writerImage']['name'];
        $tmp_dir = $b['writerImage']['tmp_name'];
        $imagesize = $b['writerImage']['size'];

        $upload_dir = 'uploads/';
        $imgExt = strtolower(pathinfo($images, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
        $picWriter = rand(1000, 1000000) . "." . $imgExt;
        move_uploaded_file($tmp_dir, $upload_dir . $picWriter);
        $sql = "INSERT INTO `writer`(`name`, `birthday`, `city`,`description`,`image`) 
              VALUES 
        (:name,:birthday,:city,:description,:image);
";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindparam(':name', $a['name']);
        $stmt->bindparam(':birthday', $a['birthday']);
        $stmt->bindparam(':city', $a['city']);
        $stmt->bindparam(':description', $a['description']);
        $stmt->bindparam(':image', $picWriter);


        if ($stmt->execute()) {
            ?>
            <script>
                alert("new witer Added");
                window.location.href = ('writerList.php');
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
    public function showOneWriter($id)
    {

        {

            $sql = "Select * from writer 
WHERE writer.id = :id
 ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;

        }
    }

    public function getwriters()
    {
        $sql = "select * from writer";
        $result = $this->connect()->query($sql);

        return $result->fetchAll();


    }

    public function selectWriter()
    {

        $sql = "select * from writer";
        $result = $this->connection->prepare($sql);
        $result->execute();
        return $result->fetchAll();

    }


    public function destroy($id)
    {
        $sql = "DELETE FROM writer WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

    }

    public function selectOne($id)
    {

        $sql = "SELECT * FROM writer WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }

    public function editWriter($writer)
    {
        $sql = "UPDATE `writer` SET
`name`=:fname,`birthday`=:birthday,`city`=:city WHERE `id` =:id";


        $stmt = $this->connection->prepare($sql);

        $stmt->execute(
            [
                ":id" => $writer['id'],
                ":fname" => $writer['name'],
                ":birthday" => $writer['birthday'],
                ":city" => $writer['city'],
            ]);

        if ($stmt->execute()) {
            ?>
            <script>
                alert("record Edited");
                window.location.href = ('writerList.php');
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Error");
                window.location.href = ('writerList.php');
            </script>
            <?php
        }
    }
}

























