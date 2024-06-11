<?php

namespace Views;

class UsuariosView {
    

    public function head():string
    {
        return <<<HTML
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Lista de Usuarios</title>
HTML;
    }

    public function body(Array $datos) : string
    {
        $list = '';
        foreach($datos as $val)
        {
$list .= <<<HTML
    <tr>
        <th scope="row">{$val['id_usuario']}</th>
        <td>{$val['nombre_usuario']}</td>
        <td>{$val['correo_electronico']}</td>
        <td>{$val['rol']}</td>
        <td><a href="./?api=eliminarUsuario&id={$val['id_usuario']}"><img style="width: 30px;height: 30px;" src="./Views/images/trans.svg"></a></td>
    </tr>
HTML;
        }

        $datos = $_REQUEST;

        $datos['order'] = $datos['order'] == 'ASC' ? 'DESC' : 'ASC';

        return <<<HTML

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                <h1 class="text-center my-4">Lista de Usuarios</h1>
                <div class="d-flex justify-content-end m-0 p-0">
                    <h5 class="text-center my-4">{$datos['campo']} | {$datos['order']}</h5>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col"><a href="./?api=getUsers&order={$datos['order']}&campo=id_usuario">#</a></th>
                        <th scope="col"><a href="./?api=getUsers&order={$datos['order']}&campo=nombre_usuario">Nombre</a></th>
                        <th scope="col"><a href="./?api=getUsers&order={$datos['order']}&campo=correo_electronico">Correo</a></th>
                        <th scope="col"><a href="./?api=getUsers&order={$datos['order']}&campo=rol">Rol</a></th>
                        <th scope="col"><a>Borrar</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    $list
                    <tr>
                        <form id="formCreateUser" action="./">
                            <th scope="row"></th>
                            <td><input name="nombre" type="text" required></td>
                            <td><input name="correo_electronico" type="email" required></td>
                            <td><input name="rol" type="text" required></td>
                            <td>
                                <input type="submit" class="btn btn-primary" value="Crear Usuario">
                                <input name="contrasena" type="hidden" value="defaultPass">
                                <input name="api" type="hidden" value="createUser">    
                        </td>
                        </form>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
HTML;
    }

    public function component(array $datos):string
    {
        return <<<HTML

        <!DOCTYPE html>
        <html lang="en">
            <head>
                {$this->head()}
            </head>
            <body>
                {$this->body($datos)}
            </body>
        </html>

HTML;
    }




}