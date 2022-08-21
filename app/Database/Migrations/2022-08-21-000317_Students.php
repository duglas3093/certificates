<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Students extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'student_id'=>[
                'type'          =>'INT',
                'constraint'    =>12,
                'unsigned'      =>true,
                'auto_increment'=>true,
                'null'          =>false,
            ],
            'student_name'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'60',
                'null'          =>false,
            ],
            'student_lastname'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'60',
                'null'          =>false,
            ],
            'student_ci'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'15',
                'null'          =>false,
            ],
            'student_cicomplement'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'6',
                'null'          =>false,
            ],
            'student_celphone'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'10',
                'null'          =>false,
            ],
            'student_email'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'150',
                'null'          =>false,
            ],
            'gender_id'=>[
                'type'          =>'INT',
                'constraint'    =>12,
                'null'          =>false,
            ],
            'user_id'=>[
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

        $this->forge->addKey('student_id',true);
        $this->forge->createTable('students');
    }

    public function down()
    {
        $this->forge->dropTable('students');
    }
}
