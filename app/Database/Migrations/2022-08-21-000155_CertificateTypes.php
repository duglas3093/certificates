<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CertificateTypes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'certificatetype_id'=>[
                'type'          =>'INT',
                'constraint'    =>12,
                'unsigned'      =>true,
                'auto_increment'=>true,
                'null'          =>false,
            ],
            'certificatetype_description'=>[
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

        $this->forge->addKey('certificatetype_id',true);
        $this->forge->createTable('certificate_types');
    }

    public function down()
    {
        $this->forge->dropTable('certificate_types');
    }
}
