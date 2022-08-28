<?php
namespace App\Entities;

use CodeIgniter\Entity;

class User extends Entity{
    protected $dates = ['created_at','updated_at'];

    protected function setPassword(string $password){
        $this->attributes['password'] = password_hash($password,PASSWORD_DEFAULT);
    }

    // public function generateUsername(){
    //     $this->attributes['user_login'] = explode(' ',$this->name)[0] . explode(' ',$this->surname)[0];
    // }

    public function getRole(){
        $model = model('RolsModel');
        return $model->where('rol_id',$this->rol_id)->first();
    }
}
