<?php namespace App\Controllers;

use App\Models\BuildingModel;

class Building extends BaseController
{
	public function __construct(){
		helper('form');
		$this->BuildingModel = new BuildingModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Building',
			'building' => $this->BuildingModel->data(),
			'content' => 'Admin/building'
		];
		return view('layout/wrapper', $data);
	}

	public function add(){
		$data = [
			'building' =>$this->request->getPost('building'),
		];
		$this->BuildingModel->add($data);
		session()->setFlashdata('success', 'Success Add Data');
		return redirect()->to(base_url('building'));
	}

	public function edit($id){
		$data = [
			'id_building' => $id,
			'building' =>$this->request->getPost('building'),
		];
		$this->BuildingModel->edit($data);
		session()->setFlashdata('success', 'Success Edit Data');
		return redirect()->to(base_url('building'));
	}

	public function delete($id){
		$data = [
			'id_building' => $id
		];
		$this->BuildingModel->delete_building($data);
		session()->setFlashdata('success', 'Success Delete Data');
		return redirect()->to(base_url('building'));
	}

}
