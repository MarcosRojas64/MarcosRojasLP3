<?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/semana5/tallermvcphp/routes.php');
   
   require_once(CONTROLLER_PATH.'estudianteController.php');
   $object = new estudianteController ();

   $idEstudiante = $_REQUEST['id'];
   $nombre = $_REQUEST['Nombre'];
   $apellido = $_REQUEST['Telefono'];
   $idCiudad = $_REQUEST['Direccion'];

   
   $object->update($idEstudiante, $nombre, $apellido, $idCiudad);
?>
<script>
   history.replaceState(null, null, location.pathname);
</script>
