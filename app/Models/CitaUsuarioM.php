<?php

namespace App\Models;

use CodeIgniter\Model;

class CitaUsuarioM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'citaUsuario';
    protected $primaryKey       = 'idCitaUsuario';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idUsuario', 'idCita'];

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

    public function getCitasPorUsuario($idUsuario)
    {
        return $this->db->table($this->table)
            ->select('
                cita.motivo,
                cita.fechaCita,
                cita.horaCita,
                cita.idCita,
                doctor.nombreD as nombreDoctor,
                doctor.apellidoPD as apellidoPDoctor,
                doctor.apellidoMD as apellidoMDoctor,
                doctor.especialidad
            ')
            ->join('cita', 'cita.idCita = citaUsuario.idCita')
            ->join('consultorioDoctor', 'consultorioDoctor.id = cita.id')
            ->join('doctor', 'doctor.idDoctor = consultorioDoctor.idDoctor')
            ->where('citaUsuario.idUsuario', $idUsuario)
            ->where('citaUsuario.deleted_at IS NULL')
            ->get()
            ->getResult();
    }
}
