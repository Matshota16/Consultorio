<?php

namespace App\Controllers;

class Doctor extends BaseController
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

        $DoctorM = model('DoctorM');
        $data['doctor'] = $DoctorM->getDireccion();
        return view('head') .
            view('menu') .
            view('doctor/show', $data) .
            view('footer');
    }

    public function add()
    {  
        $direccionM = model('DireccionM');
        
        // Obtener el último idDireccion insertado
        $db = \Config\Database::connect();
        $builder = $db->table('direccion');
        $builder->selectMax('idDireccion');
        $query = $builder->get();
        $lastDireccion = $query->getRow();
        
        // Asignar el último idDireccion a los datos pasados a la vista
        $data['lastDireccion'] = $lastDireccion->idDireccion ?? null;
        $data['doctor'] = $direccionM->findAll();

        return view('head') .
            view('menu') .
            view('doctor/add', $data) .
            view('footer');
    }

    public function edit($idDoctor)
    {   //get
        $direccionM = model('DireccionM');
        $data['direccion'] = $direccionM->findAll();
        $idDoctor = $data['idDoctor'] = $idDoctor;
        $doctorM = model('DoctorM');
        $data['doctor'] = $doctorM->where('idDoctor', $idDoctor)->findAll();
        return view('head') .
            view('menu') .
            view('doctor/edit', $data) .
            view('footer');
    }

    public function update()
    {
        $doctorM = model('DoctorM');
        $idDoctor = $_POST['idDoctor'];
        $data1['doctor'] = $doctorM->where('idDoctor', $idDoctor)->findAll();
        $direccionM = model('DireccionM');
        $data1['direccion'] = $direccionM->findAll();
        

        if (!$this->request->is('post')) {
            $this->index();
        }



      // Reglas de validación
        $rules = [
            'nombreD' => 'required',
            'apellidoPD' => 'required',
            'apellidoMD' => 'required',
            'curp' => 'required',
            'fechaDeNacimiento' => 'required',
            'telefono' => 'required',
            'genero' => 'required', 
            'especialidad' => 'required',
            'cedulaProfecional' => 'required',
            'idDireccion' => 'required',
        ];
        $data = [
            'nombreD' => $_POST['nombreD'],
            'apellidoPD' => $_POST['apellidoPD'],
            'apellidoMD' => $_POST['apellidoMD'],
            'curp' => $_POST['curp'],
            'fechaDeNacimiento' => $_POST['fechaDeNacimiento'],
            'telefono' => $_POST['telefono'],
            'genero' => $_POST['genero'],
            'especialidad' => $_POST['especialidad'],
            'cedulaProfecional' => $_POST['cedulaProfecional'],
            'idDireccion' => $_POST['idDireccion'],
        ];
 
        if (!$this->validate($rules)) {
            // Si la validación falla, vuelve a cargar la vista con los errores
            return view('head') .
                view('menu',$data1) .
                view('doctor/edit', [
                    'validation' => $this->validator
                ]) .
                view('footer');
        } else {
            $doctorM = model('DoctorM');
            $doctorM->set($data)->where('idDoctor', $idDoctor)->update();
            return redirect()->to(base_url('/doctor'));
        }
    }


    public function insert()
    { // post
        if (!$this->request->is('post')) {
            $this->index();
        }

        $db = \Config\Database::connect();

        // Obtener el último idDireccion insertado
        $builder = $db->table('direccion');
        $builder->selectMax('idDireccion');
        $query = $builder->get();
        $lastDireccion = $query->getRow();
        
        // Reglas de validación
        $rules = [
            'calle' => 'required',
            'numero' => 'required',
            'codigoPostal' => 'required',
            'municipio' => 'required',
            'estado' => 'required',
            'nombreD' => 'required',
            'apellidoPD' => 'required',
            'apellidoMD' => 'required',
            'curp' => 'required',
            'fechaDeNacimiento' => 'required',
            'telefono' => 'required',
            'genero' => 'required', 
            'especialidad' => 'required',
            'cedulaProfecional' => 'required',
        ];

        $data = [
            'calle' => $_POST['calle'],
            'numero' => $_POST['numero'],
            'codigoPostal' => $_POST['codigoPostal'],
            'municipio' => $_POST['municipio'],
            'estado' => $_POST['estado']
        ];

        $data1 = [
            'nombreD' => $_POST['nombreD'],
            'apellidoPD' => $_POST['apellidoPD'],
            'apellidoMD' => $_POST['apellidoMD'],
            'curp' => $_POST['curp'],
            'fechaDeNacimiento' => $_POST['fechaDeNacimiento'],
            'telefono' => $_POST['telefono'],
            'genero' => $_POST['genero'],
            'especialidad' => $_POST['especialidad'],
            'cedulaProfecional' => $_POST['cedulaProfecional'],
            'idDireccion' => $lastDireccion->idDireccion ?? null
        ];

        // Valida los datos
        if (!$this->validate($rules)) {
            // Si la validación falla, vuelve a cargar la vista con los errores
            return view('head') .
                view('menu') .
                view('doctor/add', [
                    'validation' => $this->validator
                ]) .
                view('footer');
        } else {
            $direccionM = model('DireccionM');
            $direccionM->insert($data);
            $DoctorM = model('DoctorM');
            $DoctorM->insert($data1);
            return redirect()->to(base_url('/doctor'));
        }
    }



    public function delete($idDoctor)
    {

        $DoctorM = model('DoctorM');
        $DoctorM->delete($idDoctor);
        return redirect()->to(base_url('/doctor'));
    }
}
