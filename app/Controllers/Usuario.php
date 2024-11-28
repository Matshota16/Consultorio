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
               return redirect()->to(base_url('/consultorio'));
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

    public function registrar()
    {
        $usuarioM = model('UsuarioM');

        $rules = [
            'nombre' => 'required',
            'apellidoPaterno' => 'required',
            'apellidoMaterno' => 'required',
            'correoElectronico' => 'required|valid_email|is_unique[usuario.correoElectronico]',
            'curp' => 'required',
            'numeroDeSeguridadSocial' => 'required',
            'fechaDeNacimiento' => 'required',
            'telefono' => 'required',
            'genero' => 'required',
            'alergias' => 'permit_empty',
            'pass' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return view('head') .
                view('usuario/registrar', ['validation' => $this->validator]) .
                view('footer');
        }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellidoPaterno' => $this->request->getPost('apellidoPaterno'),
            'apellidoMaterno' => $this->request->getPost('apellidoMaterno'),
            'correoElectronico' => $this->request->getPost('correoElectronico'),
            'curp' => $this->request->getPost('curp'),
            'numeroDeSeguridadSocial' => $this->request->getPost('numeroDeSeguridadSocial'),
            'fechaDeNacimiento' => $this->request->getPost('fechaDeNacimiento'),
            'telefono' => $this->request->getPost('telefono'),
            'genero' => $this->request->getPost('genero'),
            'alergias' => $this->request->getPost('alergias') ?? '',
            'pass' => password_hash($this->request->getPost('pass'), PASSWORD_BCRYPT),
            'tipo' => 1, // Tipo cliente
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $usuarioM->insert($data);

        return redirect()->to(base_url('/usuario'))->with('success', 'Cuenta creada con éxito. Ahora puedes iniciar sesión.');
    }
}