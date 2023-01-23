<?php
$data = ['Fusing current'];
$data1= ['Fusing current'];
$ff = count(array($data));
$datao = array();
for ($i=0; $i > $ff ; $i++) { 
    $datao[] = array(
        $data3 => $data1,
    );
}

$datao[]= $data;

echo json_encode(array('isSuccess' => true , "Tags" => $data));

?>