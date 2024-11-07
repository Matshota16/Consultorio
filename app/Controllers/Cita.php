<?php

namespace App\Controllers;

use App\Models\PacienteM;
use Stringable;

class Cita extends BaseController
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
        $citaM = model('CitaM');
        $data['cita'] = $citaM->getInformacion();
        //$consultorioM = model('ConsultorioM');
        //$data['consultorio'] = $consultorioM->getDoctor();
        return view('head') .
            view('menu') .
            view('cita/show', $data) .
            view('footer');
    }
    public function home()
    {
        return view('head') .
            view('menu') .
            view('cita/home') .
            view('footer');

    }

    public function add()
    {  
        
        $doctorM = model('DoctorM');
        $data['doctor'] = $doctorM->findAll();
        $pacienteM = model('PacienteM');
        $data['paciente'] = $pacienteM->findAll();
        return view('head') .
            view('menu') .
            view('cita/add', $data) .
            view('footer');
    }

    public function edit($idCita)
    {   
        $doctorM = model('DoctorM');
        $data['doctor'] = $doctorM->findAll();
        $pacienteM = model('PacienteM');
        $data['paciente'] = $pacienteM->findAll();
        $idCita = $data['idCita'] = $idCita;
        $citaM = model('CitaM');
        $data['cita'] = $citaM->where('idCita', $idCita)->findAll();
        return view('head') .
            view('menu') .
            view('cita/edit', $data) .
            view('footer');
    }

    public function update()
    {
        $citaM = model('CitaM');
        $idCita = $_POST['idCita'];
        $data1['cita'] = $citaM->where('idCita', $idCita)->findAll();
        $pacienteM = model('PacienteM');
        $data1['paciente'] = $pacienteM->findAll();
        $doctorM = model('DoctorM');
        $data1['doctor'] = $doctorM->findAll();  

        if (!$this->request->is('post')) {
            $this->index();
        }

        // Reglas de validación
        $rules = [
            'motivo' => 'required',
            'fechaCita' => 'required',
            'horaCita' => 'required',
            'idPaciente' => 'required',
            'idDoctor' => 'required'
        ];
        $data = [
            'motivo' => $_POST['motivo'],
            'fechaCita' => $_POST['fechaCita'],
            'horaCita' => $_POST['horaCita'],
            'idPaciente' => $_POST['idPaciente'],
            'idDoctor' => $_POST['idDoctor']

        ];
        if (!$this->validate($rules)) {
            // Si la validación falla, vuelve a cargar la vista con los errores
            return view('head') .
                view('menu', $data1) .
                view('cita/edit', [
                    'validation' => $this->validator
                ]) .
                view('footer');
        } else {
            $citaM = model('CitaM');
            $citaM->set($data)->where('idCita', $idCita)->update();
            return redirect()->to(base_url('/cita'));
        }
    }


    public function insert()
    { // post
        if (!$this->request->is('post')) {
            $this->index();
        }

        // Reglas de validación
        $rules = [
            'motivo' => 'required',
            'fechaCita' => 'required',
            'horaCita' => 'required',
            'idPaciente' => 'required',
            'idDoctor' => 'required'
        ];
        $data = [
            'motivo' => $_POST['motivo'],
            'fechaCita' => $_POST['fechaCita'],
            'horaCita' => $_POST['horaCita'],
            'idPaciente' => $_POST['idPaciente'],
            'idDoctor' => $_POST['idDoctor']

        ];

        // Valida los datos
        if (!$this->validate($rules)) {
            // Si la validación falla, vuelve a cargar la vista con los errores
            return view('head') .
                view('menu') .
                view('cita/add', [
                    'validation' => $this->validator
                ]) .
                view('footer');
        } else {
            $citaM = model('CitaM');
            $citaM->insert($data);
            return redirect()->to(base_url('/cita'));
        }
    }



    public function delete($idCita)
    {

        $citaM = model('CitaM');
        $citaM->delete($idCita);
        return redirect()->to(base_url('/cita'));
    }
}
