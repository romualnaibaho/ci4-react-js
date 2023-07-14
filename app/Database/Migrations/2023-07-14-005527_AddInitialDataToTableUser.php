<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddInitialDataToTableUser extends Migration
{
    public function up()
    {
        $data = [
            [
                'eud_rd_id' => 1,
                'eud_fullname' => 'ADAM LEVINE',
                'eud_email' => 'adam.levine@gmail.com',
                'eud_password' => password_hash('adamlevine23', PASSWORD_DEFAULT),
                'eud_salutation' => 'Mr.',
                'eud_gender' => 'M',
                'eud_is_active' => 'N'
            ],
            [
                'eud_rd_id' => 2,
                'eud_fullname' => 'TAYLOR SWIFT',
                'eud_email' => 'taylor.swift13@gmail.com',
                'eud_password' => password_hash('taylorswift13', PASSWORD_DEFAULT),
                'eud_salutation' => 'Ms.',
                'eud_gender' => 'F',
                'eud_is_active' => 'N'
            ]
        ];

        $this->db->table('eksternal_user_data')->insertBatch($data);
    }

    public function down()
    {
        //
    }
}
