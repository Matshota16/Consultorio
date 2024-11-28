<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultorioM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'consultorio';
    protected $primaryKey       = 'idConsultorio';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombreConsultorio', 'telefono', 'correoElectronico', 'horaDeApertura', 'horaDeCierre', 'idDireccion', 'maps', 'idImagen'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function getImagenConsultorio()
    {
        $db = db_connect();

        $sql = "select consultorio.*, imagen.*
                from consultorio, imagen 
                where consultorio.idImagen = imagen.idImagen 
        ";
        $query = $db->query($sql);


        return $query->getResult();
    }

    public function getImagenConsultorio1($idConsultorio)
    {
        return $this->select('consultorio.*, imagen.nombreDelArchivo, imagen.idImagen')
            ->join('imagen', 'imagen.idImagen = consultorio.idImagen', 'left')
            ->where('consultorio.idConsultorio', $idConsultorio)
            ->first();
    }

    public function getDireccionConsultorio()
    {
        $db = db_connect();

        $sql = "select consultorio.nombreConsultorio,direccion.* from consultorio join direccion on consultorio.idDireccion = direccion.idDireccion 
        ";
        $query = $db->query($sql);


        return $query->getResult();
    }
}
