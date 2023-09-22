<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use App\Models\SectionModel;

class StudentController extends BaseController
{
    private $students;
    private $sections;
    private $gender = ['Male','Female','Preffered not to say'];
    function __construct(){
        $this->students = new StudentModel();
        $this->sections = new SectionModel();
    }
    public function index()
    {
        $data =[
            'students' => $this->students->findAll(),
            'sections' => $this->sections->findAll(),
            'gender' => $this->gender
        ];
        return view('index',$data);
    }
    public function studentInfo(){
        $data =[
          'students' => $this->students->findAll(),
          'sections' => $this->sections->findAll(),
          'gender' => $this->gender
        ];
        return view('index',$data);
    }
    public function save(){
        $id=$this->request->getVar('id');

        $data = [
            'StudID'=>$this->request->getVar('StudID'),
            'StudName'=>$this->request->getVar('StudName'),
            'StudGender'=>$this->request->getVar('StudGender'),
            'StudCourse'=>$this->request->getVar('StudCourse'),
            'StudSection'=>$this->request->getVar('StudSection'),
            'StudYear'=>$this->request->getVar('StudYear')
        ];
        if($id != null){
            $this->students->set($data)->where('id',$id)->update();
            
        }else{
            $this->students->insert($data);
           
        }
        
        return redirect()->to('/studentInfo');
    }
    public function editstudentInfo($id=null){
        $data =[
            'students' => $this->students->findAll($id),
            'sections' => $this->sections->findAll(),
            'gender' => $this->gender,
            'Infoedit' => $this->students->where('id',$id)->first()
        ];
        return view('index',$data);
    }
    public function deletestudentInfo($id=null){
        $this->students->delete($id);
        return redirect()->to('studentInfo');
    }
}
