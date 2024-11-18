<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultorioDoctorM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'consultoriodoctor';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idConsultorio', 'idDoctor', 'horaDeEntrada', 'horaDeSalida'];

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

    public function getInfo(){
        $db = db_connect();

        $sql= "select consultorioDoctor.*, consultorio.*, doctor.*
                from consultorioDoctor, consultorio, doctor
                where consultorioDoctor.idConsultorio = consultorio.idConsultorio and consultorioDoctor.idDoctor = doctor.idDoctor
        ";
        $query= $db->query($sql);

       
        return $query->getResult();

    }

    public function getDoctorsByConsultorio($idConsultorio)
    {
        $db = db_connect();

        // Consulta SQL
        $sql = "
            SELECT 
                consultorioDoctor.horaDeEntrada,
                consultorioDoctor.horaDeSalida,
                doctor.idDoctor,
                doctor.nombreD,
                doctor.apellidoPD,
                doctor.apellidoMD
            FROM 
                consultorioDoctor
            JOIN 
                doctor ON consultorioDoctor.idDoctor = doctor.idDoctor
            WHERE 
                consultorioDoctor.idConsultorio = ?
        ";

        // Ejecutar la consulta
        $query = $db->query($sql, [$idConsultorio]);

        // Retornar resultados
        return $query->getResult();
    }

}
