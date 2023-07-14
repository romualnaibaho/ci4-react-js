<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrationData extends Model
{
    protected $table            = 'registration_data';
    protected $primaryKey       = 'rd_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'rd_id',
        'rd_fullname',
        'rd_email',
        'rd_registered_date'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'rd_created_date';
    protected $updatedField  = 'rd_updated_date';
}
