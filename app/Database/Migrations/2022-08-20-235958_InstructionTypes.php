<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InstructionTypes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'instructiontype_id'=>[
                'type'          =>'INT',
                'constraint'    =>12,
                'unsigned'      =>true,
                'auto_increment'=>true,
                'null'          =>false,
            ],
            'instructiontype_description'=>[
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

        $this->forge->addKey('instructiontype_id',true);
        $this->forge->createTable('instruction_types');
    }

    public function down()
    {
        $this->forge->dropTable('instruction_types');
    }
}
