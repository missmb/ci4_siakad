<?php namespace App\Controllers;


class Sdn extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Student',
			'content' => 'Student/student'
		];
		return view('layout/wrapper', $data);
	}
}
