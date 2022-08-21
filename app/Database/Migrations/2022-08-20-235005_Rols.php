<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rols extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'rol_id'=>[
                'type'          =>'INT',
                'constraint'    =>12,
                'unsigned'      =>true,
                'auto_increment'=>true,
                'null'          =>false,
            ],
            'rol_description'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'60',
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

        $this->forge->addKey('rol_id',true);
        $this->forge->createTable('rols');
    }

    public function down()
    {
        $this->forge->dropTable('rols');
    }
}
