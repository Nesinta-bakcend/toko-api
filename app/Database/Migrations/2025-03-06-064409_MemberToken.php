<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MemberToken extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'member_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'auth_key' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
        ]);
        
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('member_id', 'member', 'id', 'CASCADE', 'NO ACTION');

        $this->forge->createTable('member_token');
    }

    public function down()
    {
        $this->forge->dropTable('member_token');
    }
}
