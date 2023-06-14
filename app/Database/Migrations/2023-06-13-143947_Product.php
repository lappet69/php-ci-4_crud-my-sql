<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_produk' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            // 'no' => [
            //     'type'           => 'INT',

            // ],
            // 'id_produk' => [
            //     'type'           => 'INT',
            //     'null' => true,
            // ],
            'nama_produk' => [
                'type'           => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'harga' => [
                'type' => 'DECIMAL',
                'constraint' => '20',
                'null' => true,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint'=> '100',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',

            ],
            'updated_at' => [
                'type' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_produk', true);
        $this->forge->createTable('product');
    }

    public function down()
    {
        $this->forge->dropTable('product');

    }
}
