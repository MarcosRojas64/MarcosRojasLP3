<?php
class matriculaModel {
    private $PDO;

    public function __construct(){
        include_once ($_SERVER['DOCUMENT_ROOT'].'/semana5/tallermvcphp/routes.php');
        require_once(DAO_PATH.'database.php');
        $data = new dataConex();
        $this->PDO = $data->conexion();
    }

    public function listar() {
        $sql = 'SELECT v.IdVehiculo, v.Placa, v.Marca, v.Modelo, v.Anho, p.Nombre AS Cliente, s.Descripcion AS Servicio
                FROM vehiculos v
                JOIN personas p ON v.IdCliente = p.Idpersonas
                JOIN servicios s ON v.IdServicio = s.IdServicio
                ORDER BY v.IdVehiculo DESC;';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    
    public function insertar($fechaIngreso, $idCliente, $idServicio, $placa, $marca, $modelo, $anho) {
        $sql = 'INSERT INTO vehiculos (IdVehiculo, fechaingreso, IdCliente, IdServicio, Placa, Marca, Modelo, Anho) 
                VALUES (0, :fechaIngreso, :idCliente, :idServicio, :placa, :marca, :modelo, :anho)';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':fechaIngreso', $fechaIngreso);
        $statement->bindParam(':idCliente', $idCliente);
        $statement->bindParam(':idServicio', $idServicio);
        $statement->bindParam(':placa', $placa);
        $statement->bindParam(':marca', $marca);
        $statement->bindParam(':modelo', $modelo);
        $statement->bindParam(':anho', $anho);
        $statement->execute();
        return ($this->PDO->lastInsertId());
    }

  
    public function actualizar($idVehiculo, $fechaIngreso, $idCliente, $idServicio, $placa, $marca, $modelo, $anho) {
        $sql = 'UPDATE vehiculos SET 
                fechaingreso = :fechaIngreso, IdCliente = :idCliente, IdServicio = :idServicio, 
                Placa = :placa, Marca = :marca, Modelo = :modelo, Anho = :anho 
                WHERE IdVehiculo = :idVehiculo';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':fechaIngreso', $fechaIngreso);
        $statement->bindParam(':idCliente', $idCliente);
        $statement->bindParam(':idServicio', $idServicio);
        $statement->bindParam(':placa', $placa);
        $statement->bindParam(':marca', $marca);
        $statement->bindParam(':modelo', $modelo);
        $statement->bindParam(':anho', $anho);
        $statement->bindParam(':idVehiculo', $idVehiculo);
        return ($statement->execute()) ? true : false;
    }

   
    public function eliminar($idVehiculo) {
        $sql = 'DELETE FROM vehiculos WHERE IdVehiculo = :idVehiculo';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':idVehiculo', $idVehiculo);
        return ($statement->execute()) ? true : false;
    }

   
    public function cargarDesplegableServicios() {
        $sql = 'SELECT IdServicio, Descripcion FROM servicios ORDER BY IdServicio ASC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function cargarDesplegableClientes() {
        $sql = 'SELECT Idpersonas, CONCAT(Nombre, " ", Telefono) AS Cliente FROM personas ORDER BY Idpersonas ASC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function cargarDesplegableUsuarios() {
        $sql = 'SELECT idUsuario, alias FROM usuarios ORDER BY idUsuario ASC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function buscar($idVehiculo) {
        $sql = 'SELECT * FROM vehiculos WHERE IdVehiculo = :idVehiculo';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':idVehiculo', $idVehiculo);
        return ($statement->execute()) ? $statement->fetch() : false;
    }
}
?>
