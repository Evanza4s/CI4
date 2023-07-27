<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Berita extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'slug'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'title'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'subtitle'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'writer'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'image'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'content'       => [
                'type'           => 'TEXT',
            ],
            'status'       => [
                'type'              => 'ENUM',
                'constraint'        => "'active','inactive','completed','scheduled','pending'"
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'current_timestamp'           => true,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'current_timestamp'           => true,
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('berita');
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('berita');
    }
}
