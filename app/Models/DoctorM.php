<?php

namespace App\Models;

use CodeIgniter\Model;

class DoctorM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'doctor';
    protected $primaryKey       = 'idDoctor';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombreD', 'apellidoPD', 'apellidoMD', 'curp', 'fechaDeNacimiento', 'telefono', 'genero', 'especialidad', 'cedulaProfecional', 'idDireccion'];

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

    public function getProveedores(){
        $db = db_connect();

        $sql= "select doctor.*, doctor.estado
                from doctor,direccion 
                where doctor.idDireccion = direccion.idDireccion 
        ";
        $query= $db->query($sql);

       
        return $query->getResult();

    }
    public function getDireccion(){
        $db = db_connect();

        $sql= "select doctor.*, direccion.*
                from doctor,direccion 
                where doctor.idDireccion = direccion.idDireccion 
        ";
        $query= $db->query($sql);

       
        return $query->getResult();

    }
}
