<?php
namespace App\Forms;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Element\Submit;


class RegisterForm extends Form
{
    public function initialize()
    {
        $this->add(
            new Text(
                'nombre',
                [
                    "class" => "form-control",
                    "placeholder" => "Ingrese su Nombre completo"
                ]
            )
        );

        $this->add(
            new Text(
                'identificacion',
                [
                    "class" => "form-control",
                    "placeholder" => "Ingrese su Identificacion"
                ]
            )
        );

        $this->add(
            new Date(
                'fecha_nacimiento',
                [
                    "class" => "form-control",
                    "placeholder" => "Ingrese su Fecha de Nacimiento"
                ]
            )
        );

        $this->add(
            new Select(
                'genero',
                [
                    ' ' => 'Ingrese su Genero',
                    'M' => 'Masculino',
                    'F' => 'Femenino',
                ],

                [
                    "class" => "form-control",
                    "placeholder" => "Ingrese su Genero",
                ]
            )
        );

        $this->add(

            new Select(
                'estado_civil',
                [   
                    ' ' => 'Ingrese su Estado Civil',
                    'Soltero' => 'Soltero',
                    'Casado' => 'Casado',
                ],

                [
                    "class" => "form-control",
                ]
            )
        );

        $this->add(
            new Text(
                'direccion',
                [
                    "class" => "form-control",
                    "placeholder" => "Ingrese su Dirección"
                ]
            )
        );

        $this->add(
            new Text(
                'telefono',
                [
                    "class" => "form-control",
                    "placeholder" => "Ingrese su Telefono"
                ]
            )
        );

        $this->add(
            new Submit(
                'submit',
                [
                    "value" => "Registro",
                    "class" => "btn btn-primary mb-2",
                ]
            )
        );


       
    }
}