<?php

namespace App\Models;

use CodeIgniter\Model;

class UserType extends Model
{
    protected $table            = 'mr_user_type';
    protected $primaryKey       = 'mut_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'mut_created_date';
    protected $updatedField  = 'mut_updated_date';
}
