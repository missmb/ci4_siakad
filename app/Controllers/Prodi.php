<?php namespace App\Controllers;

use App\Models\FacultyModel;
use App\Models\ProdiModel;

class Prodi extends BaseController
{
	public function __construct(){
		helper('form');
		$this->FacultyModel = new FacultyModel();
		$this->ProdiModel = new ProdiModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Program Study',
			'prodi' => $this->ProdiModel->data(),
			'content' => 'Admin/Prodi/index'
		];
		return view('layout/wrapper', $data);
	}

	public function add(){
		$data = [
			'title' => 'Add Program Study',
			'faculty' => $this->FacultyModel->data(),
			'content' => 'Admin/Prodi/add_prodi'
		];
		return view('layout/wrapper', $data);
	}

	public function insert()
	{
		if ($this->validate([
			'id_faculty' => [
				'label' => 'Faculty',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'code_prodi' => [
				'label' => 'Code Program Study',
				'rules' => 'required|is_unique[prodi.code_prodi]',
				'errors' => [
					'required' => '{field} must fill!',
					'is_unique' => '{field} is exist'
				]
			],
			'prodi' => [
				'label' => 'Program Study',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'degree' => [
				'label' => 'Degree',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
		])) {
			$data = [
				'id_faculty' => $this->request->getPost('id_faculty'),
				'code_prodi' => $this->request->getPost('code_prodi'),
				'prodi' => $this->request->getPost('prodi'),
				'degree' => $this->request->getPost('degree'),
			];
			$this->ProdiModel->add($data);
			session()->setFlashdata('success', 'Success Add Data');
			return redirect()->to(base_url('prodi'));
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('prodi/add'));
		}
	}

	public function edit($id){
		$data = [
			'title' => 'Edit Program Study',
			'faculty' => $this->FacultyModel->data(),
			'prodi' => $this->ProdiModel->detail($id),
			'content' => 'Admin/Prodi/edit_prodi'
		];
		return view('layout/wrapper', $data);
	}

	public function update($id)
	{
		if ($this->validate([
			'id_faculty' => [
				'label' => 'Faculty',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'code_prodi' => [
				'label' => 'Code Program Study',
				'rules' => 'required|is_unique[prodi.code_prodi]',
				'errors' => [
					'required' => '{field} must fill!',
					'is_unique' => '{field} is exist'
				]
			],
			'degree' => [
				'label' => 'Degree',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
		])) {
			$data = [
				'id_prodi' => $id,
				'id_faculty' => $this->request->getPost('id_faculty'),
				'code_prodi' => $this->request->getPost('code_prodi'),
				'prodi' => $this->request->getPost('prodi'),
				'degree' => $this->request->getPost('degree'),
			];
			$this->ProdiModel->edit($data);
			session()->setFlashdata('success', 'Success Add Data');
			return redirect()->to(base_url('prodi'));
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('prodi/edit/' . $id));
		}
	}

	public function delete($id)
	{
		$data = [
			'id_prodi' => $id
		];
		$this->ProdiModel->delete_prodi($data);
		session()->setFlashdata('success', 'Success Delete Data');
		return redirect()->to(base_url('prodi'));
	}
}
