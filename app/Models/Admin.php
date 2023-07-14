<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin extends Model
{
    protected $table            = 'office_user_data';
    protected $primaryKey       = 'oud_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'oud_id',
        'oud_fullname',
        'oud_email',
        'oud_password',
        'oud_user_type',

    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'oud_created_date';
    protected $updatedField  = 'oud_updated_date';
}
