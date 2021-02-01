<?php namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home',
			'content' => 'Admin/admin'
		];
		return view('layout/wrapper', $data);
	}

	//--------------------------------------------------------------------

}
