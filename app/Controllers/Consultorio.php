<?php

namespace App\Controllers;

class Consultorio extends BaseController
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
        $consultorioM = model('ConsultorioM');
        $data['consultorio'] = $consultorioM->getImagenConsultorio();

        return view('head') .
            view('menu') .
            view('consultorio/show', $data) .
            view('footer');
    }

    public function add()
    {
        $session = session();
        if ($session->get('logged_in') != true || $session->get('tipo') != 0) {
            return redirect()->to(base_url('/usuario/salir')); // Llamar a la función salir
        }

        $direccionM = model('DireccionM');
        $doctorM = model('DoctorM');

        $data['consultorio'] = $direccionM->findAll();
        $data['consultorio1'] = $doctorM->findAll();

        return view('head') .
            view('menu') .
            view('consultorio/add', $data) .
            view('footer');
    }

    public function edit($idConsultorio)
    {   //get
        $session = session();
        if ($session->get('logged_in') != true || $session->get('tipo') != 0) {
            return redirect()->to(base_url('/usuario/salir')); // Llamar a la función salir
        }
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
        $idConsultorio = $this->request->getPost('idConsultorio');

        // Validación
        $rules = [
            'nombreConsultorio' => 'required',
            'telefono' => 'required',
            'correoElectronico' => 'required',
            'horaDeApertura' => 'required',
            'horaDeCierre' => 'required',
            'idDireccion' => 'required',
            'maps' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Datos del formulario
        $data = [
            'nombreConsultorio' => $_POST['nombreConsultorio'],
            'telefono' => $_POST['telefono'],
            'correoElectronico' => $_POST['correoElectronico'],
            'horaDeApertura' => $this->request->getPost('horaDeApertura'),
            'horaDeCierre' => $this->request->getPost('horaDeCierre'),
            'idDireccion' => $this->request->getPost('idDireccion'),
            'maps' => $this->request->getPost('maps')
        ];

        // Manejo de la imagen
        $imagen = $this->request->getFile('imagen');
        if ($imagen && $imagen->isValid()) {
            $imagenModel = model('ImagenM');
            $idImagen = $imagenModel->saveFile($imagen); // Implementa la lógica para guardar la imagen
            $data['idImagen'] = $idImagen;
        } else {
            $data['idImagen'] = $this->request->getPost('idImagen'); // Mantiene la imagen actual
        }

        // Actualizar consultorio
        $consultorioM->update($idConsultorio, $data);
        return redirect()->to(base_url('/consultorio'));
    }


    public function insert()
    {
        // Validar que el método sea POST
        if (!$this->request->is('post')) {
            $this->index();
        }

        // Conectar a la base de datos
        $db = \Config\Database::connect();

        // Obtener el último idDireccion insertado
        $builder = $db->table('direccion');
        $builder->selectMax('idDireccion');
        $query = $builder->get();
        $lastDireccion = $query->getRow();

        // Obtener el último idImagen insertado
        $builder = $db->table('imagen');
        $builder->selectMax('idImagen');
        $query = $builder->get();
        $lastImagen = $query->getRow();

        // Reglas de validación
        $rules = [
            'calle' => 'required',
            'numero' => 'required',
            'codigoPostal' => 'required',
            'municipio' => 'required',
            'estado' => 'required',
            'nombreConsultorio' => 'required',
            'telefono' => 'required',
            'correoElectronico' => 'required',
            'horaDeApertura' => 'required',
            'horaDeCierre' => 'required',
            'maps' => 'required'
        ];

        $data = [
            'calle' => $_POST['calle'],
            'numero' => $_POST['numero'],
            'codigoPostal' => $_POST['codigoPostal'],
            'municipio' => $_POST['municipio'],
            'estado' => $_POST['estado']
        ];

        // Datos del formulario junto con lastDireccion y lastImagen
        $data1 = [
            'nombreConsultorio' => $_POST['nombreConsultorio'],
            'telefono' => $_POST['telefono'],
            'correoElectronico' => $_POST['correoElectronico'],
            'horaDeApertura' => $_POST['horaDeApertura'],
            'horaDeCierre' => $_POST['horaDeCierre'],
            'idDireccion' => $lastDireccion->idDireccion ?? null,
            'maps' => $_POST['maps'],
            'idImagen' => $lastImagen->idImagen ?? null
        ];

        // Validar los datos
        if (!$this->validate($rules)) {
            // Si la validación falla, vuelve a cargar la vista con los errores
            return view('head') .
                view('menu') .
                view('consultorio/add', [
                    'validation' => $this->validator
                ]) .
                view('footer');
        } else {
            // Insertar los datos en la base
            $direccionM = model('DireccionM');
            $direccionM->insert($data);
            $consultorioM = model('ConsultorioM');
            $consultorioM->insert($data1);

            // Redirigir a la lista de consultorios
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
        $data['cliente'] = $consultorioM->getImagenConsultorio();
        return view('Cliente/vistaCliente') .
            view('Cliente/Vista', $data);
    }

    public function verConsultorio($idConsultorio)
    {
        $consultorioM = model('ConsultorioM');
        $data['cliente'] = $consultorioM->getImagenConsultorio1($idConsultorio); // Filtra por idConsultorio en el método del modelo
        return view('Cliente/vistaCliente') .
            view('Cliente/verConsultorio', $data);
    }
    public function agendarCitaCliente()
    {

        return view('Cliente/vistaCliente') .
            view('Cliente/verConsultorio', $data);
    }
}
