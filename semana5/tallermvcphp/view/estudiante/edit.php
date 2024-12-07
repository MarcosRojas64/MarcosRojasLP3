<?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/semana5/tallermvcphp/routes.php');
   require_once(CONTROLLER_PATH.'estudianteController.php');
   $object = new estudianteController();
   $idEstudiante = $_GET['id'];
   $estudiante = $object->search($idEstudiante);
   $ciudades = $object->combolist();
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Form PHP</title>
   <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>
<body>
   <?php
      require_once(VIEW_PATH.'/navbar/navbar.php');
   ?>
   <div class="container">
      <div class="mb-3">
         <h2>Editando registro</h2>
      </div>
      <form id="formPersona" action="update.php" method="post" class="g-3 needs-validation" novalidate>
         <div class="mb-3">
            <label for="id" class="form-label">ID Cliente </label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input value="<?=$estudiante[0]?>" type="text" class="form-control" id="id" name="id" readonly>
         </div>
         <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre Apellido</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input value="<?=$estudiante[1]?>" type="text" class="form-control" id="Nombre" name="Nombre" autofocus required>
            <div class="invalid-feedback">ingrese un Nombre y Apellido válido!</div>
         </div>
         <div class="mb-3">
            <label for="Telefono" class="form-label">Telefono</label>
            <input value="<?=$estudiante[2]?>" type="number" class="form-control" id="Telefono" name="Telefono" required>
            <div class="invalid-feedback">ingrese un Telefono válida!</div>          
         </div>           
         <div class="mb-3">
            <label for="Direccion" class="form-label">Ingrese su Ciudad</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input value="<?=$estudiante[3]?>" type="text" class="form-control" id="Direccion" name="Direccion" autofocus required>
            <div class="invalid-feedback">ingrese un Ciudad válido!</div>
         </div>
         
         <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
   </div>
</body>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/validate.js"></script>
</html>
