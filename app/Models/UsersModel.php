<?php

namespace App\Models;

use App\Entities\UserInfo;
use CodeIgniter\Model;
use App\Entities\User;

class UsersModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    // protected $returnType       = 'array';
    protected $returnType       = User::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_name',
        'user_lastname',
        'user_email',
        'user_password',
        'user_login',
        'user_islogin',
        'rol_id',
        'status_id',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['addRol'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    protected $assignRol;
    protected $infoUser;

    protected function addRol($data){
        $data['data']['rol_id'] = $this->assignRol;
        return $data;
    }

    // devfreelance095@gmail.com
    // holamundo2022
    protected function storeUserInfo($data){
        $this->infoUser->is_user = $data['id'];
        $model = model('UsersInfoModel');
        $model->insert($this->infoUser);
    }


    public function withRol(string $rol){
        $row = $this->db->table('rols')
                        -> where('rol_description',$rol)
                        ->get()->getFirstRow();
        // d($row);
        if($row != null){
            $this->assignRol = $row->rol_id;
        }
    }

    public function addInfoUser(UserInfo $ui){
        $this->infoUser = $ui;
    }

    public function getUserBy(string $column, string $value){
        return $this->where($column, $value)->first();
    }
}
