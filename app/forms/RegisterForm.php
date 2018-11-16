<?php
namespace App\Forms;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Element\Submit;
//librerias de validacion
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Alpha as AlphaValidator;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Validation\Validator\Regex as RegexValidator;


class RegisterForm extends Form
{
    public function initialize()
    
    {   
        $nombre =  new Text(
            'nombre',
            [
                "class" => "form-control",
                "placeholder" => "Ingrese su Nombre completo"
            ]
            );
        //validador nombre 
         $nombre->addValidator(
                new PresenceOf(
                    ['message' => 'Tu Nombre es requerido',])
            );

         $nombre->addValidator(
                new RegexValidator(
                    [
                        "pattern" => "/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+(\s*[a-zA-ZñÑáéíóúÁÉÍÓÚ]*)*[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/",
                        "message" => "Tu Nombre debe contener solo letras",
                    ]
                )
            );

        

        $identificacion =  new Text(
            'identificacion',
            [
                "class" => "form-control",
                "placeholder" => "Ingrese su Identificacion"
            ]
            );

        //validador identidicacion
         $identificacion->addValidator(
                new PresenceOf(
                    ['message' => 'Tu Identificación es requerida',])
            );

         //validador identidicacion
         $identificacion->addValidator(
                new Numericality(
                    ['message' => 'Tu Identificación debe contener numeros',])
            );

        

        
        $fecha_nacimiento =  new Date(
            'fecha_nacimiento',
            [
                "class" => "form-control",
                "placeholder" => "Ingrese su Fecha de Nacimiento"
            ]
            );
        //validador fecha de nacimiento
         $fecha_nacimiento->addValidator(
                new PresenceOf(
                    ['message' => 'Tu Fecha de Nacimiento es requerida',])
            );
        
         $genero = new Select(
            'genero',
            [
                '' => 'Ingrese su Genero',
                'M' => 'Masculino',
                'F' => 'Femenino',
            ],

            [
                "class" => "form-control",
                "placeholder" => "Ingrese su Genero",
            ]
            );

             //validador genero
         $genero ->addValidator(
            new PresenceOf(
                ['message' => 'Tu Genero es requerido',])
            );
        
            
        
        $estado_civil = new Select( 
            'estado_civil',
            [   
                '' => 'Ingrese su Estado Civil',
                'Soltero' => 'Soltero',
                'Casado' => 'Casado',
            ],

            [
                "class" => "form-control",
                "placeholder" => "Ingrese su Estado Civil",
            ]
            );
             //validador estado civil
            $estado_civil ->addValidator(
                new PresenceOf(
                    ['message' => 'Tu Estado Civil es requerido',])
                );
       

        $direccion = new Text(
            'direccion',
            [
                "class" => "form-control",
                "placeholder" => "Ingrese su Dirección"
            ]
            );

        //validador direccion
        $direccion ->addValidator(
            new PresenceOf(
                ['message' => 'Tu Dirección es requerida',])
            );
       
        
        $telefono = new Text(
            'telefono',
            [
                "class" => "form-control",
                "placeholder" => "Ingrese su Telefono"
            ]
            );

        
        //validador Telefono
      
        $telefono->addValidator(
            new PresenceOf(
                ['message' => 'Tu Telefono es requerido',])
        );

         
         $telefono->addValidator(
            new Numericality(
                ['message' => 'Tu Telefono debe contener numeros',])
        );

        
        $submit = new Submit(
            'submit',
            [
                "value" => "Registro",
                "class" => "btn btn-primary mb-2",
            ]
            );
        
            $this->add($nombre);
            $this->add($identificacion);
            $this->add($fecha_nacimiento);
            $this->add($genero);
            $this->add($estado_civil);
            $this->add($direccion);
            $this->add($telefono);
            $this->add($submit);

       
    }
}