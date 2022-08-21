<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Generes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'genere_id'=>[
                'type'          =>'INT',
                'constraint'    =>12,
                'unsigned'      =>true,
                'auto_increment'=>true,
                'null'          =>false,
            ],
            'genere_description'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'30',
                'null'          =>false,
            ],
            'created_at'=>[
                'type'          =>'DATETIME',
                'null'          =>false,
            ],
            'updated_at'=>[
                'type'          =>'DATETIME',
                'null'          =>true,
            ]
        ]);

        $this->forge->addKey('genere_id',true);
        $this->forge->createTable('generes');
    }

    public function down()
    {
        $this->forge->dropTable('generes');
    }
}
