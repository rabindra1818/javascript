<?php

class User_model extends Dbh {

   protected function getAllUsers(){

        $sql = "SELECT * FROM users";
        $result = $this->db()->query($sql);      

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }

   } 

}