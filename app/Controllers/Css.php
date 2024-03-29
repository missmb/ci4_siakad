<?php namespace App\Controllers;

use App\Models\AYModel;
use App\Models\CssModel;

class Css extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->AYModel = new AYModel();
		$this->CssModel = new CssModel();
	}

	public function index()
	{
		$student = $this->CssModel->DataStudent();
		$ay = $this->AYModel->ay_active();
		$data = [
			'title' => 'Course Study Sheet',
			'active' => $this->AYModel->ay_active(),
			'student' => $this->CssModel->DataStudent(),
			'offering' => $this->CssModel->CoursesOffering($ay['id_ay'],$student['id_prodi']),
			'courses' => $this->CssModel->DataCss($student['id_student'], $ay['id_ay']),
			'content' => 'Student/Css/index'
		];
		return view('layout/wrapper', $data);
	}

	public function add($id_schedule){
		$student = $this->CssModel->DataStudent();
        $ay = $this->AYModel->ay_active();
        $data = [
			'id_student' => $student['id_student'],
            'id_schedule' => $id_schedule,
            'id_ay' => $ay['id_ay'],
        ];
		$this->CssModel->addCourse($data);
		session()->setFlashdata('success', 'Success Add Data');
		return redirect()->to(base_url('css'));
    }

	public function delete($id)
	{
		$data = [
			'id_css' => $id
		];
		$this->CssModel->DeleteCss($data);
		session()->setFlashdata('success', 'Success Delete Data');
		return redirect()->to(base_url('css'));
	}

	public function print(){
		$student = $this->CssModel->DataStudent();
		$ay = $this->AYModel->ay_active();
		$data = [
			'title' => 'Print',
			'active' => $this->AYModel->ay_active(),
			'student' => $this->CssModel->DataStudent(),
			'courses' => $this->CssModel->DataCss($student['id_student'], $ay['id_ay']),
		];
		return view('Student/Css/print_css', $data);
	}
}
