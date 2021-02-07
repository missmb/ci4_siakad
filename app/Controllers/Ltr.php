<?php namespace App\Controllers;

use App\Models\LtrModel;

class Ltr extends BaseController
{
	public function __construct(){
		$this->LtrModel = new LtrModel();
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
		// var_dump($this->LtrModel->data());die();
		// echo $this->LtrModel->data();
		$lecture = $this->LtrModel->data();
		$data = [
			'title' => 'Lesson Schedule',
			'schedule' => $this->LtrModel->LectureSchedule($lecture['id_lecture']),
			'content' => 'Lecture/schedule'
		];
		return view('layout/wrapper', $data);
	}
}
