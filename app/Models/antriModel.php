<?php

namespace App\Models;

use CodeIgniter\Model;

class antriModel extends Model
{
    protected $table            = 'antrian_bongkar';
    protected $primaryKey       = 'id_antri';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['pengirim', 'no_do', 'nama_supir', 'no_pol', 'no_hp', 'created_at', 'status'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $db;

    public function nowCounter()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('antrian_bongkar');
        $now = $builder->select('*')->where('status', "sedang bongkar")->limit(2)->orderBy('no_antrian ASC');
        return $now->get()->getResultArray();
    }
    public function lastCounter()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('antrian_bongkar');
        $now = $builder->select('*')->where('status', "selesai")->limit(2);
        return $now->get()->getResultArray();
    }
    public function nextCounter()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('antrian_bongkar');
        $now = $builder->select('*')->where('status', "menunggu")->orderBy('no_antrian ASC')->limit(1);
        return $now->get()->getResultArray();
    }
}
