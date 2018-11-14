<?php

class SignupController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
      
    }

    public function registerAction()
    {
        $user = new Usuario();

        // Store and check for errors
        $success = $user->save(
            $this->request->getPost(),
            [
                "nombre",
                "identificacion",
                "fecha_nacimiento",
                "genero",
                "estado_civil",
                "direccion",
                "telefono",

            ]
        );

        if ($success) {
           
            $this->flash->success('Gracias por tu Registro');

        } else {
            echo "Lo Sentimos, tenemos inconvenientes: ";

            $messages = $user->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->view->disable();
    }
      
    




}

