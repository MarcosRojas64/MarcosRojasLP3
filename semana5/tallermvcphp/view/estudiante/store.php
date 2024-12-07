<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/semana5/tallermvcphp/routes.php');
require_once(CONTROLLER_PATH.'estudianteController.php');

$object = new estudianteController();

$Nombre = $_REQUEST['Nombre'];
$Telefono = $_REQUEST['Telefono'];
$Direccion = $_REQUEST['Direccion'];


$registro = $object->insert($Nombre, $Telefono, $Direccion);
?>
<script>
   history.replaceState(null, null, location.pathname);
</script>
