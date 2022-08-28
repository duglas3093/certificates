<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Entities\UserInfo;

class Register extends BaseController
{
    protected $configs;

    public function __construct(){
        $this->configs = config('Blog');
    }

    public function index(){
        $model = model('CountriesModel');
        // return view('Auth/register',[
        //     'countries' => $model->findAll()
        // ]);
        return view('Auth/register');
        // $data['countries'] = $model->findAll();
        // return view('Auth/register',$data);
    }

    public function store()
    {
        $validation = service('validation');
        $validation->setRules([
            'user_name'          => 'required|alpha_space',
            'user_lastname'      => 'required|alpha_space',
            'user_email'         => 'required|valid_email|is_unique[users.user_email]',
            'user_login'         => 'required|is_unique[users.user_login]',
            'user_password'      => 'required|matches[c-password]'
        ]);
        
        if (!$validation->withRequest($this->request)->run()){
            // dd($validation->getErrors());
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());//regresa todos los errores encontrados 
        }
        
        // $data = [
        //     'email'=>'dqwdqwfwedqw@gmail.com',
        //     'password'=>'panda31',
        //     'name'=>'dqwdqdqfwefwdwqw',
        //     'surname'=>'Qdqw12312wwq',
        //     'id_country'=>12
        // ];
        
        $user = new User($this->request->getPost());
        // $user->generat   eUsername();
        $model = model('UsersModel');
        // $model->withGroup($this->configs->defaultGroupUsers);
        $model->withRol('admin');

        // $userInfo = new UserInfo($this->request->getPost());
        // $model->addInfoUser($userInfo);

        $model->save($user);
        
        // d($user->username);
        // d($this->configs);

        // $data['test']=  "Mandando dato desde controlador";
        return redirect()->route('login')->with('msg',[
            'type' => 'success',
            'body' => 'Usuario registrado con exito!'
            
        ]);
    }
}
