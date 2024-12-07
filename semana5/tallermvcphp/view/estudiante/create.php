<?php
   session_start();
   if (!isset($_SESSION["usuario"])) {
      header('location: ../usuario/login.php');
   }

   include_once ($_SERVER['DOCUMENT_ROOT'].'/semana5/tallermvcphp/routes.php');
   require_once(CONTROLLER_PATH.'estudianteController.php');
   $object = new estudianteController();
   $ciudades = $object->combolist();
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
   <title>Agregar Estudiante</title>
</head>
<body>
   <?php
      require_once(VIEW_PATH.'navbar/navbar.php');
   ?>
   <div class="container">
      <div class="mb-3">
         <h2>Agregando nuevo Cliente</h2>
      </div>
      <form id="formPersona" action="store.php" method="post" class="g-3 needs-validation" nova lidate>
         <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre y Apellido</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" autofocus required>
            <div class="invalid-feedback">Por favor, ingrese un nombre y apellido válidos.</div>
         </div>
         
         <div class="mb-3">
            <label for="Telefono" class="form-label">Teléfono</label>
            <input type="number" class="form-control" id="Telefono" name="Telefono" required>
            <div class="invalid-feedback">Por favor, ingrese un número de teléfono válido.</div>
         </div>

         <form id="formPersona" action="store.php" method="post" class="g-3 needs-validation" nova lidate>
         <div class="mb-3">
            <label for="Direccion" class="form-label">Ingrese su Ciudad</label>
            <input type="text" class="form-control" id="Direccion" name="Direccion" autofocus required>
            <div class="invalid-feedback">Por favor, ingrese un nombre y apellido válidos.</div>
         </div>
         

         <button type="submit" class="btn btn-primary btn-lg col-4">Guardar</button>
      </form>
   </div>
</body>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/validate.js"></script>
</html>
