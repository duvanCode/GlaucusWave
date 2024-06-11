<?php

namespace Views;

class Inicio {
    

    public function head():string
    {
        return <<<HTML
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Document</title>
HTML;
    }

    public function body():string
    {
        return <<<HTML
        <h1>Hola mundoi</h1>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
HTML;
    }

    public function component():string
    {
        return <<<HTML

        <!DOCTYPE html>
        <html lang="en">
            <head>
                {$this->head()}
            </head>
            <body>
                {$this->body()}
            </body>
        </html>

HTML;
    }




}