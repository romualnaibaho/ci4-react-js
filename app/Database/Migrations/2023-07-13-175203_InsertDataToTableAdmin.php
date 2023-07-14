<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InsertDataToTableAdmin extends Migration
{
    public function up()
    {
        $data = [
            'oud_fullname' => 'ADMIN',
            'oud_email' => 'admin@lpi.co.id',
            'oud_password'  => password_hash('admin123', PASSWORD_DEFAULT),
            'oud_user_type' => 1
        ];

        $this->db->table('office_user_data')->insert($data);
    }

    public function down()
    {
        //
    }
}
