<?php
    $data = array();
include('1conect.php');
$sql = "SELECT * FROM productos ORDER BY producto_id ASC"; 

    if (isset($_GET['id'])) {
        $id = $_GET["id"];
        $sql = "SELECT * FROM productos WHERE producto_id =".  $id;
    }

$resultado = $conn->query($sql);	
    if($resultado->num_rows > 0){
        $data['status'] = 'ok';
		$i=0;
		while ($resultData = $resultado->fetch_assoc()) {
			$data['result'][$i] = $resultData;
			$i++;
		}
    }else{
        $data['status'] = 'err';
        $data['result'] = null;
    }
    echo("<a href='index.html'><h1>El producto fue eliminado</h1></a>")
?>

