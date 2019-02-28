<?php

require_once(__DIR__ . '/Db.php');

class user extends Db
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
    public function addUser($a)
    {
        $sql = "INSERT INTO `users`(`name`, `family`, `birthday`, `postcode`, `discipline`, `city`, `email`, `password`) 
                VALUES 
                (:name,:family,:birthday,:postcode,:discipline,:city,:email,:password);
";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindparam(':name'      , $a['name']);
        $stmt->bindparam(':family'    , $a['lastName']);
        $stmt->bindparam(':email'     , $a['email']);
        $stmt->bindparam(':password'  , md5($a['password']));
        $stmt->bindparam(':city'      , $a['city']);
        $stmt->bindparam(':birthday'  , $a['birthday']);
        $stmt->bindparam(':postcode'  , $a['postcode']);
        $stmt->bindparam(':discipline', $a['discipline']);


        $stmt->execute();
        if ($stmt->execute())
        {
            $_SESSION['username'] = $a['name'];
            $_SESSION['success']  = "You are now logged in";
            ?>
            <script>
                alert("Add User Successful");
                window.location.href = ('../../index1.php');
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

    public function selectUsers()
    {

        $sql    = "select * from users";
        $result = $this->connection->prepare($sql);
        $result->execute();
        return $result->fetchAll();

    }


    public function destroy($id)
    {
        $sql  = "DELETE FROM users WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

    }

    public function selectOne($id)
    {

        $sql  = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }

    public function editUsers($user)
    {
        $sql = "UPDATE `users` SET
                `name`=:fname,`family`=:lastName,`birthday`=:birthday,`postcode`=:postcode,`discipline`=:discipline,`city`=:city,`email`=:email,`password`=:password WHERE `id` =:id";


        $stmt = $this->connection->prepare($sql);

        $stmt->execute([
            ":id"         => $user['id'],
            ":fname"      => $user['name'],
            ":lastName"   => $user['lastName'],
            ":birthday"   => $user['birthday'],
            ":postcode"   => $user['postcode'],
            ":discipline" => $user['discipline'],
            ":city"       => $user['city'],
            ":email"      => $user['email'],
            ":password"   => $user['password']
        ]);
        if ($stmt->execute()) {
            ?>
            <script>
                alert("record Edited");
                window.location.href = ('userList.php');
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Error");
                window.location.href = ('userList.php');
            </script>
            <?php
        }
    }



    public function userLogin($email, $pass)
    {
        if (!empty($email) && !empty($pass)) {
            $st = $this->connection->prepare("select * from users where email =:email and password=:password");

            $st->bindParam(':email', $email);
            $st->bindParam(':password', $pass);
            $st->execute();
              if ($st->rowCount() == 1) {
                $_SESSION['username'] = $email;
                $_SESSION['success']  = "You are now logged in";
                ?>
                <script>
                    alert("User IS Login");
                    window.location.href = ('../../index1.php');
                </script>
                <?php
            }
              else
                  {
                ?>
                <script>
                    alert("Error");
                    window.location.href = ('../../index.php');
                </script>
                <?php
            }
        }
    }
}


