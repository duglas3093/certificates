<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id'=>[
                'type'          =>'INT',
                'constraint'    =>12,
                'unsigned'      =>true,
                'auto_increment'=>true,
                'null'          =>false,
            ],
            'user_name'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'50',
                'null'          =>false,
            ],
            'user_lastname'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'50',
                'null'          =>false,
            ],
            'user_email'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'60',
                'null'          =>false,
            ],
            'user_password'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'60',
                'null'          =>false,
            ],
            'user_login'=>[
                'type'          =>'VARCHAR',
                'constraint'    =>'60',
                'null'          =>false,
            ],
            'rol_id'=>[
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
        $this->forge->addKey('user_id',true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
