<?php

namespace App\Controllers;

use App\Models\PacienteM;
use Stringable;

class ConsultorioDoctor extends BaseController
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
        $consultorioDoctorM = model('ConsultorioDoctorM');
        $data['consultorioDoctor'] = $consultorioDoctorM->getInfo();
        return view('head') .
            view('menu') .
            view('consultorioDoctor/show', $data) .
            view('footer');
    }

    public function add()
    {  
        
        $consultorioM = model('ConsultorioM');
        $data['consultorio'] = $consultorioM->findAll();
        $doctorM = model('DoctorM');
        $data['doctor'] = $doctorM->findAll();
        return view('head') .
            view('menu') .
            view('consultorioDoctor/add', $data) .
            view('footer');
    }

    public function edit($idCita)
    {   
        $consultorioDoctorM = model('ConsultorioDoctorM');
        $data['consultorioDoctor'] = $consultorioDoctorM->getInfo();
        $consultorioM = model('ConsultorioM');
        $data['consultorios'] = $consultorioM->findAll();
        $doctorM = model('DoctorM');
        $data['doctor'] = $doctorM->findAll();
        $doctorM = model('DoctorM');
        $data['doctor'] = $doctorM->findAll();
        $pacienteM = model('PacienteM');
        $data['paciente'] = $pacienteM->findAll();
        $idCita = $data['idCita'] = $idCita;
        $citaM = model('CitaM');
        $data['cita'] = $citaM->where('idCita', $idCita)->findAll();
        return view('head') .
            view('menu') .
            view('consultorioDoctor/edit', $data) .
            view('footer');
    }

    public function update()
    {
        $consultorioDoctorM = model('ConsultorioDoctorM');
        $id = $_POST['id'];
        $data1['consultorioDoctor'] = $consultorioDoctorM->where('id', $id)->findAll();
        $doctorM = model('DoctorM');
        $data1['doctor'] = $doctorM->findAll();  

        if (!$this->request->is('post')) {
            $this->index();
        }

        // Reglas de validación
        $rules = [
            'idConsultorio' => 'required',
            'idDoctor' => 'required',
            'horaDeEntrada' => 'required',
            'horaDeSalida' => 'required'
        ];
        $data = [
            'idConsultorio' => $_POST['idConsultorio'],
            'idDoctor' => $_POST['idDoctor'],
            'horaDeEntrada' => $_POST['horaDeEntrada'],
            'horaDeSalida' => $_POST['horaDeSalida']

        ];
        if (!$this->validate($rules)) {
            // Si la validación falla, vuelve a cargar la vista con los errores
            return view('head') .
                view('menu', $data1) .
                view('consultorioDoctor/edit', [
                    'validation' => $this->validator
                ]) .
                view('footer');
        } else {
            $consultorioDoctorM = model('ConsultorioDoctorM');
            $consultorioDoctorM->set($data)->where('id', $id)->update();
            return redirect()->to(base_url('/consultorioDoctor'));
        }
    }


    public function insert()
    { // post
        if (!$this->request->is('post')) {
            $this->index();
        }

        // Reglas de validación
        $rules = [
            'idConsultorio' => 'required',
            'idDoctor' => 'required',
            'horaDeEntrada' => 'required',
            'horaDeSalida' => 'required'
        ];
        $data = [
            'idConsultorio' => $_POST['idConsultorio'],
            'idDoctor' => $_POST['idDoctor'],
            'horaDeEntrada' => $_POST['horaDeEntrada'],
            'horaDeSalida' => $_POST['horaDeSalida']

        ];

        // Valida los datos
        if (!$this->validate($rules)) {
            // Si la validación falla, vuelve a cargar la vista con los errores
            return view('head') .
                view('menu') .
                view('consultorioDoctor/add', [
                    'validation' => $this->validator
                ]) .
                view('footer');
        } else {
            $consultorioDoctorM = model('consultorioDoctorM');
            $consultorioDoctorM->insert($data);
            return redirect()->to(base_url('/consultorioDoctor'));
        }
    }



    public function delete($idCita)
    {

        $citaM = model('CitaM');
        $citaM->delete($idCita);
        return redirect()->to(base_url('/cita'));
    }
}
