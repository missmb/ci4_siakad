<?php namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{
	public function __construct(){
		helper('form');
		$this->AdminModel = new AdminModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Home',
			'total_building' => $this->AdminModel->total_building(),
			'total_room' => $this->AdminModel->total_room(),
			'total_faculty' => $this->AdminModel->total_faculty(),
			'total_prodi' => $this->AdminModel->total_prodi(),
			'total_lecture' => $this->AdminModel->total_lecture(),
			'total_student' => $this->AdminModel->total_student(),
			'total_courses' => $this->AdminModel->total_courses(),
			'total_user' => $this->AdminModel->total_user(),
			'content' => 'Admin/admin'
		];
		return view('layout/wrapper', $data);
	}

	//--------------------------------------------------------------------

}
