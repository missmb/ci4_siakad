<?php namespace App\Controllers;

use App\Models\FacultyModel;

class Faculty extends BaseController
{
	public function __construct(){
		helper('form');
		$this->FacultyModel = new FacultyModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Faculty',
			'faculty' => $this->FacultyModel->data(),
			'content' => 'Admin/faculty'
		];
		return view('layout/wrapper', $data);
	}

	public function add(){
		$data = [
			'faculty' =>$this->request->getPost('faculty'),
		];
		$this->FacultyModel->add($data);
		session()->setFlashdata('success', 'Success Add Data');
		return redirect()->to(base_url('faculty'));
	}

	public function edit($id){
		$data = [
			'id_faculty' => $id,
			'faculty' =>$this->request->getPost('faculty'),
		];
		$this->FacultyModel->edit($data);
		session()->setFlashdata('success', 'Success Edit Data');
		return redirect()->to(base_url('faculty'));
	}

	public function delete($id){
		$data = [
			'id_faculty' => $id
		];
		$this->FacultyModel->delete_faculty($data);
		session()->setFlashdata('success', 'Success Delete Data');
		return redirect()->to(base_url('faculty'));
	}

}
