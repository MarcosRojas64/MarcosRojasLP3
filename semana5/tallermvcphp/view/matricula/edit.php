<?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/semana5/tallermvcphp/routes.php');
   session_start();

   if (!isset($_SESSION["usuario"])) {
       header('location: ../usuario/login.php');
   }

   $Usuario = $_SESSION["usuario"];
   require_once(CONTROLLER_PATH.'matriculaController.php');
   $object = new matriculaController();
   $idMatricula = $_GET['id'];
   $matricula = $object->buscar($idMatricula);
   $estudiantes = $object->cargarDesplegableClientes(); 
   $usuarios = $object->cargarDesplegableUsuarios($Usuario); 
   $cursos = $object->cargarDesplegableServicios(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
   <title>Matriculas</title>
</head>
<body>
   <?php
       require_once(VIEW_PATH.'navbar/navbar.php');
   ?>
   <div class="container">
      <div class="mb-3">
         <h2>Editando registro</h2>
      </div>
      <form id="formPersona" action="update.php" method="post" class="g-3 needs-validation" novalidate>
         <div class="mb-3">
            <label for="IdVehiculo" class="form-label">ID Matricula</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input value="<?=$matricula['IdVehiculo']?>" type="text" class="form-control" id="IdVehiculo" name="IdVehiculo" readonly>
         </div>
         <div class="mb-3">
            <label for="fechaingreso" class="form-label">Fecha</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input value="<?=$matricula['fechaingreso']?>" type="date" class="form-control" id="fechaingreso" name="fechaingreso" autofocus required>
            <div class="invalid-feedback">ingrese o seleccione fecha válida!</div>
         </div>
         <div class="mb-3">
    <label for="Placa" class="form-label">Placa</label>
    <input type="text" class="form-control" name="Placa" id="Placa" value="<?= isset($matricula['Placa']) ? $matricula['Placa'] : '' ?>" required>
    <div class="invalid-feedback">Por favor, ingrese un estudiante válido.</div>
</div>

<div class="mb-3">
    <label for="Marca" class="form-label">Marca</label>
    <input type="text" class="form-control" name="Marca" id="Marca" value="<?= isset($matricula['Marca']) ? $matricula['Marca'] : '' ?>" required>
    <div class="invalid-feedback">Por favor, ingrese un estudiante válido.</div>
</div>
      
<div class="mb-3">
    <label for="Modelo" class="form-label">Modelo</label>
    <input type="text" class="form-control" name="Modelo" id="Modelo" value="<?= isset($matricula['Modelo']) ? $matricula['Modelo'] : '' ?>" required>
    <div class="invalid-feedback">Por favor, ingrese un estudiante válido.</div>
</div>

<div class="mb-3">
    <label for="Anho" class="form-label">Modelo</label>
    <input type="text" class="form-control" name="Anho" id="Anho" value="<?= isset($matricula['Anho']) ? $matricula['Anho'] : '' ?>" required>
    <div class="invalid-feedback">Por favor, ingrese un estudiante válido.</div>
</div>
<div class="mb-3">
               <label for="IdCliente" class="form-label">Cliente</label>
               <select class="form-control" name="IdCliente" id="IdCliente" required>
                   <option selected disabled value="">No especificado</option>
                   <?php foreach ($estudiantes as $estudiante) { ?>
                      <option value="<?=$estudiante['Idpersonas']?>"><?=$estudiante['Nombre']?></option>
                   <?php } ?>
               </select>
               <div class="invalid-feedback">seleccione un elemento válido!</div>
           </div>
           <div class="mb-3">
               <label for="IdServicio" class="form-label">Servicio Disponible</label>
               <select class="form-control" name="IdServicio" id="IdServicio">
                   <?php foreach ($cursos as $cursos) { ?>
                      <option selected value="<?=$cursos['IdServicio']?>"><?=$cursos['Descripcion']?></option>
                   <?php } ?>
               </select>
               <div class="invalid-feedback">seleccione un elemento válido!</div>
           </div>
         </div>



</div>
  
         <button type="submit" class="btn btn-primary btn-lg col-4">Guardar</button>
      </form>
   </div>
</body>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/validate.js"></script>

</html>
