<?php namespace App\Controllers;

use App\Models\AYModel;
use App\Models\ProdiModel;
use App\Models\CollegeScheduleModel;
use App\Models\LectureModel;
use App\Models\RoomModel;

class CollegeSchedule extends BaseController
{
    public function __construct()
	{
		helper('form');
		$this->AYModel = new AYModel();
		$this->ProdiModel = new ProdiModel();
		$this->CollegeScheduleModel = new CollegeScheduleModel();
		$this->LectureModel = new LectureModel();
		$this->RoomModel = new RoomModel();
		$this->RoomModel = new RoomModel();
	}

	public function index()
	{
		$data = [
			'title' => 'College Schedule',
            'active' => $this->AYModel->ay_active(),
            'prodi' => $this->ProdiModel->data(),
			'content' => 'Admin/CollegeSchedule/index'
		];
		return view('layout/wrapper', $data);
	}

    public function detail($id_prodi){
		$data = [
			'title' => 'Detail Schedule',
            'active' => $this->AYModel->ay_active(),
            'prodi' => $this->ProdiModel->detail($id_prodi),
            'schedule' => $this->CollegeScheduleModel->data($id_prodi),
            'courses' => $this->CollegeScheduleModel->courses($id_prodi),
            'lecture' => $this->LectureModel->data(),
            'class' => $this->CollegeScheduleModel->class($id_prodi),
            'room' => $this->RoomModel->data(),
			'content' => 'Admin/CollegeSchedule/detail_schedule'
		];
		return view('layout/wrapper', $data);
    }

    public function add($id_prodi)
	{
		if ($this->validate([
			'id_class' => [
				'label' => 'Class',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'id_courses' => [
				'label' => 'Courses',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'id_lecture' => [
				'label' => 'Lecture',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'day' => [
				'label' => 'day',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'time' => [
				'label' => 'Time',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'id_room' => [
				'label' => 'Room',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'quota' => [
				'label' => 'Quota',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
		])) {
            $active = $this->AYModel->ay_active();
			$data = [
				'id_prodi' => $id_prodi,
                'id_ay' => $active['id_ay'],
				'id_class' => $this->request->getPost('id_class'),
				'id_courses' => $this->request->getPost('id_courses'),
				'id_lecture' => $this->request->getPost('id_lecture'),
				'day' => $this->request->getPost('day'),
				'time' => $this->request->getPost('time'),
				'id_room' => $this->request->getPost('id_room'),
				'quota' => $this->request->getPost('quota'),
			];
			$this->CollegeScheduleModel->add($data);
			session()->setFlashdata('success', 'Success Add Data');
            // var_dump($data);die;
			return redirect()->to(base_url('collegeschedule/detail/' . $id_prodi));
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('collegeschedule/detail/' . $id_prodi));
		}
	}

    public function delete($id_schedule, $id_prodi)
	{
		$data = [
			'id_schedule' => $id_schedule
		];
		$this->CollegeScheduleModel->delete_schedule($data);
		session()->setFlashdata('success', 'Success Delete Data');
		return redirect()->to(base_url('collegeschedule/detail/' . $id_prodi));
	}
}
