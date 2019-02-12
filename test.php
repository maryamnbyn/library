<?php
include "make.php";

if($_SERVER["REQUEST_METHOD"]=="POST") {

    echo $_FILES["MyFile"]["tmp_name"];
    /*
    $array_file_types = ["jpg"];
    $objFileUpload = new FileUpload("test/",
        $array_file_types, false,"");

    $objFileUpload->upload_file($_FILES["MyFile"]);



    if(!$objFileUpload->isHaveError())
    {
        echo "file uploade in ".$objFileUpload->getPath().$objFileUpload->getExistFileName();
    }
    else
    {
        echo $objFileUpload->getErrorMsg();
    }
    */

}




?>

<form method="post" action="" enctype="multipart/form-data">

    <input type="file" name="MyFile">
    <input type="submit" value="ok">


</form>







