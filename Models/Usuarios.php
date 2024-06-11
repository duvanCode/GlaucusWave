<?php

namespace Models;

use Models\Model;

class Usuarios extends Model {

    public $keys = ['nombre', 'correo_electronico', 'contrasena', 'rol'];


    function usersGet($data = [])
    {

        $order = '';
        if($data)
        {
            $order = "ORDER BY {$data['campo']}  {$data['order']}";
        }

        $sql = <<<SQL
        SELECT * from usuarios
        $order
SQL;
        return $this->consultar($sql);

    }


    
    function usersCreate(Array $datos)
    {
        
        if(!$this->validarDatos($datos))return false;

        $sql = <<<SQL
        INSERT INTO usuarios (nombre_usuario,correo_electronico,contrasena,rol) VALUES (:nombre,:correo_electronico,:contrasena,:rol);
SQL;

        return $this->intertar($sql,$datos);

    }

    function usersDeleteByID(int $userID)
    {

        $sql = <<<SQL
        DELETE FROM usuarios where id_usuario = :id_usuario
SQL;

        return $this->consultar($sql,['id_usuario'=>$userID]);

    }

    function usersUpdateByID(array $data)
    {
        
        $sql = <<<SQL
        UPDATE 
            usuarios
        SET
            nombre_usuario = :nombre,
            correo_electronico = :correo_electronico,
            rol = :rol
        WHERE
            id_usuario = :id_usuario
SQL;

        return $this->consultar($sql,$data);

    }



    public function validarDatos(Array $datos){

        foreach ($this->keys as $clave) {
        
            if (!array_key_exists($clave, $datos)) {
        
                return false;
        
            }
        
        }

        return true;

    }



}