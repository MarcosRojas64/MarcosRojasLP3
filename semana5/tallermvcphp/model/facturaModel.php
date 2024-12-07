<?php
   class facturaModel {
       private $PDO;
       
       public function __construct(){
           include_once ($_SERVER['DOCUMENT_ROOT'].'/semana5/tallermvcphp/routes.php');
           require_once(DAO_PATH.'database.php');
           $data = new dataConex();
           $this->PDO = $data->conexion();
       }
       public function listar() {
        $sql = 'SELECT f.IdFactura AS numero, 
                       DATE_FORMAT(f.Fecha, "%d/%m/%Y") AS fecha, 
                       p.Nombre AS cliente, 
                       p.Telefono AS cin, 
                       f.MontoTotal AS total 
                FROM facturacion f
                JOIN personas p ON f.IdCliente = p.Idpersonas
                WHERE 1
                ORDER BY f.IdFactura DESC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function listarCursos() {
        $sql = 'SELECT IdServicio AS idCurso, Descripcion AS nombre, Precio AS importe 
                FROM servicios 
                ORDER BY IdServicio';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function buscar($factura) {
        $sql = 'SELECT * 
                FROM facturacion 
                WHERE IdFactura = :numero';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':numero', $factura);
        return ($statement->execute()) ? $statement->fetch() : false;
    }

    public function insertar($fecha, $idEstudiante, $idFormaPago, $idUsuario) {
        $sql = 'INSERT INTO facturacion (Fecha, MontoTotal, IdCliente, IdServicio) 
                VALUES (:fecha, 0, :idEstudiante, :idFormaPago)';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':fecha', $fecha);
        $statement->bindParam(':idEstudiante', $idEstudiante);
        $statement->bindParam(':idFormaPago', $idFormaPago);
        $statement->execute();
        return $this->PDO->lastInsertId();
    }

    public function insertarDetalle($numero, $idCurso, $cantidad, $importe) {
        
    }

    public function actualizar($numero) {
        $sql = 'DELETE FROM facturacion WHERE IdFactura = :numero';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':numero', $numero);
        return ($statement->execute()) ? true : false;
    }

    public function cargarEstudiantes() {
        $sql = 'SELECT Idpersonas AS idEstudiante, Nombre AS estudiante, Telefono AS cin 
                FROM personas 
                ORDER BY Nombre';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function cargarEstudiantesID($idEstudiante) {
        $sql = 'SELECT p.Idpersonas AS idEstudiante, 
                       p.Nombre AS razonsocial, 
                       p.Telefono AS cin, 
                       "" AS ciudad 
                FROM personas p 
                WHERE p.Idpersonas = :idEstudiante';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':idEstudiante', $idEstudiante);
        return ($statement->execute()) ? $statement->fetch() : false;
    }

    public function cargarFormPagos() {
        $sql = 'SELECT  idFormaPago, descripcion 
                FROM formapagos 
              ';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }
}
?>