<?php

namespace App\Controllers\Admin;

use App\Entities\Instructor as EntitiesInstructor;
use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Instructor extends BaseController
{
    private $session;
    private const PAGINATION = 10;
    private const STATUS = 4;

    public function __construct(){
        $session = session()->get();
    }

    public function index(){
        $data['session'] = session()->get();
        $instructorModel = model('InstructorModel');
        $data['instructors'] = $instructorModel
                                    ->join('status s', 's.status_id = instructor.status_id', 'LEFT')
                                    ->select('instructor.*, s.status_description')
                                    ->paginate(self::PAGINATION);
        $data['pager'] = $instructorModel->pager;
        return view('admin/instructor/index',$data);
        
    }
    
    public function add(){
        $data['session'] = session()->get();
        return view('admin/instructor/add',$data);
    }

    public function edit(int $instructor_id){
        $instructorModel = model('InstructorModel');
        if(!$data['instructor'] = $instructorModel->where('instructor_id', $instructor_id)->first()){
            throw PageNotFoundException::forPageNotFound();
        }
        $data['session'] = session()->get();
        $statusModel = model('StatusModel');
        $data['status'] = $statusModel->where('status_code',1)->findAll();
        return view('admin/instructor/edit',$data);
    }

    public function store(){
        $validation = service('validation');
        $validation->setRules([
            'instructor_name'          => 'required|alpha_space',
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }
        $formInstructor = $this->request->getPost();
        $register = [
            'status_id'     => 1,//1 active
        ];

        $instructorData = array_merge($formInstructor,$register);
        $instructor = new EntitiesInstructor($instructorData);
        $model = model('InstructorModel');

        $model->save($instructor);
        return redirect()->route('admin/instructors')->with('msg',[
            'type' => 'success',
            'body' => 'Estudiante registrado con exito!'
        ]);
    }

    public function update(){
        $validation = service('validation');
        $validation->setRules([
            'instructor_id'          => 'required|is_not_unique[students.student_id]',
            'instructor_name'        => 'required|alpha_space'
        ]);
        
        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }
        
        $model = model('InstructorModel');
        if(!$model->where('instructor_id', (int)trim($this->request->getVar('instructor_id')))->first()){
            throw PageNotFoundException::forPageNotFound();
        }

        $model->save([
            'instructor_id'     => trim($this->request->getVar('instructor_id')),
            'instructor_name'   => trim($this->request->getVar('instructor_name')),
            'status_id'         => (int)trim($this->request->getVar('status_id')),
        ]);

        return redirect()->route('admin/instructors')->with('msg',[
            'type' => 'success',
            'body' => 'El estudiante se ha actualizado con exito!'
        ]);
    }
}
