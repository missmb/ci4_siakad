<?php namespace App\Controllers;


class Ltr extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Lecture',
			'content' => 'Lecture/lecture'
		];
		return view('layout/wrapper', $data);
	}
}
