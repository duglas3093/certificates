<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CertificateModelo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'cetificatemodelo_id'=>[
                'type'          =>'INT',
                'constraint'    =>12,
                'unsigned'      =>true,
                'auto_increment'=>true,
                'null'          =>false,
            ],
            'cetificatemodelo_title'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'60',
                'null'          =>false,
            ],
            'cetificatemodelo_description'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'250',
                'null'          =>false,
            ],
            'cetificatemodelo_template'=>[
                'type'          =>'INT',
                'constraint'    =>12,
                'null'          =>false,
            ],
            'cetificatemodelo_background'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'150',
                'null'          =>false,
            ],
            'cetificatetype_id'=>[
                'type'          =>'INT',
                'constraint'    =>12,
                'null'          =>false,
            ],
            'user_id'=>[
                'type'          =>'INT',
                'constraint'    =>12,
                'null'          =>false,
            ],
            'status_id'=>[
                'type'          =>'INT',
                'constraint'    =>12,
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

        $this->forge->addKey('cetificatemodelo_id',true);
        $this->forge->createTable('cetificate_modelos');
    }

    public function down()
    {
        $this->forge->dropTable('cetificate_modelos');
    }
}
