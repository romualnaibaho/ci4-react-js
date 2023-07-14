<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddInitialDataToTableRegistrationData extends Migration
{
    public function up()
    {
        $data = [
            [
                'rd_fullname' => 'ADAM LEVINE',
                'rd_email' => 'adam.levine@gmail.com'
            ],
            [
                'rd_fullname' => 'TAYLOR SWIFT',
                'rd_email' => 'taylor.swift13@gmail.com'
            ]
        ];

        $this->db->table('registration_data')->insertBatch($data);
    }

    public function down()
    {
        //
    }
}
