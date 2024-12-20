<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/semana5/tallermvcphp/routes.php');
require_once(CONTROLLER_PATH.'estudianteController.php');
$object = new estudianteController();
$rows = $object->select();
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php include_once (ROOT_PATH . 'header.php'); ?>
   <title>Estudiantes</title>
</head>
<body>
   <?php require_once(VIEW_PATH.'navbar/navbar.php'); ?>
   <section class="intro">
      <div class="container">
         <div class="mb-3">
            <a href="create.php" class="btn btn-primary">Agregar</a>
            <a href="pdf/estudiantes.php" target="_blank" class="btn btn-info"></a>
         </div>
         <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height:700px;">
            <table id="myTabla" class="table table-striped mb-0">
               <thead style="background-color: #002d72;">
                  <tr>
                     <th scope="col">ID</th>
                     <th scope="col">Nombre Apellido</th>
                     <th scope="col">Telefono</th>
                     <th scope="col">Direccion</th>
                  
                     <th scope="col">OPERACIONES</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ((array) $rows as $row) { ?>
                  <tr>
                     <td><?=$row['Idpersonas']?></td>
                     <td><?=$row['Nombre']?></td>
                     <td><?=$row['Telefono']?></td>
                     <td><?=$row['Direccion']?></td>
                     <td>
                        <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#idver<?=$row['Idpersonas']?>">Ver</a>
                        <a href="edit.php?id=<?=$row['Idpersonas']?>" class="btn btn-warning">Editar</a>
                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#iddel<?=$row['Idpersonas']?>">Eliminar</a>
                     </td>
                  </tr>
                  <!-- modal para ver y eliminar -->
                  <?php 
                     include ('viewModal.php');
                     include ('deleteModal.php');
                  ?>
                  <?php } ?>
               </tbody>
            </table>
         </div>  
      </div>  
   </section>
   
   <!-- div area de impresión -->
   <div class="container" id="ventana" style="display:none;">
      <div class="mb-3">
         <h2 style="font-size: 3.00rem;">Listado de Estudiantes</h2>
      </div>
      <div class="table-responsive table-scroll" 
      data-mdb-perfect-scrollbar="true" style="position: relative; height:700px;">
         <table class="table table-striped mb-0" style="font-size: 2.00rem;">
            <thead>
               <tr>
                  <th colspan="1" scope="col">ID</th>
                  <th colspan="3" scope="col">Nombre Apellido</th>
                  <th colspan="3" scope="col">Telefono</th>
                  <th colspan="3" scope="col">Direccion</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($rows as $row) { ?>
               <tr>
                  <td colspan="1"><?=$row['Idpersonas']?></td>
                  <td colspan="3"><?=$row['Nombre']?></td>
                  <td colspan="3"><?=$row['Telefono']?></td>
                  <td colspan="3"><?=$row['Direccion']?></td>     
               </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>  
   </div>   
   <!-- fin área de impresión -->
</body>
<?php include_once (ROOT_PATH . 'footer.php'); ?>
<script>
   $(document).ready( function () {
      var table = new DataTable('#myTabla', {
         language: {
            url: '../../assets/js/es-ES.json',
         },
         'paging': true,
         lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, 'Todos']
         ] 
      });
   });
</script>
</html>
