<?php

namespace App\Controllers;

class Direccion extends BaseController
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
    public function index(): string
    {

        $direccionM = model('DireccionM');
        $data['direccion'] = $direccionM->findAll();
        return view('head') .
            view('menu') .
            view('direccion/show', $data) .
            view('footer');
    }

    public function add()
    {  
        return view('head') .
            view('menu') .
            view('direccion/add') .
            view('footer');
    }
    public function add1()
    {  
        return view('head') .
            view('menu') .
            view('direccion/add1') . // Cargar vista específica para add1
            view('footer');
    }

    public function add2()
    {  
        return view('head') .
            view('menu') .
            view('direccion/add2') . // Cargar vista específica para add2
            view('footer');
    }

    public function edit($idDireccion)
    {   //get
        
        $idDireccion = $data['idDireccion'] = $idDireccion;
        $direccionM = model('DireccionM');
        $data['direccion'] = $direccionM->where('idDireccion', $idDireccion)->findAll();
        return view('head') .
            view('menu') .
            view('direccion/edit', $data) .
            view('footer');
    }

    public function update()
    {
        $direccionM = model('DireccionM');
        $idDireccion = $_POST['idDireccion'];

        if (!$this->request->is('post')) {
            $this->index();
        }

        // Reglas de validación
        $rules = [
            'calle' => 'required',
            'numero' => 'required',
            'codigoPostal' => 'required',
            'municipio' => 'required',
            'estado' => 'required'
        ];
        $data = [
            'calle' => $_POST['calle'],
            'numero' => $_POST['numero'],
            'codigoPostal' => $_POST['codigoPostal'],
            'municipio' => $_POST['municipio'],
            'estado' => $_POST['estado']
            
        ];
        if (!$this->validate($rules)) {
            // Si la validación falla, vuelve a cargar la vista con los errores
            return view('head') .
                view('menu') .
                view('direccion/edit', [
                    'validation' => $this->validator
                ]) .
                view('footer');
        } else {
            $direccionM = model('DireccionM');
            $direccionM->set($data)->where('idDireccion', $idDireccion)->update();
            return redirect()->to(base_url('/direccion'));
        }
    }


    
    public function insert1()
    { 
        if (!$this->request->is('post')) {
            $this->index();
        }

        // Reglas de validación
        $rules = [
            'calle' => 'required',
            'numero' => 'required',
            'codigoPostal' => 'required',
            'municipio' => 'required',
            'estado' => 'required'
        ];
        $data = [
            'calle' => $_POST['calle'],
            'numero' => $_POST['numero'],
            'codigoPostal' => $_POST['codigoPostal'],
            'municipio' => $_POST['municipio'],
            'estado' => $_POST['estado']
        ];
        if (!$this->validate($rules)) {
            return view('head') .
                view('menu') .
                view('direccion/add1', [
                    'validation' => $this->validator
                ]) .
                view('footer');
        } else {
            $direccionM = model('DireccionM');
            $direccionM->insert($data);
            return redirect()->to(base_url('/doctor/add'));
        }
    }

    // Función insert2 duplicada
    public function insert2()
    { 
        if (!$this->request->is('post')) {
            $this->index();
        }

        // Reglas de validación
        $rules = [
            'calle' => 'required',
            'numero' => 'required',
            'codigoPostal' => 'required',
            'municipio' => 'required',
            'estado' => 'required'
        ];
        $data = [
            'calle' => $_POST['calle'],
            'numero' => $_POST['numero'],
            'codigoPostal' => $_POST['codigoPostal'],
            'municipio' => $_POST['municipio'],
            'estado' => $_POST['estado']
        ];
        if (!$this->validate($rules)) {
            return view('head') .
                view('menu') .
                view('direccion/add2', [
                    'validation' => $this->validator
                ]) .
                view('footer');
        } else {
            $direccionM = model('DireccionM');
            $direccionM->insert($data);
            return redirect()->to(base_url('/consultorio/add'));
        }
    }




    public function delete($idDireccion)
    {

        $direccionM = model('DireccionM');
        $direccionM->delete($idDireccion);
        return redirect()->to(base_url('/paciente'));
    }
}
