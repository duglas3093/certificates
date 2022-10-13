<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class CertificateType extends BaseController
{
    private const PAGINATION = 10;

    public function index(){
        $data['session'] = session()->get();
        $certificateTypeModel = model('CertificateTypesModel');
        $data['types'] = $certificateTypeModel->paginate(self::PAGINATION);
        $data['pager'] = $certificateTypeModel->pager;
        return view('admin/certificateType/index',$data);
    }

    public function add(){
        if($this->request){
            $typeDescription = $this->request->getPost('typeDescription');
            $type = [
                'certificatetype_description' => $typeDescription,
            ];
            $model = model('CertificateTypesModel');
    
            $model->save($type);
            echo json_encode("ok");
        }
    }

    public function getCertificateType(){
        if($this->request){
            $certificateTypeID = $this->request->getPost('type');
            $certificatetypeModel = model("certificatetypesModel");
            $response = $certificatetypeModel->where('certificatetype_id',$certificateTypeID)->first();
            echo json_encode($response);
        }
    }

    public function update(){
        if($this->request){
            $typeId = $this->request->getPost('typeId');
            $typeDescription = $this->request->getPost('typeDescription');
            $certificatetypeModel = model("certificatetypesModel");
            $response = $certificatetypeModel->where('certificatetype_id',$typeId)->first();
            if(isset($response)){
                $certificatetypeModel->save([
                    'certificatetype_id' => $typeId,
                    'certificatetype_description' => $typeDescription
                ]);
            }
        }
    }
}
