<?php
include_once('connection.php');

class admin
{
    private $db;

    public function __construct()
    {
        $this->db = new connection();
        $this->db = $this->db->dbConnect();
    }

    public function Login($name, $pass)
    {
        if (!empty($name) && !empty($pass)) {
            $st = $this->db->prepare("select * from admin where username =? and password=?");
            $st->bindParam(1, $name);

            $st->bindParam(2, $pass);
            $st->execute();
            if ($st->rowCount() == 1) {
                header('Location: http://localhost/project/adminpannel/' );
            }
            else
                echo "incorrect username or password";
        }
            else
                {
            echo "please enter username and password";
        }

    }
}


?>