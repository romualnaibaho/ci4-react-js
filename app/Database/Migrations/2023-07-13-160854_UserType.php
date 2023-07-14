<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserType extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'mut_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'mut_slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'mut_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'mut_desc' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'mut_created_date datetime default current_timestamp',
            'mut_updated_date datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('mut_id', true);
        $this->forge->createTable('mr_user_type');
    }

    public function down()
    {
        $this->forge->dropTable('mr_user_type');
    }
}
