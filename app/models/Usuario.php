<?php

use Phalcon\Mvc\Model;

class Usuario extends Model
{
    public $id_usuario;
    public $nombre;
    public $identificacion;
    public $fecha_nacimiento;
    public $genero;
    public $estado_civil;
    public $direccion;
    public $telefono;

}