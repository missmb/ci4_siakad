<?php

namespace App\Controllers;

use App\Models\ProdiModel;
use App\Models\CoursesModel;

class Courses extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ProdiModel = new ProdiModel();
        $this->CoursesModel = new CoursesModel();
    }

    public function index()
    {
        $data = [
        	'title' => 'Courses',
        	'prodi' => $this->ProdiModel->data(),
        	'content' => 'Admin/Courses/index'
        ];
        return view('layout/wrapper', $data);
    }

    public function detail($id)
    {
        $data = [
        	'title' => 'Courses',
            'prodi' => $this->ProdiModel->detail($id),
        	'courses' => $this->CoursesModel->data_prodi($id),            
        	'content' => 'Admin/Courses/detail_course'
        ];
        return view('layout/wrapper', $data);
    }

    public function add($id_prodi)
    {
        if ($this->validate([
			'code_courses' => [
				'label' => 'Code Courses',
				'rules' => 'required|is_unique[courses.code_courses]',
				'errors' => [
                    'required' => '{field} must fill!',
					'is_unique' => '{field} is exist'
				]
			],
			'courses' => [
				'label' => 'Courses',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'sks' => [
				'label' => 'Program Study',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'smt' => [
				'label' => 'Semester',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'category' => [
				'label' => 'Category',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
		])) {			
            $smt = $this->request->getPost('smt');
            if ($smt == 1 | $smt == 3 | $smt == 5 | $smt == 7){
                $semester = 'Ganjil';
            } else {
                $semester = 'Genap';
            }
            $data = [
                'code_courses' => $this->request->getPost('code_courses'),
                'courses' => $this->request->getPost('courses'),
                'sks' => $this->request->getPost('sks'),
                'category' => $this->request->getPost('category'),
                'smt' => $this->request->getPost('smt'),
                'semester' => $semester,
                'id_prodi' => $id_prodi,
            ];
            $this->CoursesModel->add($data);
            session()->setFlashdata('success', 'Success Add Data');
            return redirect()->to(base_url('courses/detail/' . $id_prodi));
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('courses/detail/' . $id_prodi));
		}
    }

    public function delete($id_prodi, $id_courses)
    {
        $data = [
            'id_courses' => $id_courses
        ];
        $this->CoursesModel->delete_courses($data);
        session()->setFlashdata('success', 'Success Delete Data');
        return redirect()->to(base_url('courses/detail/' . $id_prodi));
    }
}
