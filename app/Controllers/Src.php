<?php namespace App\Controllers;


class Src extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Student Record Card',
			'content' => 'Student/src'
		];
		return view('layout/wrapper', $data);
	}
}
