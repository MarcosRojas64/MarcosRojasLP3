<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/semana5/tallermvcphp/routes.php');
    require_once(CONTROLLER_PATH.'matriculaController.php');
    $object = new matriculaController();
    $rows = $object->listar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once (ROOT_PATH . 'header.php') ?>
    <title>Matriculas</title>
</head>
<body>
    <?php
        require_once(VIEW_PATH.'navbar/navbar.php');
    ?>
    <section class="intro">
        <div class="container">
            <div class="mb-3"></div>
            <div class="mb-3">
                <a href="create.php" class="btn btn-primary">Agregar</a>
                <a href="javascript:imprimirWindow('ventana')" class="btn btn-info"></a>
            </div>
            <div class="table-responsive table-scroll" 
            data-mdb-perfect-scrollbar="true" style="position: relative; height:700px;">
                <table id="myTabla" class="table table-striped mb-0">
                    <thead style="background-color: #002d72;">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Fecha de Ingreso</th>
                            <th scope="col">Placa</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Anho</th>
                            <th scope="col">OPERACIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ((array) $rows as $row) { ?>
                        <tr>
                            <td><?=$row['IdVehiculo']?></td>
                            <td><?=$row['fechaingreso']?></td>
                            <td><?=$row['Placa']?></td>
                            <td><?=$row['Marca']?></td>
                            <td><?=$row['Modelo']?></td>
                            <td><?=$row['Anho']?></td>
                            
                            
                            
                            <td>
                                <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#idver<?=$row['IdVehiculo']?>">Ver</a>
                                <a href="edit.php?id=<?=$row['IdVehiculo']?>" class="btn btn-warning">Editar</a>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#iddel<?=$row['IdVehiculo']?>">Eliminar</a>

                                <!-- modal para ver y del -->
                                <?php 
                                    include ('viewModal.php');
                                    include ('deleteModal.php');
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>  
        </div>  
    </section>
    <!-- div area de impresion -->
    <div class="container" id="ventana" style="display:none;">
        <div class="mb-3">
            <h2 style="font-size: 3.00rem;">Listado de matriculas</h2>
        </div>
        <div class="table-responsive table-scroll" 
        data-mdb-perfect-scrollbar="true" style="position: relative; height:700px;">
        <table class="table table-striped mb-0" style="font-size: 1.50rem;">
            <thead>
                <tr>
                    <th colspan="1" scope="col">MATRICULA</th>
                    <th colspan="1" scope="col">FECHA</th>                           
                    <th colspan="3" scope="col">placa</th>
                    <th colspan="3" scope="col">Marca</th>
                    <th colspan="4" scope="col">Modelo</th>                           
                    <th colspan="4" scope="col">Anho</th>
                  
                </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td colspan="1"><?=$row['IdVehiculo']?></td>
                    <td colspan="1"><?=$row['fechaingreso']?></td>                          
                    <td colspan="3"><?=$row['Placa']?></td>
                    <td colspan="3"><?=$row['Marca']?></td>
                    <td colspan="4"><?=$row['Modelo']?></td>
                    <td colspan="4"><?=$row['Anho']?></td>
                    
                    
                
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>  
    </div>   
    <!-- fin area de impresion -->
</body>
<?php include_once (ROOT_PATH . 'footer.php')  ?>
<script>
    $(document).ready( function () {
        //$('#myTabla').DataTable();
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
    } );    
</script>
</html>
