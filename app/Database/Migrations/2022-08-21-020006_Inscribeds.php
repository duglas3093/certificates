<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Inscribeds extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'inscribed_id'=>[
                'type'          =>'INT',
                'constraint'    =>12,
                'unsigned'      =>true,
                'auto_increment'=>true,
                'null'          =>false,
            ],
            'inscribed_qualification'=>[
                'type'          =>'INT',
                'constraint'    =>12,
                'null'          =>false,
            ],
            'student_id'=>[
                'type'          =>'INT',
                'constraint'    =>12,
                'null'          =>false,
            ],
            'course_id'=>[
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

        $this->forge->addKey('inscribed_id',true);
        $this->forge->createTable('inscribeds');
    }

    public function down()
    {
        $this->forge->dropTable('inscribeds');
    }
}
