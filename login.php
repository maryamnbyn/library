<?php
//session_start();

function filterInput($input)
{
    $test=str_replace("'","",$input);
    return $test;
}

include "make.php";
$msg_Login_Error="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $msg_Login_Error="";
    $userLogin=$_POST["userLogin"];
    $userPass=$_POST["userPass"];


    if($userLogin!=filterInput($userLogin))
    {
        die("Khodety");
    }
    if($userPass!=filterInput($userPass))
    {
        die("Khodety");
    }
    // x' or '1'='1
    //it's a book
    $q="select * from tbl_admin 
WHERE UserLogin='$userLogin' AND UserPass='$userPass'";
    $result=$MyDB->query($q);

    if($result->num_rows>0)
    {

        $_SESSION["admin"]=1;
    }
    else
    {
        $msg_Login_Error= "Faild ";
    }


}


?>


<html>
<head>
    <meta charset="utf-8">
</head>

<?php if(@$_SESSION["admin"]!=1){ ?>
<form method="post" action='<?php echo $_SERVER["PHP_SELF"] ?>' >


    <table>
        <tr>
            <td>نام کاربری : </td>
            <td><input type="text" name="userLogin"></td>
        </tr>
        <tr>
            <td>کلمه عبور  : </td>
            <td><input type="password" name="userPass"></td>
        </tr>


    </table>
    <input type="submit" value="ورود">
    <p style="color: red"><?php echo $msg_Login_Error ?></p>
</form>


<?php }
else
{
    echo "WELCOME ";
}
    ?>
</html>
