<?php

namespace App\Controllers;

use App\Models\ProdiModel;
use App\Models\LectureModel;
use App\Models\ClassesModel;

class Classes extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ProdiModel = new ProdiModel();
		$this->LectureModel = new LectureModel();
		$this->ClassesModel = new ClassesModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Classes',
			'prodi' => $this->ProdiModel->data(),
			'lecture' => $this->LectureModel->data(),
			'classes' => $this->ClassesModel->data(),
			'content' => 'Admin/Classes/classes'
		];
		return view('layout/wrapper', $data);
	}

	public function add()
	{
		$data = [
			'class_name' => $this->request->getPost('class_name'),
			'id_prodi' => $this->request->getPost('id_prodi'),
			'id_lecture' => $this->request->getPost('id_lecture'),
			'class_year' => $this->request->getPost('class_year'),
		];
		$this->ClassesModel->add($data);
		session()->setFlashdata('success', 'Success Add Data');
		return redirect()->to(base_url('classes'));
	}

	public function edit($id)
	{
		$data = [
			'id_class' => $id,
			'class_name' => $this->request->getPost('class_name'),
			'id_prodi' => $this->request->getPost('id_prodi'),
			'id_lecture' => $this->request->getPost('id_lecture'),
			'class_year' => $this->request->getPost('class_year'),
		];
		$this->ClassesModel->edit($data);
		session()->setFlashdata('success', 'Success Edit Data');
		return redirect()->to(base_url('classes'));
	}

	public function delete($id)
	{
		$data = [
			'id_class' => $id
		];
		$this->ClassesModel->delete_classes($data);
		session()->setFlashdata('success', 'Success Delete Data');
		return redirect()->to(base_url('classes'));
	}

	public function detail_class($id)
	{
		$data = [
			'title' => 'Detail Class',
			'class' => $this->ClassesModel->detail($id),
			'student' => $this->ClassesModel->student($id),
			'total' => $this->ClassesModel->totalStudent($id),
			'null' => $this->ClassesModel->totalClassNot(),
			'content' => 'Admin/Classes/detail_class'
		];
		return view('layout/wrapper', $data);
	}

	public function addStudentClass($id_student, $id_class)
	{
		$data = [
			'id_student' => $id_student,
			'id_class' => $id_class
		];
		$this->ClassesModel->updateStudent($data);
		session()->setFlashdata('success', 'Success Add Data');
		return redirect()->to(base_url('classes/detail_class/' . $id_class));
	}

	public function removeStudentClass($id_student, $id_class)
	{
		$data = [
			'id_student' => $id_student,
			'id_class' => null
		];
		$this->ClassesModel->updateStudent($data);
		session()->setFlashdata('success', 'Success Remove Student');
		return redirect()->to(base_url('classes/detail_class/' . $id_class));
	}
}
