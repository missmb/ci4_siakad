<?php

namespace App\Controllers;

use App\Models\ProdiModel;
use App\Models\StudentModel;

class student extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ProdiModel = new ProdiModel();
		$this->StudentModel = new StudentModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Student',
			'student' => $this->StudentModel->data(),
			'content' => 'Admin/student/index'
		];
		return view('layout/wrapper', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Add Student',
			'prodi' => $this->ProdiModel->data(),
			'content' => 'Admin/student/add_student'
		];
		return view('layout/wrapper', $data);
	}

	public function insert()
	{
		if ($this->validate([
			'nim' => [
				'label' => 'NIM',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'student_name' => [
				'label' => 'student Name',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'id_prodi' => [
				'label' => 'ID Prodi',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'password' => [
				'label' => 'Password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'cover_sdn' => [
				'label' => 'cover',
				'rules' => 'uploaded[cover_sdn]|max_size[cover,1024]|mime_in[cover,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
				'errors' => [
					'uploaded' => '{field} must fill!',
					'max_size' => '{field} Max size 1024 KB',
					'mime_in' => 'Format {field} must PNG, JPG, JPEG, GIF, ICO'
				]
			],
		])) {
			$cover = $this->request->getFile('cover');
			$file_name = $cover->getRandomName();
			$data = [
				'nim' => $this->request->getPost('nim'),
				'student_name' => $this->request->getPost('student_name'),
				'id_prodi' => $this->request->getPost('id_prodi'),
				'password' => $this->request->getPost('password'),
				'cover_sdn' => $file_name,
			];
			$cover->move('img/student', $file_name);
			$this->StudentModel->add($data);
			session()->setFlashdata('success', 'Success Add Data');
			return redirect()->to(base_url('student'));
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('student/add'));
		}
	}

	public function edit($id){
		$data = [
			'title' => 'Edit Program Study',
			'prodi' => $this->ProdiModel->data(),
			'student' => $this->StudentModel->detail($id),
			'content' => 'Admin/Student/edit_student'
		];
		return view('layout/wrapper', $data);
	}

	public function update($id)
	{
		if ($this->validate([
			'nim' => [
				'label' => 'NIM',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'student_name' => [
				'label' => 'student Name',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'id_prodi' => [
				'label' => 'ID Prodi',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'password' => [
				'label' => 'Password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'cover_sdn' => [
				'label' => 'cover',
				'rules' => 'max_size[cover_sdn,1024]|mime_in[cover_sdn,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
				'errors' => [
					'max_size' => '{field} Max size 1024 KB',
					'mime_in' => 'Format {field} must PNG, JPG, JPEG, GIF, ICO'
				]
			],
		])) {
			$cover = $this->request->getFile('cover_sdn');

			if ($cover->getError() == 4) {
				$data = [
					'id_student' => $id,
					'nim' => $this->request->getPost('nim'),
					'student_name' => $this->request->getPost('student_name'),
					'id_prodi' => $this->request->getPost('id_prodi'),
					'password' => $this->request->getPost('password'),
				];
				$this->StudentModel->edit($data);
			} else {
				$student = $this->StudentModel->detail($id);
				if ($student['cover_sdn'] != "") {
					unlink('img/student/' . $student['cover_sdn']);
				}
				$file_name = $cover->getRandomName();
				$data = [
					'id_student' => $id,
					'nim' => $this->request->getPost('nim'),
					'student_name' => $this->request->getPost('student_name'),
					'id_prodi' => $this->request->getPost('id_prodi'),
					'password' => $this->request->getPost('password'),
					'cover_sdn' => $file_name,
				];
				$cover->move('img/student', $file_name);
				$this->StudentModel->edit($data);
			}
			session()->setFlashdata('success', 'Success Edit Data');
			return redirect()->to(base_url('student'));
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('student/edit/' . $id));
		}
	}

	public function delete($id)
	{
		$student = $this->StudentModel->detail($id);

		if ($student['cover_sdn'] != "") {
			unlink('img/student/' . $student['cover_sdn']);
		}
		$data = [
			'id_student' => $id
		];
		$this->StudentModel->delete_student($data);
		session()->setFlashdata('success', 'Success Delete Data');
		return redirect()->to(base_url('student'));
	}
}
