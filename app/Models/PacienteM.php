<?php

namespace App\Models;

use CodeIgniter\Model;

class PacienteM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'paciente';
    protected $primaryKey       = 'idPaciente';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombreP', 'apellidoPP', 'apellidoMP', 'curp', 'numeroDeSeguridadSocial', 'fechaDeNacimiento', 'telefono', 'genero', 'idDireccion', 'alergias'];

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

        $sql= "select paciente.*, direccion.estado
                from paciente,direccion 
                where paciente.idDireccion = direccion.idDireccion 
        ";
        $query= $db->query($sql);

       
        return $query->getResult();

    }
    public function getDireccion(){
        $db = db_connect();

        $sql= "select paciente.*, direccion.*
                from paciente,direccion 
                where paciente.idDireccion = direccion.idDireccion 
        ";
        $query= $db->query($sql);

       
        return $query->getResult();

    }
}
