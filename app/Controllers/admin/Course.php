<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Course as EntitiesCourse;
use CodeIgniter\Exceptions\PageNotFoundException;

class Course extends BaseController{
    private const PAGINATION = 10;
    private const STATUS = 1;

    public function index(){
        $data['session'] = session()->get();
        $courseModel = model('CoursesModel');
        $data['courses'] = $courseModel
                            ->join('instructor i','i.instructor_id = courses.instructor_id','LEFT')
                            ->join('status s','s.status_id = courses.status_id','LEFT')
                            ->join('categories c','c.category_id = courses.category_id','LEFT')
                            ->select('courses.*,i.instructor_name,s.status_description,c.category_description')
                            ->where('courses.status_id',self::STATUS)
                            ->paginate(self::PAGINATION);
        $data['pager'] = $courseModel->pager;
        return view('admin/course/index',$data);
    }

    public function add(){
        $data['session'] = session()->get();
        $instructorModel = model('InstructorModel');
        $data['instructors'] = $instructorModel->where('status_id', '1')->findAll();
        $categoryModel = model('CategoriesModel');
        $data['categories'] = $categoryModel->findAll();
        return view('admin/course/add',$data);
    }

    public function edit(int $course_id){
        $courseModel = model('CoursesModel');
        if(!$data['course'] = $courseModel->where('course_id', $course_id)->first()){
            throw PageNotFoundException::forPageNotFound();
        }
        $instructorModel = model('InstructorModel');
        $data['instructors'] = $instructorModel->where('status_id', '1')->findAll();
        $categoryModel = model('CategoriesModel');
        $data['categories'] = $categoryModel->findAll();
        $data['session'] = session()->get();
        $statusModel = model('StatusModel');
        $data['status'] = $statusModel->where('status_code',1)->findAll();
        return view('admin/course/edit',$data);
    }

    public function store(){
        $validation = service('validation');
        $validation->setRules([
            'course_name'           => 'required|alpha_space',
            'course_description'    => 'required',
            'course_stardate'       => 'required',
            'course_enddate'        => 'required',
            'category_id'           => 'required',
            'instructor_id'         => 'required',
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }
        $formCourse = $this->request->getPost();
        $register = [
            'status_id'     => 1,//1 active
            // 'user_id'       => (int)session()->get()['user_id']
        ];

        $courseData = array_merge($formCourse,$register);
        $courses = new EntitiesCourse($courseData);
        $model = model('CoursesModel');
        $model->insert($courses);
        $this->createCourseCertificateTemplate($model->getInsertID());
        return redirect()->route('admin/courses')->with('msg',[
            'type' => 'success',
            'body' => 'Curso registrado con exito!'
        ]);
    }

    public function update(){
        $validation = service('validation');
        $validation->setRules([
            'course_id'             => 'required|is_not_unique[courses.course_id]',
            'course_name'           => 'required|alpha_space',
            'course_description'    => 'required|alpha_space',
            'course_stardate'       => 'required',
            'course_enddate'        => 'required',
            'category_id'           => 'required',
            'instructor_id'         => 'required',
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
            'course_description'   => trim($this->request->getVar('course_description')),
            'course_stardate'      => trim($this->request->getVar('course_stardate')),
            'course_enddate'       => trim($this->request->getVar('course_enddate')),
            'category_id'          => trim($this->request->getVar('category_id')),
            'instructor_id'        => trim($this->request->getVar('instructor_id')),
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
    
    private function createCourseCertificateTemplate(int $course_id){
        $templateModel = model('CertificateTemplateModel');
        $template = [
            'certificatetem_title' => 'Certificado',
            'certificatetem_description' => '',
            'certificatetem_template' => 1,
            'certificatetem_background' => 'certificate_default.png',
            'course_id' => $course_id,
        ];
        $templateModel->save($template);
    }

    public function courseCertificate(int $course_id){
        $data['session'] = session()->get();
        $templateModel = model('CertificateTemplateModel');
        $data['template'] = $templateModel->select('certificate_template.*,c.course_name')
                                        ->join('courses c','c.course_id = certificate_template.course_id','LEFT')
                                        ->where('certificate_template.course_id', $course_id)
                                        ->first();
        if(!$data['template']){
            throw PageNotFoundException::forPageNotFound();
        }
        
        return view('admin/course/certificateTemplate',$data);
    }
    
    public function updateCertificateTemplate(){
        $validation = service('validation');
        $validation->setRules([
            'course_id'                      => 'required',
            'certificatetem_id'              => 'required',
            'certificatetem_title'           => 'required|alpha_space',
            'certificatetem_template'        => 'required',
        ]);
        
        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }
        
        $model = model('CertificateTemplateModel');
        if(!$model->where('certificatetem_id', (int)trim($this->request->getPost('certificatetem_id')))->first()){
            throw PageNotFoundException::forPageNotFound();
        }

        $template = [
            'certificatetem_id'             => $this->request->getPost('certificatetem_id'),
            'course_id'                     => trim($this->request->getVar('course_id')),
            'certificatetem_title'          => trim($this->request->getVar('certificatetem_title')),
            'certificatetem_description'    => trim($this->request->getVar('certificatetem_description')),
            'certificatetem_template'       => trim($this->request->getPost('certificatetem_template')),
        ];
        
        if($this->request->getFile('certificatetem_background') != ""){
            $loadImage = $this->_upload();
            $template_background = [ 'certificatetem_background'     => $loadImage  ];
            $template = array_merge($template,$template_background);
        }


        $model->save($template);
        return redirect()->route('admin/courses')->with('msg',[
            'type' => 'success',
            'body' => 'El certificado del curso se ha actualizado con exito!'
        ]);
    }
    
    private function _upload(){
        $newName = "";
        if ($imageFile = $this->request->getFile('certificatetem_background')) {
            if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                $newName = $imageFile->getRandomName();
                $imageFile->move(ROOTPATH."public/uploads/images/certificateBackground/",$newName);
            }
        }
        return $newName;
    }
}
