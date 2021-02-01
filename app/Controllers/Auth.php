<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->AuthModel = new AuthModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Login',
			'content' => 'Auth/login'
		];
		return view('layout/wrapper', $data);
	}

	public function check_login()
	{
		if ($this->validate([
			'email' => [
				'label' => 'Email',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'role' => [
				'label' => 'Role',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'password' => [
				'label' => 'Password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
		])) {
			$role = $this->request->getPost('role');
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');

			if ($role == 1) {
				$check = $this->AuthModel->login($email, $password);
				if ($check) {
					session()->set('log', true);
					session()->set('email', $check['email']);
					session()->set('username', $check['username']);
					session()->set('cover', $check['cover']);
					session()->set('role', $role);
					
					return redirect()->to(base_url('admin'));
				} else {
					session()->setFlashdata('wrong', 'Login Filed!, error Email or Password');
					return redirect()->to(base_url('auth/index'));
				}
			} else if ($role == 2) {
				echo 'Dosen';
			} else if ($role == 3) {
				echo 'Mahasiswa';
			}
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('auth/index'));
		}
	}

	public function logout() {
		session()->remove('log');
		session()->remove('email');
		session()->remove('cover');
		session()->remove('role');
		session()->setFlashdata('logout', 'success logout !!!');
		return redirect()->to(base_url('auth'));
	}
}
