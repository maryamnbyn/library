<?php
session_start();
$_SESSION["test"]="Name";
echo $_SESSION["test"];