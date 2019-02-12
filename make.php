<?php
session_start();
include "config.php";

//include classes
include "classes/clsMobile.php";
include "classes/jdatetime.class.php";
include "classes/clsFileUpload.php";
include "classes/clsAdmin.php";
include "classes/clsBasket.php";
include "classes/clsFactor.php";
include "classes/clsBrand.php";
include "classes/clsBasketDB.php";
//include functions
include "functions/html_generator.php";


//make OBJCTS

$date=new jDateTime(true,true,"Asia/Tehran");
$CURRENT_DATE=$date->date("l j F Y");


//$CURRENT_DATE=$date->date("Y",$CURRENT_DATE,true,true);




