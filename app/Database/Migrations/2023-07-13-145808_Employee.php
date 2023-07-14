<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Employee extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'iud_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'iud_rd_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'iud_fullname' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=>false,
            ],
            'iud_email' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null'=>false,
            ],
            'iud_password' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null'=>false,
            ],
            'iud_salutation' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null'=>false,
            ],
            'iud_gender' => [
                'type' => 'CHAR',
                'constraint' => '5',
                'null'=>false,
            ],
            'iud_profile_pic' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null'=>true,
            ],
            'iud_position' => [
                'type' => 'TINYINT',
                'constraint' => 3,
                'null'=>false,
            ],
            'iud_job_level' => [
                'type' => 'TINYINT',
                'constraint' => 3,
                'null'=>false,
            ],
            'iud_employment_type' => [
                'type' => 'TINYINT',
                'constraint' => 3,
                'null'=>false,
            ],
            'iud_is_active' => [
                'type' => 'CHAR',
                'constraint' => '5',
                'null'=>false,
            ],
            'iud_active_date datetime',
            'iud_deleted_date datetime',
            'iud_created_date datetime default current_timestamp',
            'iud_updated_date datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('iud_id', true);
        $this->forge->addForeignKey('iud_rd_id', 'registration_data', 'rd_id');
        $this->forge->createTable('internal_user_data');
    }

    public function down()
    {
        $this->forge->dropTable('internal_user_data');
    }
}
