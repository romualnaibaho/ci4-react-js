<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'eud_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'eud_rd_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'eud_fullname' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'eud_email' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'eud_password' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'eud_salutation' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
                'null'       => false,
            ],
            'eud_gender' => [
                'type'       => 'CHAR',
                'constraint' => '5',
                'null'       => false,
            ],
            'eud_is_active' => [
                'type'       => 'CHAR',
                'constraint' => '5',
                'null'       => false,
            ],
            'eud_active_date datetime',
            'eud_deleted_date datetime',
            'eud_created_date datetime default current_timestamp',
            'eud_updated_date datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('eud_id', true);
        $this->forge->addForeignKey('eud_rd_id', 'registration_data', 'rd_id');
        $this->forge->createTable('eksternal_user_data');
    }

    public function down()
    {
        $this->forge->dropTable('eksternal_user_data');
    }
}
