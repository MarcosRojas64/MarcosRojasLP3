<?php
class matriculaController {
    private $PDO;
    
    public function __construct() {
        include_once ($_SERVER['DOCUMENT_ROOT'].'/semana5/tallermvcphp/routes.php');
        require_once(DAO_PATH.'database.php');
        $data = new dataConex();
        $this->PDO = $data->conexion();
    }

    public function listar() {
        $sql = 'SELECT v.IdVehiculo, v.fechaingreso, v.Placa, v.Marca, v.Modelo, v.Anho, 
                       p.Nombre AS Cliente, s.Descripcion AS Servicio
                FROM vehiculos v
                LEFT JOIN personas p ON v.IdCliente = p.Idpersonas
                JOIN servicios s ON v.IdServicio = s.IdServicio
                ORDER BY v.IdVehiculo ASC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function insertar($fechaIngreso, $idCliente, $idServicio, $placa, $marca, $modelo, $anho) {
        $sql = 'INSERT INTO vehiculos (IdVehiculo,fechaingreso, Placa, Marca, Modelo, Anho, IdCliente, IdServicio) 
                VALUES (0, :fechaingreso, :placa, :marca, :modelo, :anho, :idCliente, :idServicio)';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':fechaingreso', $fechaIngreso);
        $statement->bindParam(':placa', $placa);
        $statement->bindParam(':marca', $marca);
        $statement->bindParam(':modelo', $modelo);
        $statement->bindParam(':anho', $anho);
        $statement->bindParam(':idCliente', $idCliente);
        $statement->bindParam(':idServicio', $idServicio);
        $statement->execute();
        return ($this->PDO->lastInsertId());
    }

    public function actualizar($idVehiculo, $fechaingreso, $placa, $marca, $modelo, $anho, $idCliente, $idServicio) {
        $sql = 'UPDATE vehiculos 
                SET fechaingreso = :fechaingreso, Placa = :placa, Marca = :marca, Modelo = :modelo, 
                    Anho = :anho, IdCliente = :idCliente, IdServicio = :idServicio 
                WHERE IdVehiculo = :idVehiculo';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':fechaingreso', $fechaingreso);
        $statement->bindParam(':placa', $placa);
        $statement->bindParam(':marca', $marca);
        $statement->bindParam(':modelo', $modelo);
        $statement->bindParam(':anho', $anho);
        $statement->bindParam(':idCliente', $idCliente);
        $statement->bindParam(':idServicio', $idServicio);
        $statement->bindParam(':idVehiculo', $idVehiculo);
        return ($statement->execute()) ? true : false;
    }

    public function eliminar($idVehiculo) {
        $sql = 'DELETE FROM vehiculos WHERE IdVehiculo = :idVehiculo';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':idVehiculo', $idVehiculo);
        return ($statement->execute()) ? true : false;
    }

    public function cargarDesplegableClientes() {
        $sql = 'SELECT Idpersonas, Nombre FROM personas ORDER BY Idpersonas ASC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function cargarDesplegableUsuarios($alias) {
        $sql = 'SELECT idUsuario, alias FROM usuarios WHERE alias=:alias';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':alias', $alias);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function cargarDesplegableServicios() {
        $sql = 'SELECT IdServicio, Descripcion FROM servicios ORDER BY IdServicio ASC';
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
