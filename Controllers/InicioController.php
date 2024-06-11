<?php

namespace Controllers;

use Views\Inicio;
use Controllers\Controller;
use Models\Usuarios;
use Views\UsuariosView;

class InicioController extends Controller {

    protected $arrayMethods = ['createUser','getUsers','eliminarUsuario'];

    public function index()
    {
        if(!$_GET['api'])
        {
            echo (new UsuariosView)->component((new Usuarios)->usersGet($_REQUEST));
            die;

        } else {
            $this->getMethod($_REQUEST,$_REQUEST['api']);
            die;
        }

    }

    public function getUsers($datos)
    {
        echo (new UsuariosView)->component((new Usuarios)->usersGet($_REQUEST));
    }

    public function createUser($datos)
    {
        $user = [
            'nombre'=>$datos['nombre'],
            'correo_electronico'=>$datos['correo_electronico'],
            'contrasena'=>$datos['contrasena'],
            'rol'=>$datos['rol']
        ];

        if((new Usuarios)->usersCreate($user))
        {
            echo 'Usuario creado con exito';
            header('Location: ./');
        } else {
            echo 'Error al crear el usuario';
            header('Location: ./');
        }
    }

    public function eliminarUsuario($datos)
    {
        if((new Usuarios)->usersDeleteByID($datos['id']))
        {
            echo 'Usuario eliminado con exito';
            header('Location: ./');
        } else {
            echo 'Error al eliminado el usuario';
            header('Location: ./');
        }
    }

    public function editarUsuario($datos)
    {
        if((new Usuarios)->usersUpdateByID($datos))
        {
            echo 'Usuario editado con exito';
        } else {
            echo 'Error al editado el usuario';
        }
    }

}