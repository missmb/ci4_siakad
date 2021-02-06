<?php namespace App\Controllers;

use App\Models\AYModel;
use App\Models\CssModel;

class Sdn extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->AYModel = new AYModel();
		$this->CssModel = new CssModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Student',
			'content' => 'Student/student'
		];
		return view('layout/wrapper', $data);
	}
	
	//------------------------------ Absence ------------------------------

	public function absence(){
		$student = $this->CssModel->DataStudent();
		$ay = $this->AYModel->ay_active();
		$data = [
			'title' => 'Absence',			
			'active' => $this->AYModel->ay_active(),
			'student' => $this->CssModel->DataStudent(),
			'courses' => $this->CssModel->DataCss($student['id_student'], $ay['id_ay']),
			'content' => 'Student/absence'
		];
		return view('layout/wrapper', $data);
	}

}
