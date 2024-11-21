<?php

namespace App\Controllers;

use App\Models\ImagenM;

class imagen extends BaseController
{
    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];
    protected $ImagenM;

    public function valida()
    {
        $session = session();
        $session->has('logged_in');

        if ($session->has('logged_in')) {
            return redirect()->to(base_url('/usuario'));
        }

        print_r($_SESSION);
    }

    public function __construct()
    {
        $this->ImagenM = new ImagenM();
    }


    public function index(): string
    {
        return view('head') .
            view('menu') .
            view('imagen/imagen', ['errors' => []]) .
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
            view('imagen/imagen', ['errors' => []]) .
            view('footer');
    }

    public function upload()
    {
        $validationRule = [
            'imagen' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[imagen]',
                    'is_image[imagen]',
                    'mime_in[imagen,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[imagen,100]',
                    'max_dims[imagen,1024,768]',
                ],
            ],
        ];

        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return  view('head') .
                view('menu') .
                view('imagen/imagen', $data) .
                view('footer');
        }

        $img = $this->request->getFile('imagen');

        if (! $img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(WRITEPATH . 'uploads', $newName);

            // Guardar el nombre del archivo en la base de datos
            $this->ImagenM->insert(['nombreDelArchivo' => $newName]);

            return $this->response->redirect(site_url('/consultorio/add'));
        }

        $data = ['errors' => 'The file has already been moved.'];

        return  view('head') .
            view('menu') .
            view('imagen/imagen', $data) .
            view('footer');
    }

    public function viewFiles()
    {
        $data['files'] = $this->ImagenM->findAll();
        return view('view_files', $data);
    }

    public function getFile($idImagen)
    {
        // Buscar el archivo por su ID en la base de datos
        $fileRecord = $this->ImagenM->find($idImagen);

        if ($fileRecord) {
            $filepath = WRITEPATH . 'uploads/' . $fileRecord['nombreDelArchivo'];

            if (file_exists($filepath)) {
                return $this->response
                    ->setHeader('Content-Type', mime_content_type($filepath))
                    ->setHeader('Content-Disposition', 'inline; filename="' . $fileRecord['nombreDelArchivo'] . '"')
                    ->setBody(file_get_contents($filepath));
            }
        }

        return $this->response->setStatusCode(404, 'File Not Found');
    }






    public function delete($idDireccion)
    {

        $direccionM = model('DireccionM');
        $direccionM->delete($idDireccion);
        return redirect()->to(base_url('/paciente'));
    }
}
