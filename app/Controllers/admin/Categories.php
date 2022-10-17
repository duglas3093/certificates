<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Entities\Category;

class Categories extends BaseController
{
    private const PAGINATION = 10;
    private const STATUS = 1;

    public function index(){
        $data['session'] = session()->get();
        $courseModel = model('CategoriesModel');
        $data['categories'] = $courseModel->paginate(self::PAGINATION);
        $data['pager'] = $courseModel->pager;
        return view('admin/category/index',$data);
    }

    public function add(){
        $data['session'] = session()->get();
        return view('admin/category/add',$data);
    }

    public function edit(int $category_id){
        $categoryModel = model('CategoriesModel');
        if(!$data['category'] = $categoryModel->where('category_id', $category_id)->first()){
            throw PageNotFoundException::forPageNotFound();
        }
        $data['session'] = session()->get();
        return view('admin/category/edit',$data);
    }

    public function store(){
        $validation = service('validation');
        $validation->setRules([
            'category_description'  => 'required|alpha_space',
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }
        $formCategory = $this->request->getPost();

        $category = new Category($formCategory);
        $model = model('CategoriesModel');
        $model->save($category);
        return redirect()->route('admin/categories')->with('msg',[
            'type' => 'success',
            'body' => 'Curso registrado con exito!'
        ]);
    }

    public function update(){
        $validation = service('validation');
        $validation->setRules([
            'category_id'           => 'required|is_not_unique[categories.category_id]',
            'category_description'         => 'required|alpha_space',
        ]);
        
        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }
        
        $model = model('CategoriesModel');
        if(!$model->where('category_id', (int)trim($this->request->getVar('category_id')))->first()){
            throw PageNotFoundException::forPageNotFound();
        }

        $model->save([
            'category_id'            => trim($this->request->getVar('category_id')),
            'category_description'   => trim($this->request->getVar('category_description')),
        ]);
        return redirect()->route('admin/categories')->with('msg',[
            'type' => 'success',
            'body' => 'El curso se ha actualizado con exito!'
        ]);
    }

    public function delete() {
        $categoryId = intval($this->request->getPost('category_id'));
        $category = [
            'category_id' => $categoryId,
            'status'    => 4
        ];
        $model = model('CategoriesModel');

        $model->save($category);
        echo json_encode("ok");
    }
}
