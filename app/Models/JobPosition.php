<?php

namespace App\Models;

use CodeIgniter\Model;

class JobPosition extends Model
{
    protected $table            = 'mr_job_position';
    protected $primaryKey       = 'mjp_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'mjp_created_date';
    protected $updatedField  = 'mjp_updated_date';
}
