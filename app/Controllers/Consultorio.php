<?php

namespace App\Controllers;

class Consultorio extends BaseController
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
        $consultorioM = model('ConsultorioM');
        $data['consultorio'] = $consultorioM->findAll();
        //$consultorioM = model('ConsultorioM');
        //$data['consultorio'] = $consultorioM->getDoctor();
        return view('head') .
            view('menu') .
            view('consultorio/show', $data) .
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
        $data['consultorio'] = $direccionM->findAll();
        $doctorM = model('DoctorM');
        $data['consultorio1'] = $doctorM->findAll();
        return view('head') .
            view('menu') .
            view('consultorio/add', $data) .
            view('footer');
    }

    public function edit($idConsultorio)
    {   //get
        $direccionM = model('DireccionM');
        $data['direccion'] = $direccionM->findAll();
        $doctorM = model('DoctorM');
        $data['doctor'] = $doctorM->findAll();
        $idConsultorio = $data['idConsultorio'] = $idConsultorio;
        $consultorioM = model('ConsultorioM');
        $data['consultorio'] = $consultorioM->where('idConsultorio', $idConsultorio)->findAll();
        return view('head') .
            view('menu') .
            view('consultorio/edit', $data) .
            view('footer');
    }

    public function update()
    {
        $consultorioM = model('ConsultorioM');
        $idConsultorio = $_POST['idConsultorio'];
        $data1['consultorio'] = $consultorioM->where('idConsultorio', $idConsultorio)->findAll();
        $direccionM = model('DireccionM');
        $data1['direccion'] = $direccionM->findAll();
        $doctorM = model('DoctorM');
        $data1['doctor'] = $doctorM->findAll();

        if (!$this->request->is('post')) {
            $this->index();
        }

        // Reglas de validación
        $rules = [
            'nombreConsultorio' => 'required',
            'telefono' => 'required',
            'correoElectronico' => 'required',
            'horaDeApertura' => 'required',
            'horaDeCierre' => 'required',
            'idDireccion' => 'required',
            'maps' => 'required'
        ];
        $data = [
            'nombreConsultorio' => $_POST['nombreConsultorio'],
            'telefono' => $_POST['telefono'],
            'correoElectronico' => $_POST['correoElectronico'],
            'horaDeApertura' => $_POST['horaDeApertura'],
            'horaDeCierre' => $_POST['horaDeCierre'],
            'idDireccion' => $_POST['idDireccion'],
            'maps' => $_POST['maps']

        ];
        if (!$this->validate($rules)) {
            // Si la validación falla, vuelve a cargar la vista con los errores
            return view('head') .
                view('menu',$data1) .
                view('consultorio/edit', [
                    'validation' => $this->validator
                ]) .
                view('footer');
        } else {
            $consultorioM = model('ConsultorioM');
            $consultorioM->set($data)->where('idConsultorio', $idConsultorio)->update();
            return redirect()->to(base_url('/consultorio'));
        }
    }


    public function insert()
    { // post
        if (!$this->request->is('post')) {
            $this->index();
        }

        // Reglas de validación
        $rules = [
            'nombreConsultorio' => 'required',
            'telefono' => 'required',
            'correoElectronico' => 'required',
            'horaDeApertura' => 'required',
            'horaDeCierre' => 'required',
            'idDireccion' => 'required',
            'maps' => 'required'
        ];

        $data = [
            'nombreConsultorio' => $_POST['nombreConsultorio'],
            'telefono' => $_POST['telefono'],
            'correoElectronico' => $_POST['correoElectronico'],
            'horaDeApertura' => $_POST['horaDeApertura'],
            'horaDeCierre' => $_POST['horaDeCierre'],
            'idDireccion' => $_POST['idDireccion'],
            'maps' => $_POST['maps']

        ];

        // Valida los datos
        if (!$this->validate($rules)) {
            // Si la validación falla, vuelve a cargar la vista con los errores
            return view('head') .
                view('menu') .
                view('consultorio/add', [
                    'validation' => $this->validator
                ]) .
                view('footer');
        } else {
            $consultorioM = model('ConsultorioM');
            $consultorioM->insert($data);
            return redirect()->to(base_url('/consultorio'));
        }
    }



    public function delete($idConsultorio)
    {

        $consultorioM = model('ConsultorioM');
        $consultorioM->delete($idConsultorio);
        return redirect()->to(base_url('/consultorio'));
    }

    //cliente

    public function Ver()
    {
        $consultorioM = model('ConsultorioM');
        $data['cliente'] = $consultorioM->findAll();
        return view('Cliente/topMenu') .
            view('Cliente/Vista', $data);
    }
    public function verConsultorio($idConsultorio)
    {
        $consultorioM = model('ConsultorioM');
        $data['cliente'] = $consultorioM->where('idConsultorio', $idConsultorio)->findAll();
        return view('Cliente/topMenu') .
            view('Cliente/verConsultorio', $data);
    }
}
