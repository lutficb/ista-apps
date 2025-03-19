<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Skt extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'name' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'name_orang_tua' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'kelas' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'tahun_ajaran' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'tanggungan' => [
                'type'              => 'VARCHAR',
                'constraint'        => 10000,
            ],
            'created_at' => [
                'type'              => 'DATETIME',
                'null'              => true
            ],
            'updated_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
            'deleted_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('skt');
    }

    public function down()
    {
        $this->forge->dropTable('skt');
    }
}
