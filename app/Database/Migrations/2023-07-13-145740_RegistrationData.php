<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RegistrationData extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'rd_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'rd_fullname' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=>false,
            ],
            'rd_email' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null'=>false,
            ],
            'rd_registered_date datetime',
            'rd_created_date datetime default current_timestamp',
            'rd_updated_date datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('rd_id', true);
        $this->forge->createTable('registration_data');
    }

    public function down()
    {
        $this->forge->dropTable('registration_data');
    }
}
