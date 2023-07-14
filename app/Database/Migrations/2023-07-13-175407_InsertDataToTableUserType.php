<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InsertDataToTableUserType extends Migration
{
    public function up()
    {
        $data = [
            [
                'mut_slug' => 'pegawai-tetap',
                'mut_name' => 'PEGAWAI TETAP'
            ],
            [
                'mut_slug' => 'pegawai-kontrak',
                'mut_name' => 'PEGAWAI KONTRAK'
            ],
            [
                'mut_slug' => 'magang',
                'mut_name' => 'MAGANG'
            ],
        ];

        $this->db->table('mr_user_type')->insertBatch($data);
    }

    public function down()
    {
        //
    }
}
