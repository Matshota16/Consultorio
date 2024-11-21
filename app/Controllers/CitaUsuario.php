<?php

namespace App\Controllers;

use App\Models\CitaUsuarioM;
use App\Models\CitaM;

class CitaUsuario extends BaseController
{
    // Mostrar el formulario para agregar una cita
    public function formulario($idConsultorio)
    {
        $consultorioDoctorM = new \App\Models\ConsultorioDoctorM();
        $pacienteM = new \App\Models\PacienteM();

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
            'idPaciente' => 'required',
            'id' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        // Insertar cita en la tabla `cita`
        $citaM = new \App\Models\CitaM();
        $citaData = [
            'motivo' => $this->request->getPost('motivo'),
            'fechaCita' => $this->request->getPost('fechaCita'),
            'horaCita' => $this->request->getPost('horaCita'),
            'idPaciente' => $this->request->getPost('idPaciente'),
            'id' => $this->request->getPost('id'),
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
