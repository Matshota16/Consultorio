<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'usuario';
    protected $primaryKey       = 'idUsuario';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombre' , 'apellidoPaterno' , 'apellidoMaterno' , 'correoElectronico ', 'curp', 'numeroDeSeguridadSocial', 'fechaDeNacimiento', 'telefono','genero','alergias', 'pass', 'tipo'];

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


    public function valida($correoElectronico, $pass)
{
    $db = db_connect();
    $sql = "SELECT * 
            FROM usuario
            WHERE correoElectronico = ? AND pass = ?";
    $query = $db->query($sql, [$correoElectronico, $pass]);
    return $query->getResult();
}

    

}

