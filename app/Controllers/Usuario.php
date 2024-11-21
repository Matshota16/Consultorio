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
           $user = $result[0];
   
           // Almacenar todos los campos del usuario en la sesión
           $newdata = [
               'idUsuario' => $user->idUsuario,
               'nombre' => $user->nombre,
               'apellidoPaterno' => $user->apellidoPaterno,
               'apellidoMaterno' => $user->apellidoMaterno,
               'correoElectronico' => $user->correoElectronico,
               'curp' => $user->curp,
               'numeroDeSeguridadSocial' => $user->numeroDeSeguridadSocial,
               'fechaDeNacimiento' => $user->fechaDeNacimiento,
               'telefono' => $user->telefono,
               'genero' => $user->genero,
               'alergias' => $user->alergias,
               'tipo' => $user->tipo,
               'logged_in' => true,
           ];
   
           $session->set($newdata);
   
           // Redirigir según el tipo de usuario
           if ($user->tipo == 0) {
               return redirect()->to(base_url('/cita/home'));
           } elseif ($user->tipo == 1) {
               return redirect()->to(base_url('/cliente'));
           }
       } else {
           return redirect()->to(base_url('/usuario'));
       }
   }
   

    public function salir(){
        $array_items = ['idUsuario', 'nombre' , 'apellidoPaterno' , 'apellidoMaterno' , 'correoElectronico ', 'curp', 'numeroDeSeguridadSocial', 'fechaDeNacimiento', 'telefono','genero','alergias', 'tipo', 'logged_in'];  // Cambia 'usuario' por 'email'
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