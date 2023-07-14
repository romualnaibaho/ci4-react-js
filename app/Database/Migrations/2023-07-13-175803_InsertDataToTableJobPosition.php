<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InsertDataToTableJobPosition extends Migration
{
    public function up()
    {
        $data = [
            [
                'mjp_slug' => 'direktur',
                'mjp_name' => 'DIREKTUR'
            ],
            [
                'mjp_slug' => 'manajer',
                'mjp_name' => 'MANAJER'
            ],
            [
                'mjp_slug' => 'staff',
                'mjp_name' => 'STAFF'
            ],
        ];

        $this->db->table('mr_job_position')->insertBatch($data);
    }

    public function down()
    {
        //
    }
}
