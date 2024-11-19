<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class Usuario extends Controller{
   
   public function index(){
    return  view('head').
            
     view('usuario/login').
     view('footer');
   }

   public function acceder()
    {
        $correoElectronico = $_POST['correoElectronico'];
        $pass = $_POST['pass'];

        $usuarioM = model('UsuarioM');

        $result = $usuarioM->valida($correoElectronico, $pass);
        if (count($result) > 0) {
            $session = session();
            $newdata = [
                'correoElectronico' => $result[0]->correoElectronico,
                'tipo' => $result[0]->tipo,
                'logged_in' => true,
            ];

            $session->set($newdata);

            if ($result[0]->tipo == 0) {
                return redirect()->to(base_url('/cita/home'));
            } elseif ($result[0]->tipo == 1) {
                return redirect()->to(base_url('/cliente'));
            }
        } else {
            return redirect()->to(base_url('/usuario'));
        }
    }

    public function salir(){
        $array_items = ['correoElectronico ', 'tipo', 'logged_in'];  // Cambia 'usuario' por 'email'
        $session = session();
        $session->remove($array_items);

        return redirect()->to(base_url('/usuario'));
    }

    public function accesoDenegado()
    {
        return view('errors/acceso_denegado'); // Cargar una vista de error personalizada
    }

    public function verPerfil()
    {
        return view('Cliente/vistaCliente') .
            view('Cliente/verPerfil') .
            view('footer');
        
    }
}