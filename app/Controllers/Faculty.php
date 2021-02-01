<?php namespace App\Controllers;

class Faculty extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Faculty',
			'content' => 'Admin/faculty'
		];
		return view('layout/wrapper', $data);
	}

	//--------------------------------------------------------------------

}
