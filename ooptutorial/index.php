<?php



if(!file_exists('apps/config/config.php')){

    header("Location: ./install.php");
    exit;
}

include('apps/config/config.php');
include('apps/config/db.php');
include('apps/model/User_model.php');
include('apps/view/View.php');

$view = new View();
// echo $view->showUsers();

// $myfile = fopen("super.php", "r") or die("Unable to open file!");
//$ggh =  fread($myfile,filesize("super.php"));

//echo "{$ggh}";

// fclose($myfile);



?>