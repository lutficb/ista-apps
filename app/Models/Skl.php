<?php

namespace App\Models;

use CodeIgniter\Model;

class Skl extends Model
{
    protected $table            = 'skl';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'name_orang_tua', 'kelas', 'tahun_ajaran'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getAllSklHistories() {}
}
