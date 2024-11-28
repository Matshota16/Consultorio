<?php

namespace App\Controllers;

class Doctor extends BaseController
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
        // Instanciar modelos
        $doctorM = model('DoctorM');
        $direccionM = model('DireccionM');

        // Obtener datos enviados por POST
        $idDoctor = $this->request->getPost('idDoctor');
        $idDireccion = $this->request->getPost('idDireccion');

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
            'fechaDeNacimiento' => 'required|valid_date',
            'telefono' => 'required|numeric',
            'genero' => 'required',
            'especialidad' => 'required',
            'cedulaProfecional' => 'required',
        ];

        // Datos de la dirección
        $direccionData = [
            'calle' => $_POST['calle'],
            'numero' => $_POST['numero'],
            'codigoPostal' => $_POST['codigoPostal'],
            'municipio' => $_POST['municipio'],
            'estado' => $_POST['estado'],
        ];

        // Datos del doctor
        $doctorData = [
            'nombreD' => $_POST['nombreD'],
            'apellidoPD' => $_POST['apellidoPD'],
            'apellidoMD' => $_POST['apellidoMD'],
            'curp' => $_POST['curp'],
            'fechaDeNacimiento' => $_POST['fechaDeNacimiento'],
            'telefono' => $_POST['telefono'],
            'genero' => $_POST['genero'],
            'especialidad' => $_POST['especialidad'],
            'cedulaProfecional' => $_POST['cedulaProfecional'],
            'idDireccion' => $idDireccion, // Dirección asociada
        ];

        // Validar datos
        if (!$this->validate($rules)) {
            // Si la validación falla, cargar vista con errores
            return view('head') .
                view('menu') .
                view('doctor/edit', [
                    'validation' => $this->validator,
                    'doctor' => $doctorM->where('idDoctor', $idDoctor)->first(),
                    'direccion' => $direccionM->where('idDireccion', $idDireccion)->first(),
                ]) .
                view('footer');
        }

        // Actualizar la dirección
        $direccionM->set($direccionData)->where('idDireccion', $idDireccion)->update();

        // Actualizar datos del doctor
        $doctorM->set($doctorData)->where('idDoctor', $idDoctor)->update();

        // Redirigir a la lista de doctores
        return redirect()->to(base_url('/doctor'))->with('message', 'Datos actualizados correctamente');
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
