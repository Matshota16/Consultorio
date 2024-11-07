<?php

namespace App\Controllers;

use App\Models\UploadModel;
use CodeIgniter\Files\File;

class Upload extends BaseController
{
    protected $helpers = ['form'];
    protected $uploadModel;

    public function __construct()
    {
        $this->uploadModel = new UploadModel();
    }

    public function index()
    {
        return view('upload_form', ['errors' => []]);
    }

    public function upload()
    {
        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userfile]',
                    'is_image[userfile]',
                    'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[userfile,100]',
                    'max_dims[userfile,1024,768]',
                ],
            ],
        ];

        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return view('upload_form', $data);
        }

        $img = $this->request->getFile('userfile');

        if (! $img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(WRITEPATH . 'uploads', $newName);

            // Guardar el nombre del archivo en la base de datos
            $this->uploadModel->insert(['filename' => $newName]);

            return $this->response->redirect(site_url('upload/viewFiles'));
        }

        $data = ['errors' => 'The file has already been moved.'];

        return view('upload_form', $data);
    }

    public function viewFiles()
    {
        $data['files'] = $this->uploadModel->findAll();
        return view('view_files', $data);
    }

    public function getFile($id)
    {
        // Buscar el archivo por su ID en la base de datos
        $fileRecord = $this->uploadModel->find($id);

        if ($fileRecord) {
            $filepath = WRITEPATH . 'uploads/' . $fileRecord['filename'];

            if (file_exists($filepath)) {
                return $this->response
                    ->setHeader('Content-Type', mime_content_type($filepath))
                    ->setHeader('Content-Disposition', 'inline; filename="' . $fileRecord['filename'] . '"')
                    ->setBody(file_get_contents($filepath));
            }
        }

        return $this->response->setStatusCode(404, 'File Not Found');
    }
}
