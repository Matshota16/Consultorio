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

    public function getCitasConDoctor()
{
    $db = \Config\Database::connect();
    $sql = "
        SELECT 
            c.idCita, c.motivo, c.fechaCita, c.horaCita,
            p.nombreP, p.apellidoPP, p.apellidoMP,
            d.nombreD, d.apellidoPD, d.apellidoMD,
            cd.horaDeEntrada, cd.horaDeSalida,
            con.nombreConsultorio
        FROM cita c
        INNER JOIN paciente p ON c.idPaciente = p.idPaciente
        INNER JOIN consultorioDoctor cd ON c.id = cd.id
        INNER JOIN doctor d ON cd.idDoctor = d.idDoctor
        INNER JOIN consultorio con ON cd.idConsultorio = con.idConsultorio
    ";
    $query = $db->query($sql);
    return $query->getResult();
}

    

    
}
