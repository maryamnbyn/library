
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


    public function addWriter($a)
    {
        $sql = "INSERT INTO `writer`(`name`, `birthday`, `city`) 
              VALUES 
        (:name,:birthday,:city);
";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindparam(':name', $a['name']);
        $stmt->bindparam(':birthday', $a['birthday']);
        $stmt->bindparam(':city', $a['city']);


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

    public function selectWriter()
    {

        $sql    = "select * from writer";
        $result = $this->connection->prepare($sql);
        $result->execute();
        return $result->fetchAll();

    }


    public function destroy($id)
    {
        $sql  = "DELETE FROM writer WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

    }

    public function selectOne($id)
    {

        $sql  = "SELECT * FROM writer WHERE id = :id";
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
            ":id"           => $writer['id'],
            ":fname"        => $writer['name'],
            ":birthday"     => $writer['birthday'],
            ":city"         => $writer['city'],
        ]);
    }




}





























