<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/semana5/tallermvcphp/routes.php');

    require_once(CONTROLLER_PATH.'matriculaController.php');
    $object = new matriculaController();

    $fechaIngreso = $_REQUEST['fechaingreso'];
    $placa = $_REQUEST['Placa'];
    $marca = $_REQUEST['Marca'];
    $modelo = $_REQUEST['Modelo'];
    $anho = $_REQUEST['Anho'];
    $idCliente = $_REQUEST ['IdCliente'];
    $idServicio =  $_REQUEST ['IdServicio'];

    $registro = $object->insertar($fechaIngreso, $idCliente, $idServicio, $placa, $marca, $modelo, $anho);   
?>
<script>
    window.location = './index.php';
</script>

