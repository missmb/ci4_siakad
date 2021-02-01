<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home',
			'content' => 'home'
		];
		return view('layout/wrapper', $data);
	}

	//--------------------------------------------------------------------

}
