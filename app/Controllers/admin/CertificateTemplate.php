<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class CertificateTemplate extends BaseController{
    
    private const PAGINATION = 10;
    
    public function index(){
        $data['session'] = session()->get();
        $templateModel = model('CertificateTemplateModel');
        $data['templates'] = $templateModel->paginate(self::PAGINATION);
        $data['pager'] = $templateModel->pager;
        return view('admin/certificateTemplate/index',$data);
    }

    public function add(){
        $data['session'] = session()->get();
        $certificateTypesModel = model('CertificateTypesModel');
        $data['types'] = $certificateTypesModel->findAll();
        
        return view('admin/certificateTemplate/add',$data);
    }

    public function edit(int $student_id){
        $studentModel = model('StudentsModel');
        if(!$data['template'] = $studentModel->where('student_id', $student_id)->first()){
            throw PageNotFoundException::forPageNotFound();
        }
        $data['session'] = session()->get();
        $generesModel = model('CertificateTypesModel');
        $data['generes'] = $generesModel->findAll();
        $statusModel = model('StatusModel');
        $data['status'] = $statusModel->where('status_code',1)->findAll();
        return view('admin/certificateTemplate/edit',$data);
    }

    public function store(){
        $validation = service('validation');
        $validation->setRules([
            'student_name'          => 'required|alpha_space',
            'student_lastname'      => 'required|alpha_space',
            'student_ci'            => 'required|is_unique[students.student_ci]|integer',
            'student_celphone'      => 'required_with[student_celphone]',
            'student_email'         => 'required_with[student_email]',
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }
        $formStudent = $this->request->getPost();
        $register = [
            'student_photo' => $this->_upload(),
            'status_id'     => 1,//1 active
            'user_id'       => (int)session()->get()['user_id']
        ];

        $studentData = array_merge($formStudent,$register);
        $student = new EntitiesStudent($studentData);
        $model = model('StudentsModel');

        $model->save($student);
        return redirect()->route('admin/students')->with('msg',[
            'type' => 'success',
            'body' => 'Estudiante registrado con exito!'
        ]);
    }

    public function update(){
        $validation = service('validation');
        $validation->setRules([
            'student_id'          => 'required|is_not_unique[students.student_id]',
            'student_name'          => 'required|alpha_space',
            'student_lastname'      => 'required|alpha_space',
            'student_ci'            => 'required|integer',
            'student_email'         => 'required_with[student_email]',
        ]);
        
        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }
        
        $model = model('StudentsModel');
        if(!$model->where('student_id', (int)trim($this->request->getVar('student_id')))->first()){
            throw PageNotFoundException::forPageNotFound();
        }

        $loadImage = $this->_upload();

        $model->save([
            'student_id'            => trim($this->request->getVar('student_id')),
            'student_name'          => trim($this->request->getVar('student_name')),
            'student_lastname'      => trim($this->request->getVar('student_lastname')),
            'student_ci'            => trim($this->request->getVar('student_ci')),
            'student_cicomplement'  => trim($this->request->getVar('student_cicomplement')),
            'student_celphone'      => trim($this->request->getVar('student_celphone')),
            'genere_id'             => trim($this->request->getVar('genere_id')),
            'student_email'         => trim($this->request->getVar('student_email')),
            'status_id'             => (int)trim($this->request->getVar('status_id')),
            'student_photo'         => $loadImage
        ]);
        return redirect()->route('admin/students')->with('msg',[
            'type' => 'success',
            'body' => 'El estudiante se ha actualizado con exito!'
        ]);
    }

    private function _upload(){
        $newName = "";
        if ($imageFile = $this->request->getFile('student_photo')) {
            if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                $newName = $imageFile->getRandomName();
                // $imageFile->move(WRITEPATH."uploads/images/students/",$newName);
                $imageFile->move(ROOTPATH."public/uploads/images/students/",$newName);
            }
        }
        return $newName;
    }
}
