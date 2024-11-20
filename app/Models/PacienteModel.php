<?php

namespace App\Models;

use CodeIgniter\Model;

class PacienteModel extends Model
{
    protected $table      = 'patient';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true; //autoincrement

    protected $returnType     = 'object'; //object
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id','names', 'surname', 'secondSurname', 'ci','gender','birthdate','temperature','updateTemp','bpm','updateBpm','rpm','updateRpm','spo2','updateSpo2','registerDate','lastUpdate','status'];

    /********************************** */
    public function obtenerDatos($id){
        $builder = $this->db->table('patient');
        $builder->select('IFNULL(temperature,0.0) AS temperatura, IFNULL(bpm,0) AS bpm, IFNULL(rpm,0) AS rpm,IFNULL(spo2,0) AS spo2');
        $builder->where('id', $id);
        $query = $builder->get();
        return $query->getResult();
    }
}