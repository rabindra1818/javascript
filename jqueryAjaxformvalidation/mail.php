<?php   
    
    if(isset($_POST)){
        $leads = json_decode(file_get_contents('data.json'),TRUE);
        $sl = (count($leads['leads'])) + 1;  
        $leads['leads'][$sl] = array("data" => $_POST );        
        file_put_contents('data.json', json_encode($leads, TRUE));
        //var_dump($leads);
        echo json_encode(array('status' => true , 'data' => $_POST));      
    }else{
          echo json_encode(array('status' => false));
    }
    
?>