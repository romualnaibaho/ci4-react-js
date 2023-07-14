<?php

namespace App\Models;

use CodeIgniter\Model;

class Employee extends Model
{
    protected $table            = 'internal_user_data';
    protected $primaryKey       = 'iud_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'iud_fullname',
        'iud_rd_id',
        'iud_email',
        'iud_password',
        'iud_salutation',
        'iud_gender',
        'iud_profile_pic',
        'iud_position',
        'iud_job_level',
        'iud_employment_type',
        'iud_is_active',
        'iud_active_date',
        'iud_updated_date'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'iud_created_date';
    protected $updatedField  = 'iud_updated_date';
    protected $deletedField  = 'iud_deleted_date';
}
