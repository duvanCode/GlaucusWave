<?php

namespace Models;

use PDO;
use PDOException;

abstract class Model {
    
    public function conectarBD() {

        $host = 'localhost';
        $dbname = 'actividad_4';
        $usuario = 'postgres';
        $contrasena = 'prueba';
    
        try {

            $conexion = new PDO("pgsql:host=$host;dbname=$dbname", $usuario, $contrasena);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conexion;
        } catch (PDOException $e) {

            echo "Error de conexión: " . $e->getMessage();
            return null;

        }
    }
    
    public function consultar($sql,$parametros = array()) {
        
        try {

            $conexion = $this->conectarBD();

            $consulta = $conexion->prepare($sql);

            foreach ($parametros as $clave => &$valor) {

                $consulta->bindParam(':'.$clave, $valor);

            }

            $consulta->execute();

            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC); 

            $conexion = null;

            return $datos;

        } catch (PDOException $e) {
            echo "Error al ejecutar consulta: " . $e->getMessage();
            return null;
        }
    }

    public function intertar($sql, $parametros = array()) {

        try {

            $conexion = $this->conectarBD();
            $consulta = $conexion->prepare($sql);
    
            foreach ($parametros as $clave => &$valor) {
                $consulta->bindParam($clave, $valor);
            }
    
            if ($consulta->execute()) {
                $id_insertado = $conexion->lastInsertId();
                $conexion = null;
                return $id_insertado;
            } else {
                return null;
            }
        } catch (PDOException $e) {

            echo "Error al ejecutar consulta: " . $e->getMessage();
            
            return null;
        }
    }

}