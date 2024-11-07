<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class Usuario extends Controller{
   
   public function index(){
    return  view('head').
            
     view('usuario/login').
     view('footer');
   }

   public function acceder(){
    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];

    $usuarioM = model('UsuarioM');

    $result = $usuarioM->valida($nombre,$pass);
    if(count($result)>0){
        $session = session();
        $newdata = [
            'nombre'  => $result[0]->nombre,
            'tipo'     => $result[0]->tipo,
            'logged_in' => true,
        ];
        
        $session->set($newdata);
        if ($result[0]->tipo == 0) {
            return redirect()->to(base_url('/cita/home'));
        } elseif ($result[0]->tipo == 1) {
            return redirect()->to(base_url('/cliente'));
        }
    }
    else{
        return redirect()->to(base_url('/usuario'));
    }
   }


   public function salir(){
    $session = session();
    $session->destroy();
    $session->close();
   
    return redirect()->to(base_url('/usuario'));

   }
   public function accesoDenegado(){
    
    return view('errors/acceso_denegado'); // Cargar una vista de error personalizada
}
    
}