<?php

namespace App\Controllers;

use App\Models\PacienteM;
use Stringable;

use App\Models\ConsultorioDoctorM;

class Cita extends BaseController
{
    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];

    public function valida()
    {
        $session = session();
        $session->has('logged_in');

        if ($session->has('logged_in')) {
            return redirect()->to(base_url('/usuario'));
        }

        print_r($_SESSION);
    }
    public function index()
    {
        $session = session();
        if ($session->get('logged_in') != true || $session->get('tipo') != 0) {
            return redirect()->to(base_url('/usuario/salir')); // Llamar a la función salir
        }
        $citaM = model('CitaM');
        $data['cita'] = $citaM->getCitasConDoctor();
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
        $session = session();
        if ($session->get('logged_in') != true || $session->get('tipo') != 0) {
            return redirect()->to(base_url('/usuario/salir')); // Llamar a la función salir
        }

        $consultorioDoctorM = model('ConsultorioDoctorM');
        $data['consultorioDoctor'] = $consultorioDoctorM->getInfo();
        $pacienteM = model('PacienteM');
        $data['paciente'] = $pacienteM->findAll();
        return view('head') .
            view('menu') .
            view('cita/add', $data) .
            view('footer');
    }

    public function edit($idCita)
    {
        $session = session();
        if ($session->get('logged_in') != true || $session->get('tipo') != 0) {
            return redirect()->to(base_url('/usuario/salir')); // Llamar a la función salir
        }
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
            'id' => 'required'
        ];
        $data = [
            'motivo' => $_POST['motivo'],
            'fechaCita' => $_POST['fechaCita'],
            'horaCita' => $_POST['horaCita'],
            'idPaciente' => $_POST['idPaciente'],
            'id' => $_POST['id']

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
    public function insert1()
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
            'id' => 'required'
        ];
        $data = [
            'motivo' => $_POST['motivo'],
            'fechaCita' => $_POST['fechaCita'],
            'horaCita' => $_POST['horaCita'],
            'idPaciente' => $_POST['idPaciente'],
            'id' => $_POST['id']

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
            return redirect()->to(base_url('/cliente'));
        }
    }



    public function delete($idCita)
    {

        $citaM = model('CitaM');
        $citaM->delete($idCita);
        return redirect()->to(base_url('/cita'));
    }


    public function formulario($idConsultorio)
    {
        $consultorioDoctorM = new ConsultorioDoctorM();
        $pacienteM = new PacienteM();

        // Obtener los doctores asociados al idConsultorio
        $doctores = $consultorioDoctorM->getDoctorsByConsultorio($idConsultorio);

        // Obtener el último idPaciente insertado
        $db = db_connect();
        $builder = $db->table('paciente');
        $builder->selectMax('idPaciente');
        $query = $builder->get();
        $lastPaciente = $query->getRow();

        // Obtener los datos del último paciente
        $lastPacienteData = null;
        if ($lastPaciente && $lastPaciente->idPaciente) {
            $lastPacienteData = $pacienteM->find($lastPaciente->idPaciente);
        }

        // Pasar datos a la vista
        $data = [
            'consultorioId' => $idConsultorio,
            'doctores' => $doctores,
            'lastPacienteId' => $lastPaciente->idPaciente ?? null,
            'lastPacienteData' => $lastPacienteData,
        ];

        // Cargar la vista
        return view('Cliente/vistaCliente') .
            view('Cliente/cita_formulario', $data) .
            view('footer');
    }

    public function formulario1($idConsultorio)
    {
        $consultorioDoctorM = new ConsultorioDoctorM();
        $pacienteM = new PacienteM();

        // Obtener los doctores asociados al idConsultorio
        $doctores = $consultorioDoctorM->getDoctorsByConsultorio($idConsultorio);

        // Obtener el último idPaciente insertado
        $db = db_connect();
        $builder = $db->table('paciente');
        $builder->selectMax('idPaciente');
        $query = $builder->get();
        $lastPaciente = $query->getRow();

        // Obtener los datos del último paciente
        $lastPacienteData = null;
        if ($lastPaciente && $lastPaciente->idPaciente) {
            $lastPacienteData = $pacienteM->find($lastPaciente->idPaciente);
        }

        // Pasar datos a la vista
        $data = [
            'consultorioId' => $idConsultorio,
            'doctores' => $doctores,
            'lastPacienteId' => $lastPaciente->idPaciente ?? null,
            'lastPacienteData' => $lastPacienteData,
        ];

        // Cargar la vista
        return view('head') .
            view('menu') .
            view('Cliente/cita_formulario', $data) .
            view('footer');
    }

    public function getCitasUsuario()
{
    $session = session();

    // Verificar que el usuario esté autenticado
    

    // Obtener el idUsuario desde la sesión
    $idUsuario = $session->get('idUsuario');

    // Verificar que el idUsuario esté disponible
    if (!$idUsuario) {
        return redirect()->to(base_url('/usuario/salir')); // Redirigir si no hay un idUsuario válido
    }

    // Conectar con la base de datos
    $db = db_connect();
    $builder = $db->table('citaUsuario');
    $builder->select('
        citaUsuario.idCitaUsuario,
        cita.motivo,
        cita.fechaCita,
        cita.horaCita,
        doctor.nombreD as nombreDoctor,
        doctor.apellidoPD as apellidoPDoctor,
        doctor.apellidoMD as apellidoMDoctor,
        doctor.especialidad,
        consultorioDoctor.horaDeEntrada,
        consultorioDoctor.horaDeSalida
    ');
    $builder->join('cita', 'cita.idCita = citaUsuario.idCita');
    $builder->join('consultorioDoctor', 'consultorioDoctor.id = cita.id');
    $builder->join('doctor', 'doctor.idDoctor = consultorioDoctor.idDoctor');
    $builder->where('citaUsuario.idUsuario', $idUsuario);
    $builder->where('citaUsuario.deleted_at IS NULL');
    $query = $builder->get();

    // Obtener los resultados
    $data['citas'] = $query->getResult();

    // Cargar la vista con los datos
    return view('head') .
        view('menu') .
        view('cita/usuario_citas', $data) .
        view('footer');
}

}
