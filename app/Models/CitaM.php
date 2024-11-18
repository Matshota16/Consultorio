<?php

namespace App\Models;

use CodeIgniter\Model;

class CitaM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cita';
    protected $primaryKey       = 'idCita';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['motivo', 'fechaCita', 'horaCita', 'idPaciente', 'id'];

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

    public function getInformacion(){
        $db = db_connect();

        $sql= "select cita.*, consultorioDoctor.*, paciente.*
                from cita, consultorioDoctor, paciente
                where cita.id = consultorioDoctor.id and cita.idPaciente = paciente.idPaciente
        ";
        $query= $db->query($sql);

       
        return $query->getResult();

    }

    

    
}
