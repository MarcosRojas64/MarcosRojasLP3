<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/semana5/tallermvcphp/routes.php');
    
    require_once(CONTROLLER_PATH.'matriculaController.php');
    $object = new matriculaController();

    $idMatricula = $_REQUEST['IdVehiculo'];
    $fecha = $_REQUEST['fechaingreso'];
    $idplaca = $_REQUEST['Placa'];
    $idMarca = $_REQUEST['Marca'];
    $idModelo = $_REQUEST['Modelo'];
    $idAnho = $_REQUEST['Anho'];
    $IdCliente = $_REQUEST['IdCliente'];
    $IdServicio = $_REQUEST['IdServicio'];

    $object->actualizar($idMatricula, $fecha, $idplaca, $idMarca, $idModelo,$idAnho, $IdCliente, $IdServicio);
?>  
<script>
   window.location = './index.php';
</script>
