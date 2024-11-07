<?php

namespace App\Controllers;
 
class Pagina extends BaseController
{
    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];

    public function valida(){
        $session = session();
        $session->has('logged_in');
        
            if($session->has('logged_in')){
                return redirect()->to(base_url('/usuario'));
                
            }
        
        print_r($_SESSION);
    }

    public function validaUsuario(){
        $session = session();
        $usuario= $_POST['usuario'];
        $password = $_POST['password'];
        $clientesM = model('ClientesModel');
        $cliente = $clientesM ->validaUsuario($usuario, $password);
        if(count($cliente)>0){
            $newdata = [
                'nombre' => $cliente[0]->nombre,
                'correo' => $cliente[0]->correo,
                'telefono' => $cliente[0]->telefono,
                'direccion' => $cliente[0]->direccion,
                'logged_in' => TRUE,
                'carrito' => null,
                'tipo' => 'CLIENTE'
            ];
            $session->set($newdata);
            return redirect()->to(base_url('/pagina'));

        }
        else{
            print "no hay";
        }
        
    }
    public function verCarrito(){
        
    }
    
}
