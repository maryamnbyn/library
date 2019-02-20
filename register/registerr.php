<?php include 'db.php';

if(isset($_POST['submit'])){


    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($login->register($name,$email,$password)){
        header('Location:register.php');
    }
}


?>
<html>
<head>
    <title>register</title>
</head>
<body>
<h1>
    register new usert
</h1>
<form action="" method="post">
    <table><tr>
            <td>name</td>
            <td><input type="text" name="name"></td></tr><tr>
            <td>email</td><td><input type="email" name="email"></td></tr><tr>
            <td>password</td><td><input type="password" name="password"></td>
            <td></td><td><input type="submit" name="submit" value="register"></td>


        </tr>
    </table>
</form>
</body>
</html>