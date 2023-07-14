<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table            = 'eksternal_user_data';
    protected $primaryKey       = 'eud_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'eud_fullname',
        'eud_email',
        'eud_password',
        'eud_salutation',
        'eud_gender',
        'eud_is_active',
        'eud_active_date',
        'eud_updated_date'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'eud_created_date';
    protected $updatedField  = 'eud_updated_date';
    protected $deletedField  = 'eud_deleted_date';
}
