<?php

namespace App\Controllers;

use App\Models\CitaUsuarioM;
use App\Models\CitaM;

class CitaUsuario extends BaseController
{
    // Mostrar el formulario para agregar una cita
    public function formulario($idConsultorio)
    {
        $consultorioDoctorM = model('ConsultorioDoctorM');
        $pacienteM = model('PacienteM');

        // Obtener los doctores del consultorio
        $doctores = $consultorioDoctorM->getDoctorsByConsultorio($idConsultorio);

        // Obtener el último paciente registrado
        $lastPaciente = $pacienteM->getLastPaciente();

        // Preparar los datos para la vista
        $data = [
            'consultorioId' => $idConsultorio,
            'doctores' => $doctores,
            'lastPacienteId' => $lastPaciente->idPaciente ?? null,
            'lastPacienteData' => $lastPaciente,
        ];

        // Cargar la vista
        return view('Cliente/vistaCliente') .
            view('Cliente/cita_formulario', $data) .
            view('footer');
    }

    // Insertar una cita y asociarla al usuario logeado
    public function insert()
    {
        $session = session();

        // Validar sesión activa
        if (!$session->has('logged_in') || !$session->get('logged_in')) {
            return redirect()->to(base_url('/usuario/salir'));
        }

        $idUsuario = $session->get('idUsuario');

        // Validar los datos de entrada
        $rules = [
            'motivo' => 'required',
            'fechaCita' => 'required',
            'horaCita' => 'required',
            'id' => 'required' // ID del doctor
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $fechaCita = $_POST['fechaCita'];
        $horaCita = $_POST['horaCita'];
        $idDoctor = $_POST['id'];

        // Validar si ya existe una cita en la misma fecha, hora y con el mismo doctor
        $citaM = model('CitaM');
        $existingCita = $citaM->where([
            'fechaCita' => $fechaCita,
            'horaCita' => $horaCita,
            'id' => $idDoctor
        ])->first();

        if ($existingCita) {
            return redirect()->back()->with('error', 'Ya existe una cita agendada en esta fecha y hora con el doctor seleccionado.');
        }

        // Crear paciente si no existe
        $pacienteM = model('PacienteM');
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
        $pacienteM->insert($data);
        $lastInsertPaciente = $pacienteM->getInsertID();

        // Insertar cita en la tabla `cita`
        $citaData = [
            'motivo' => $_POST['motivo'],
            'fechaCita' => $fechaCita,
            'horaCita' => $horaCita,
            'idPaciente' => $lastInsertPaciente,
            'id' => $idDoctor,
        ];
        $citaId = $citaM->insert($citaData);

        // Asociar la cita al usuario en la tabla `citaUsuario`
        $citaUsuarioM = new CitaUsuarioM();
        $citaUsuarioM->insert([
            'idUsuario' => $idUsuario,
            'idCita' => $citaId,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(base_url('/citaUsuario/misCitas'))->with('success', 'Cita registrada con éxito.');
    }


    // Mostrar las citas del usuario logeado
    public function misCitas()
    {
        $session = session();

        if (!$session->has('logged_in') || !$session->get('logged_in')) {
            return redirect()->to(base_url('/usuario/salir'));
        }

        $idUsuario = $session->get('idUsuario');

        $citaUsuarioM = new CitaUsuarioM();
        $data['citas'] = $citaUsuarioM->getCitasPorUsuario($idUsuario);

        return view('Cliente/vistaCliente') .
            view('Cliente/misCitas', $data) .
            view('footer');
    }
}
