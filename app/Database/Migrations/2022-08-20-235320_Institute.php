<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Institute extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'institute_id'=>[
                'type'          =>'INT',
                'constraint'    =>12,
                'unsigned'      =>true,
                'auto_increment'=>true,
                'null'          =>false,
            ],
            'institute_name'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'60',
                'null'          =>false,
            ],
            'institute_phone'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'10',
                'null'          =>false,
            ],
            'institute_address'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'150',
                'null'          =>false,
            ],
            'institute_representative'=>[
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

        $this->forge->addKey('institute_id',true);
        $this->forge->createTable('institute');
    }

    public function down()
    {
        $this->forge->dropTable('institute');
    }
}
