<?php

class View extends User_model{

  public function showUsers(){

    $data = $this->getAllUsers();
    foreach($data as $row){
               
        echo $row['fname']."<br>";
        echo $row['lname']."<br>";
        
    }

  }

}


?>