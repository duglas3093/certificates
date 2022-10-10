<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Course as EntitiesCourse;
use CodeIgniter\Exceptions\PageNotFoundException;

class Course extends BaseController{
    private const PAGINATION = 10;
    private const STATUS = 4;

    public function index(){
        $data['session'] = session()->get();
        $courseModel = model('CoursesModel');
        $data['courses'] = $courseModel->where('status_id',self::STATUS)->paginate(self::PAGINATION);
        $data['pager'] = $courseModel->pager;
        return view('admin/course/index',$data);
    }

    public function add(){
        $data['session'] = session()->get();
        return view('admin/course/add',$data);
    }

    public function edit(int $course_id){
        $courseModel = model('CoursesModel');
        if(!$data['course'] = $courseModel->where('course_id', $course_id)->first()){
            throw PageNotFoundException::forPageNotFound();
        }
        $data['session'] = session()->get();
        $statusModel = model('StatusModel');
        $data['status'] = $statusModel->where('status_code',1)->findAll();
        return view('admin/course/edit',$data);
    }

    public function store(){
        $validation = service('validation');
        $validation->setRules([
            'course_name'   => 'required|alpha_space',
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }
        $formCourse = $this->request->getPost();
        $register = [
            'status_id'     => 1,//1 active
            'user_id'       => (int)session()->get()['user_id']
        ];

        $courseData = array_merge($formCourse,$register);
        $courses = new EntitiesCourse($courseData);
        $model = model('CoursesModel');
        $model->save($courses);
        return redirect()->route('admin/students')->with('msg',[
            'type' => 'success',
            'body' => 'Curso registrado con exito!'
        ]);
    }

    public function update(){
        $validation = service('validation');
        $validation->setRules([
            'course_id'             => 'required|is_not_unique[courses.course_id]',
            'course_name'           => 'required|alpha_space',
        ]);
        
        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }
        
        $model = model('CoursesModel');
        if(!$model->where('course_id', (int)trim($this->request->getVar('course_id')))->first()){
            throw PageNotFoundException::forPageNotFound();
        }

        $model->save([
            'course_id'            => trim($this->request->getVar('course_id')),
            'course_name'          => trim($this->request->getVar('course_name')),
        ]);
        return redirect()->route('admin/courses')->with('msg',[
            'type' => 'success',
            'body' => 'El curso se ha actualizado con exito!'
        ]);
    }

    public function delete() {
        $courseId = intval($this->request->getPost('course_id'));
        $course = [
            'course_id' => $courseId,
            'status'    => 4
        ];
        $model = model('CoursesModel');

        $model->save($course);
        echo json_encode("ok");
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
