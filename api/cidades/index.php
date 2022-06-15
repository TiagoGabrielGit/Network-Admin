<?php
require $_SERVER['DOCUMENT_ROOT']."/conexoes/conexao.php";


$type = isset($_GET['type']) ? $_GET['type'] : '' ;
$id   = isset($_GET['id']) ? $_GET['id'] : '';

if($type != '' && $id != ''){
    
    if($type == 'estado'){
        // e pais 

        $sql = "SELECT estado, id FROM estado WHERE pais = $id ";
        $resultado = mysqli_query($mysqli, $sql);
        $resp = array();
        while ($c = $resultado->fetch_assoc()) :
            array_push($resp,[ 'id'=> $c['id'] , 'estado'=>$c['estado'] ]);
        endwhile; 

         echo json_encode($resp);

    }else{
        
        
        // e estado
    }






}else{
    echo "erro";
}









?>