<?php namespace App\Controllers;

use App\Models\AYModel;

class AY extends BaseController
{
	public function __construct(){
		helper('form');
		$this->AYModel = new AYModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Academic Year',
			'ay' => $this->AYModel->data(),
			'content' => 'Admin/ay'
		];
		return view('layout/wrapper', $data);
	}

	public function add(){
		$data = [
			'ay' =>$this->request->getPost('ay'),
			'semester' =>$this->request->getPost('semester'),
		];
		$this->AYModel->add($data);
		session()->setFlashdata('success', 'Success Add Data');
		return redirect()->to(base_url('ay'));
	}

	public function edit($id){
		$data = [
			'id_ay' => $id,
			'ay' =>$this->request->getPost('ay'),
			'semester' =>$this->request->getPost('semester'),
		];
		$this->AYModel->edit($data);
		session()->setFlashdata('success', 'Success Edit Data');
		return redirect()->to(base_url('ay'));
	}

	public function delete($id){
		$data = [
			'id_ay' => $id
		];
		$this->AYModel->delete_ay($data);
		session()->setFlashdata('success', 'Success Delete Data');
		return redirect()->to(base_url('ay'));
	}

	//------------------------------ Setting Academic Year ------------------------------

	public function setting()
	{
		$data = [
			'title' => 'Setting Academic Year',
			'ay' => $this->AYModel->data(),
			'content' => 'Admin/ay_setting'
		];
		return view('layout/wrapper', $data);
	}

	public function setStatus($id){
		$this->AYModel->resetStatus();
		$data = [
			'id_ay' => $id,
			'status' => 1
		];
		$this->AYModel->edit($data);
		session()->setFlashdata('success', 'Success Change Active Data');
		return redirect()->to(base_url('ay/setting'));
	}
}
