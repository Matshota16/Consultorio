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
    public function index(): string
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

        // Obtener el último idDireccion insertado
        $db = \Config\Database::connect();
        $builder = $db->table('direccion');
        $builder->selectMax('idDireccion');
        $query = $builder->get();
        $lastDireccion = $query->getRow();

        // Se obtiene el id de la imagen que se agrego

        $builder = $db->table('imagen');
        $builder->selectMax('idImagen');
        $query = $builder->get();
        $lastImagen = $query->getRow();

        // Asignar el último idDireccion y el ultimo idImagen a los datos pasados a la vista
        $data['lastDireccion'] = $lastDireccion->idDireccion ?? null;
        $data['lastImagen'] = $lastImagen->idImagen ?? null;
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
            'maps' => 'required',
            'idImagen' => 'required'
        ];
        $data = [
            'nombreConsultorio' => $_POST['nombreConsultorio'],
            'telefono' => $_POST['telefono'],
            'correoElectronico' => $_POST['correoElectronico'],
            'horaDeApertura' => $_POST['horaDeApertura'],
            'horaDeCierre' => $_POST['horaDeCierre'],
            'idDireccion' => $_POST['idDireccion'],
            'maps' => $_POST['maps'],
            'idImagen' => $_POST['idImagen']

        ];
        if (!$this->validate($rules)) {
            // Si la validación falla, vuelve a cargar la vista con los errores
            return view('head') .
                view('menu', $data1) .
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
            'maps' => 'required',
            'idImagen' => 'required'
        ];

        $data = [
            'nombreConsultorio' => $_POST['nombreConsultorio'],
            'telefono' => $_POST['telefono'],
            'correoElectronico' => $_POST['correoElectronico'],
            'horaDeApertura' => $_POST['horaDeApertura'],
            'horaDeCierre' => $_POST['horaDeCierre'],
            'idDireccion' => $_POST['idDireccion'],
            'maps' => $_POST['maps'],
            'idImagen' => $_POST['idImagen']

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


    public function verCliente()
    {

        return view('Cliente/vistaCliente');
    }

    public function agendarCitaCliente()
    {

        return view('Cliente/vistaCliente') .
            view('Cliente/verConsultorio', $data);
    }
}
