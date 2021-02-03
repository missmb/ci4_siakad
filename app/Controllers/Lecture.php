<?php

namespace App\Controllers;

use App\Models\LectureModel;

class Lecture extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->LectureModel = new LectureModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Lecture',
			'lecture' => $this->LectureModel->data(),
			'content' => 'Admin/Lecture/index'
		];
		return view('layout/wrapper', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Add Lecture',
			'lecture' => $this->LectureModel->data(),
			'content' => 'Admin/Lecture/add_lecture'
		];
		return view('layout/wrapper', $data);
	}

	public function insert()
	{
		if ($this->validate([
			'code_lecture' => [
				'label' => 'Lecture Code',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'nidn' => [
				'label' => 'NIDN',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'lecture_name' => [
				'label' => 'Lecture Name',
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
			'cover' => [
				'label' => 'cover',
				'rules' => 'uploaded[cover]|max_size[cover,1024]|mime_in[cover,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
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
				'code_lecture' => $this->request->getPost('code_lecture'),
				'nidn' => $this->request->getPost('nidn'),
				'lecture_name' => $this->request->getPost('lecture_name'),
				'password' => $this->request->getPost('password'),
				'cover' => $file_name,
			];
			$cover->move('img/lecture', $file_name);
			$this->LectureModel->add($data);
			session()->setFlashdata('success', 'Success Add Data');
			return redirect()->to(base_url('lecture'));
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('lecture/add'));
		}
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Add Lecture',
			'lecture' => $this->LectureModel->detail($id),
			'content' => 'Admin/Lecture/edit_lecture'
		];
		return view('layout/wrapper', $data);
	}

	public function update($id)
	{
		if ($this->validate([
			'code_lecture' => [
				'label' => 'Lecture Code',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'nidn' => [
				'label' => 'NIDN',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'lecture_name' => [
				'label' => 'Lecture Name',
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
			'cover' => [
				'label' => 'cover',
				'rules' => 'max_size[cover,1024]|mime_in[cover,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
				'errors' => [
					'max_size' => '{field} Max size 1024 KB',
					'mime_in' => 'Format {field} must PNG, JPG, JPEG, GIF, ICO'
				]
			],
		])) {
			$cover = $this->request->getFile('cover');

			if ($cover->getError() == 4) {
				$data = [
					'id_lecture' => $id,
					'code_lecture' => $this->request->getPost('code_lecture'),
					'nidn' => $this->request->getPost('nidn'),
					'lecture_name' => $this->request->getPost('lecture_name'),
					'password' => $this->request->getPost('password'),
				];
				$this->LectureModel->edit($data);
			} else {
				$lecture = $this->LectureModel->detail($id);
				if ($lecture['cover'] != "") {
					unlink('img/lecture/' . $lecture['cover']);
				}
				$file_name = $cover->getRandomName();
				$data = [
					'id_lecture' => $id,
					'code_lecture' => $this->request->getPost('code_lecture'),
					'nidn' => $this->request->getPost('nidn'),
					'lecture_name' => $this->request->getPost('lecture_name'),
					'password' => $this->request->getPost('password'),
					'cover' => $file_name,
				];
				$cover->move('img/lecture', $file_name);
				$this->LectureModel->edit($data);
			}
			session()->setFlashdata('success', 'Success Edit Data');
			return redirect()->to(base_url('lecture'));
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('lecture/edit/' . $id));
		}
	}

	public function delete($id)
	{
		$lecture = $this->LectureModel->detail($id);

		if ($lecture['cover'] != "") {
			unlink('img/lecture/' . $lecture['cover']);
		}
		$data = [
			'id_lecture' => $id
		];
		$this->LectureModel->delete_lecture($data);
		session()->setFlashdata('success', 'Success Delete Data');
		return redirect()->to(base_url('lecture'));
	}
}
