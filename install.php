<?php 

if(isset($_REQUEST['step'])){

    $step = $_REQUEST['step'];
}else{

    $step = 0;
}

if(isset($_POST['dbconfig'])){
    //echo "<script> alert('ok');</script>";
    if(!empty($_POST['hostname']) &&  !empty($_POST['username']) && !empty($_POST['database'] )){

    //var_dump($_POST);
    $config = "<?php
    define('HOSTNAME', '{$_POST['hostname']}');
    define('USERNAME', '{$_POST['username']}');
    define('PASSWORD', '{$_POST['password']}');
    define('DATABASE', '{$_POST['database']}');

    ?>";

    $file = fopen('apps/config/config.php',"w");

    fwrite($file, $config);
    // closes the file
    fclose($file);
    if(file_exists('apps/config/config.php')){
    header("location: ./index.php");
    exit;
    }

    }else{

        echo "<script> alert('fill the all feild');</script>";
    }

}

if(isset($_POST['dbupload'])){
include('apps/config/config.php');

try {
    $db  = new PDO("mysql:host=localhost;dbname=test", "root", "mysql");
    $query = file_get_contents('./database.sql');
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->closeCursor();// Safely consuming the SQL operation till end
    $count = $stmt->rowCount(); // Check if not pending transaction
    if ($count) {
        foreach($db->query('SELECT * from users') as $row) {
            print_r($row);
        }
    }

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    exit;
}


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Configure  Database </title>
    <style>
      form{
        margin-top:150px;
      }

      form input {
        margin:2px;
      }

    </style>
</head>
<body>

   <center>

   <?php if($step == 0): ?>
    <form action="" method="post" >

    <h3>Configure Database</h3>
    <input type="text" name="hostname" id="" placeholder="Enter Hostname" required><br>
    <input type="text" name="username" id="" placeholder="Enter Username" required><br>
    <input type="text" name="password" id="" placeholder="Enter Password"><br>
    <input type="text" name="database" id="" placeholder="Enter Database" required><br>
    <input type="submit" name="dbconfig" value="Submit">  

    </form>
   <?php endif; ?>

   <?php if($step == 1): ?>
    <form action="" method="post" >

    <h3> Database Update</h3>   
    <input type="submit" name="dbupload" value="upload Database">  
    </form>
   <?php endif; ?>

   </center>
    
</body>
</html>