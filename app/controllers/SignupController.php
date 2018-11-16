<?php
use Phalcon\Http\Request;
//use form
use App\Forms\RegisterForm;

class SignupController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
      $this->view->form = new RegisterForm();
    }

    public function registerAction()
    {
        $request = new Request();
        $user = new Usuario();
        $form = new RegisterForm();


        // comprobar request 
        if (!$this->request->isPost()) {

            return $this->response->redirect('signup');

        }
        // comprobar validacion
        if (!$form->isValid($_POST)) {
         $messages = $form->getMessages();

        foreach ($messages as $message) {
        $this->flashSession->error($message);
        //return $this->response->redirect('signup');
        // --------------------------------
       // El bucle de dispatcher nos permite reenviar el flujo de ejecución
       // a otro controlador / acción. Esto es muy útil para verificar si 
       //el usuario puede acceder a ciertas opciones, redirigir a los usuarios
       // a otras pantallas o simplemente reutilizar el código.

        $this->dispatcher->forward(
            [
                'controller' => $this->router->getControllerName(),
                'action'     => 'index',
            ]
        );
        return;
        }
}

        $nombre = $this->request->getPost('nombre',['trim', 'string']);
        $identificacion = $this->request->getPost('identificacion',['trim', 'string']);
        $fecha_nacimiento = $this->request->getPost('fecha_nacimiento',['trim', 'string']);
        $genero = $this->request->getPost('genero',['trim', 'string']);
        $estado_civil = $this->request->getPost('estado_civil',['trim', 'string']);
        $direccion = $this->request->getPost('direccion',['trim', 'string']);
        $telefono = $this->request->getPost('telefono',['trim', 'string']);

        

        // Store and check for errors
        $success = $user->save(
            [
                "nombre" => $nombre,
                "identificacion"=> $identificacion,
                "fecha_nacimiento"=> $fecha_nacimiento,
                "genero"=> $genero,
                "estado_civil"=> $estado_civil,
                "direccion"=> $direccion,
                "telefono"=> $telefono

            ],
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
           

            $messages = $user->getMessages();

            foreach ($messages as $message) {
             echo $message->getMessage(), "<br/>";
            }


        }

        $this->view->disable();
    }
      
    




}

