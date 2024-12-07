<?php
class estudianteModel {
    private $PDO;

    public function __construct() {
        include_once ($_SERVER['DOCUMENT_ROOT'].'/semana5/tallermvcphp/routes.php');
        require_once(DAO_PATH.'database.php');
        $data = new dataConex();
        $this->PDO = $data->conexion();
    }

    // Insertar un registro en la tabla 'personas'
    public function insertar($Nombre, $Telefono, $Direccion) {
        $sql = 'INSERT INTO personas (Idpersonas, Nombre, Telefono, Direccion) 
                VALUES (0, :Nombre, :Telefono, :Direccion)';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':Nombre', $Nombre);  
        $statement->bindParam(':Telefono', $Telefono);
        $statement->bindParam(':Direccion', $Direccion);
        $statement->execute();
        return $this->PDO->lastInsertId();
    }

    
    public function actualizar($Idpersonas, $Nombre, $Telefono, $Direccion) {
        $sql = 'UPDATE personas 
                SET Nombre = :Nombre, Telefono = :Telefono, Direccion = :Direccion 
                WHERE Idpersonas = :Idpersonas';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':Nombre', $Nombre);
        $statement->bindParam(':Telefono', $Telefono);
        $statement->bindParam(':Direccion', $Direccion);
        $statement->bindParam(':Idpersonas', $Idpersonas);
        return $statement->execute();
    }

    public function eliminar($Idpersonas) {
        $sql = 'DELETE FROM personas WHERE Idpersonas = :Idpersonas';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':Idpersonas', $Idpersonas);
        return $statement->execute();
    }


    public function listar() {
        $sql = 'SELECT Idpersonas, Nombre, Telefono, Direccion 
                FROM personas 
                ORDER BY Idpersonas DESC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

  
    public function cargarDesplegable() {
        $sql = 'SELECT IdServicio, Descripcion 
                FROM servicios 
                ORDER BY Descripcion ASC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function buscar($Idpersonas) {
        $sql = 'SELECT Idpersonas, Nombre, Telefono, Direccion 
                FROM personas 
                WHERE Idpersonas = :Idpersonas';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':Idpersonas', $Idpersonas);
        return ($statement->execute()) ? $statement->fetch() : false;
    }
}
?>
