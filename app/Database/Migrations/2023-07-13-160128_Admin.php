<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'oud_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'oud_fullname' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'oud_email' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'oud_password' => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
            'oud_user_type' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'oud_created_date datetime default current_timestamp',
            'oud_updated_date datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('oud_id', true);
        $this->forge->createTable('office_user_data');
    }

    public function down()
    {
        $this->forge->dropTable('office_user_data');
    }
}
