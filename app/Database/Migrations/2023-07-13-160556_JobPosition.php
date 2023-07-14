<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JobPosition extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'mjp_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'mjp_slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'mjp_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'mjp_desc' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'mjp_created_date datetime default current_timestamp',
            'mjp_updated_date datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('mjp_id', true);
        $this->forge->createTable('mr_job_position');
    }

    public function down()
    {
        $this->forge->dropTable('mr_job_position');
    }
}
