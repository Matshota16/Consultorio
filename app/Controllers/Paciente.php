<?php

namespace App\Controllers;

class Paciente extends BaseController
{
    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];

    public function __construct()
    {
        // Verifica la autenticación en cada método
        $this->checkAuth();
    }

    private function checkAuth()
    {
        $session = session();
        if (!$session->has('logged_in')) {
            // Redirigir al login si no está autenticado
            return redirect()->to(base_url('/usuario'))->send();
        }
    }

    public function index()
    {
        $session = session();
        if ($session->get('logged_in') != true || $session->get('tipo') != 0) {
            return redirect()->to(base_url('/usuario/salir')); // Llamar a la función salir
        }
        $pacienteM = model('PacienteM');
        $data['paciente'] = $pacienteM->findAll(); // Obtener todos los pacientes
        return view('head') .
            view('menu') .
            view('paciente/show', $data) .
            view('footer');
    }

    public function add()
    {
        $session = session();
        if ($session->get('logged_in') != true || $session->get('tipo') != 0) {
            return redirect()->to(base_url('/usuario/salir')); // Llamar a la función salir
        }
        return view('head') .
            view('menu') .
            view('paciente/add') . // No se pasa lastDireccion ni idDireccion
            view('footer');
    }

    public function edit($idPaciente)
    {
        $session = session();
        if ($session->get('logged_in') != true || $session->get('tipo') != 0) {
            return redirect()->to(base_url('/usuario/salir')); // Llamar a la función salir
        }
        $pacienteM = model('PacienteM');
        $data['paciente'] = $pacienteM->where('idPaciente', $idPaciente)->findAll();
        $data['idPaciente'] = $idPaciente;
        return view('head') .
            view('menu') .
            view('paciente/edit', $data) .
            view('footer');
    }

    public function update()
    {
        $pacienteM = model('PacienteM');
        $idPaciente = $_POST['idPaciente'];

        if (!$this->request->is('post')) {
            $this->index();
        }

        // Reglas de validación
        $rules = [
            'nombreP' => 'required',
            'apellidoPP' => 'required',
            'apellidoMP' => 'required',
            'curp' => 'required',
            'numeroDeSeguridadSocial' => 'required',
            'fechaDeNacimiento' => 'required',
            'telefono' => 'required',
            'genero' => 'required',
            'alergias' => 'permit_empty' // Permitir vacío si no es obligatorio
        ];

        $data = [
            'nombreP' => $_POST['nombreP'],
            'apellidoPP' => $_POST['apellidoPP'],
            'apellidoMP' => $_POST['apellidoMP'],
            'curp' => $_POST['curp'],
            'numeroDeSeguridadSocial' => $_POST['numeroDeSeguridadSocial'],
            'fechaDeNacimiento' => $_POST['fechaDeNacimiento'],
            'telefono' => $_POST['telefono'],
            'genero' => $_POST['genero'],
            'alergias' => $_POST['alergias'] ?? ''
        ];

        if (!$this->validate($rules)) {
            // Si la validación falla, vuelve a cargar la vista con los errores
            return view('head') .
                view('menu') .
                view('paciente/edit', [
                    'validation' => $this->validator
                ]) .
                view('footer');
        } else {
            $pacienteM = model('PacienteM');
            $pacienteM->set($data)->where('idPaciente', $idPaciente)->update();
            return redirect()->to(base_url('/paciente'));
        }
    }

    public function insert()
    {
        if (!$this->request->is('post')) {
            $this->index();
        }

        // Reglas de validación
        $rules = [
            'nombreP' => 'required',
            'apellidoPP' => 'required',
            'apellidoMP' => 'required',
            'curp' => 'required',
            'numeroDeSeguridadSocial' => 'required',
            'fechaDeNacimiento' => 'required',
            'telefono' => 'required',
            'genero' => 'required',
            'alergias' => 'permit_empty' // Permitir vacío si no es obligatorio
        ];

        $data = [
            'nombreP' => $_POST['nombreP'],
            'apellidoPP' => $_POST['apellidoPP'],
            'apellidoMP' => $_POST['apellidoMP'],
            'curp' => $_POST['curp'],
            'numeroDeSeguridadSocial' => $_POST['numeroDeSeguridadSocial'],
            'fechaDeNacimiento' => $_POST['fechaDeNacimiento'],
            'telefono' => $_POST['telefono'],
            'genero' => $_POST['genero'],
            'alergias' => $_POST['alergias']
        ];

        if (!$this->validate($rules)) {
            return view('head') .
                view('menu') .
                view('paciente/add', [
                    'validation' => $this->validator
                ]) .
                view('footer');
        } else {
            $pacienteM = model('PacienteM');
            $pacienteM->insert($data);
            return redirect()->to(base_url('/paciente'));
        }
    }

    public function delete($idPaciente)
    {
        $pacienteM = model('PacienteM');
        $pacienteM->delete($idPaciente);
        return redirect()->to(base_url('/paciente'));
    }

    public function insertFromSession()
    {
        $session = session();

        // Validar sesión activa
        if (!$session->has('logged_in') || !$session->get('logged_in')) {
            return redirect()->to(base_url('/usuario/salir'));
        }

        // Obtener datos del usuario logueado desde la sesión
        $idUsuario = $session->get('idUsuario');
        $data = [
            'nombreP' => $session->get('nombre'),
            'apellidoPP' => $session->get('apellidoPaterno'),
            'apellidoMP' => $session->get('apellidoMaterno'),
            'curp' => $session->get('curp'),
            'numeroDeSeguridadSocial' => $session->get('numeroDeSeguridadSocial'),
            'fechaDeNacimiento' => $session->get('fechaDeNacimiento'),
            'telefono' => $session->get('telefono'),
            'genero' => $session->get('genero'),
            'alergias' => $session->get('alergias') ?? '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Insertar paciente en la tabla `paciente`
        $pacienteM = new \App\Models\PacienteM();
        $pacienteId = $pacienteM->insert($data);

        if (!$pacienteId) {
            return redirect()->back()->with('errors', $pacienteM->errors());
        }

        // Redirigir al formulario de citas con el ID del paciente recién agregado
        return redirect()->back()->with('success', 'Paciente agregado exitosamente.');
    }
}
