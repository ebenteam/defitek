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
         
            // Mensaje tipo flash Session 
        $this->flashSession->success('Gracias por tu Registro!');

           // Redireccion a pagina insertar usuario
        return $this->response->redirect('signup');


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

