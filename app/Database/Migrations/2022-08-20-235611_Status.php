<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Status extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'status_id'=>[
                'type'          =>'INT',
                'constraint'    =>12,
                'unsigned'      =>true,
                'auto_increment'=>true,
                'null'          =>false,
            ],
            'status_description'=>[
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

        $this->forge->addKey('status_id',true);
        $this->forge->createTable('status');
    }

    public function down()
    {
        $this->forge->dropTable('status');
    }
}
