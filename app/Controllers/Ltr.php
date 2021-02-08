<?php

namespace App\Controllers;

use App\Models\LtrModel;
use App\Models\AYModel;

class Ltr extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->LtrModel = new LtrModel();
		$this->AYModel = new AYModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Lecture',
			'content' => 'Lecture/lecture'
		];
		return view('layout/wrapper', $data);
	}

	public function schedule()
	{
		// var_dump($this->AYModel->ay_active());die();
		$ay = $this->AYModel->ay_active();
		$lecture = $this->LtrModel->data();
		$data = [
			'title' => 'Lesson Schedule',
			'schedule' => $this->LtrModel->LectureSchedule($lecture['id_lecture'], $ay['id_ay']),
			'ay' => $ay,
			'content' => 'Lecture/schedule'
		];
		return view('layout/wrapper', $data);
	}

	public function Absence()
	{
		$ay = $this->AYModel->ay_active();
		$lecture = $this->LtrModel->data();
		$data = [
			'title' => 'Absence Class',
			'ay' => $ay,
			'absence' => $this->LtrModel->LectureSchedule($lecture['id_lecture'], $ay['id_ay']),
			'content' => 'Lecture/Absence/absence'
		];
		return view('layout/wrapper', $data);
	}

	public function AbsenceClass($id_schedule)
	{
		$data = [
			'title' => 'Absence Class',
			'schedule' => $this->LtrModel->DetailSchedule($id_schedule),
			'student' => $this->LtrModel->DataStudent($id_schedule),
			'content' => 'Lecture/Absence/absence_class'
		];
		return view('layout/wrapper', $data);
	}

	public function EditAbsence($id_schedule)
	{
		$data = [
			'title' => 'Edit Absent Class',
			'schedule' => $this->LtrModel->DetailSchedule($id_schedule),
			'student' => $this->LtrModel->DataStudent($id_schedule),
			'content' => 'Lecture/Absence/edit_absence'
		];
		return view('layout/wrapper', $data);
	}

	public function UpdateAbsence($id_schedule)
	{
		$student = $this->LtrModel->DataStudent($id_schedule);
		foreach ($student as $key => $v) {
			// var_dump($student);
			$data = [
				'absence_score' => $this->request->getPost($v['id_css'] . 'absence_score'),
				'id_css' => $this->request->getPost($v['id_css'] . 'id_css'),
				'a1' => $this->request->getPost($v['id_css'] . 'a1'),
				'a2' => $this->request->getPost($v['id_css'] . 'a2'),
				'a3' => $this->request->getPost($v['id_css'] . 'a3'),
				'a4' => $this->request->getPost($v['id_css'] . 'a4'),
				'a5' => $this->request->getPost($v['id_css'] . 'a5'),
				'a6' => $this->request->getPost($v['id_css'] . 'a6'),
				'a7' => $this->request->getPost($v['id_css'] . 'a7'),
				'a8' => $this->request->getPost($v['id_css'] . 'a8'),
				'a9' => $this->request->getPost($v['id_css'] . 'a9'),
				'a10' => $this->request->getPost($v['id_css'] . 'a10'),
				'a11' => $this->request->getPost($v['id_css'] . 'a11'),
				'a12' => $this->request->getPost($v['id_css'] . 'a12'),
				'a13' => $this->request->getPost($v['id_css'] . 'a13'),
				'a14' => $this->request->getPost($v['id_css'] . 'a14'),
				'a15' => $this->request->getPost($v['id_css'] . 'a15'),
				'a16' => $this->request->getPost($v['id_css'] . 'a16'),
				'a17' => $this->request->getPost($v['id_css'] . 'a17'),
				'a18' => $this->request->getPost($v['id_css'] . 'a18'),
			];
			$this->LtrModel->EditAbsent($data);

			$data = [
				'absence_score' => $this->request->getPost($v['id_css'] . 'absence_score')
			];
			$this->LtrModel->EditAbsent($data);
		}
		session()->setFlashdata('success', 'Success Update Absence');
		return redirect()->to(base_url('ltr/absenceclass/' . $id_schedule));
	}

	public function PrintAbsence($id_schedule)
	{
		$data = [
			'title' => 'Absence Class',
			'schedule' => $this->LtrModel->DetailSchedule($id_schedule),
			'student' => $this->LtrModel->DataStudent($id_schedule),
			'content' => 'Lecture/Absence/print_absence'
		];
		return view('layout/wrapper', $data);
	}

	public function StudentScore()
	{
		$ay = $this->AYModel->ay_active();
		$lecture = $this->LtrModel->data();
		$data = [
			'title' => 'Student Score',
			'ay' => $ay,
			'absence' => $this->LtrModel->LectureSchedule($lecture['id_lecture'], $ay['id_ay']),
			'content' => 'Lecture/Score/student_score'
		];
		return view('layout/wrapper', $data);
	}

	public function Score($id_schedule)
	{
		// var_dump($this->LtrModel->DataStudent($id_schedule));
		$ay = $this->AYModel->ay_active();
		$data = [
			'title' => 'Score Class',
			'ay' => $ay,
			'absence' => $this->LtrModel->DetailSchedule($id_schedule),
			'student' => $this->LtrModel->DataStudent($id_schedule),
			'content' => 'Lecture/Score/data_score'
		];
		return view('layout/wrapper', $data);
	}

	public function UpdateScore($id_schedule)
	{
		$student = $this->LtrModel->DataStudent($id_schedule);
		foreach ($student as $key => $v) {
			$absence = $this->request->getPost($v['id_css'] . 'absence_score');
			$assigned = $this->request->getPost($v['id_css'] . 'assignment_score');
			$uts = $this->request->getPost($v['id_css'] . 'uts_score');
			$uas = $this->request->getPost($v['id_css'] . 'uts_score');
			$na = ($absence * 15 / 100) +
				($assigned * 15 / 100) +
				($uts * 30 / 100) +
				($uas * 40 / 100);
			if ($na >= 85) {
				$ws = 'A';
				$weight = 4;
			} else if ($na < 85 && $na >= 75) {
				$ws = 'B';
				$weight = 3;
			} else if ($na < 75 && $na >= 65) {
				$ws = 'C';
				$weight = 2;
			} else if ($na < 65 && $na >= 55) {
				$ws = 'D';
				$weight = 1;
			} else {
				$ws = 'E';
				$weight = 0;
			}
			$data = [
				'id_css' => $this->request->getPost($v['id_css'] . 'id_css'),
				'assignment_score' => $this->request->getPost($v['id_css'] . 'assignment_score'),
				'uts_score' => $this->request->getPost($v['id_css'] . 'uts_score'),
				'uas_score' => $this->request->getPost($v['id_css'] . 'uts_score'),
				'final_score' => number_format($na, 0),
				'word_score' => $ws,
				'weight' => $weight
			];
			// var_dump($na);die();
			$this->LtrModel->EditAbsent($data);

			$data = [
				'absence_score' => $this->request->getPost($v['id_css'] . 'absence_score')
			];
			$this->LtrModel->EditAbsent($data);
		}
		session()->setFlashdata('success', 'Success Update Score');
		return redirect()->to(base_url('ltr/score/' . $id_schedule));
	}
}
