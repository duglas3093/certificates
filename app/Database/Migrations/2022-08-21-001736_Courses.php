<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Courses extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'course_id'=>[
                'type'          =>'INT',
                'constraint'    =>12,
                'unsigned'      =>true,
                'auto_increment'=>true,
                'null'          =>false,
            ],
            'course_name'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'60',
                'null'          =>false,
            ],
            'course_objetive'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'60',
                'null'          =>false,
            ],
            'course_duration'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'15',
                'null'          =>false,
            ],
            'course_stardate'=>[
                'type'          =>'DATETIME',
                'null'          =>false,
            ],
            'course_enddate'=>[
                'type'          =>'DATETIME',
                'null'          =>false,
            ],
            'course_syllabus'=>[
                'type'          =>'TEXT',
                'null'          =>false,
            ],
            'course_instructor'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'150',
                'null'          =>false,
            ],
            'course_place'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'150',
                'null'          =>false,
            ],
            'course_qualifies'=>[
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
            'instructiontype_id'=>[
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

        $this->forge->addKey('course_id',true);
        $this->forge->createTable('courses');
    }

    public function down()
    {
        $this->forge->dropTable('courses');
    }
}
