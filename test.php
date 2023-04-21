<?php 
include('functionDB.php');



$datas = $crud->users();
foreach($datas as $data){
    echo $data['username'];
    }

?>