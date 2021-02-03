<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->UserModel = new UserModel();
	}

	public function index()
	{
		$data = [
			'title' => 'User',
			'user' => $this->UserModel->data(),
			'content' => 'Admin/user'
		];
		return view('layout/wrapper', $data);
	}

	public function add()
	{
		if ($this->validate([
			'username' => [
				'label' => 'Username',
				'rules' => 'required|is_unique[user.username]',
				'errors' => [
					'required' => '{field} must fill!',
					'is_unique' => '{field} is exist'
				]
			],
			'email' => [
				'label' => 'email',
				'rules' => 'required|is_unique[user.email]',
				'errors' => [
					'required' => '{field} must fill!',
					'is_unique' => '{field} is exist'
				]
			],
			'password' => [
				'label' => 'password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
			'cover' => [
				'label' => 'cover',
				'rules' => 'uploaded[cover]|max_size[cover,1024]|mime_in[cover,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
				'errors' => [
					'uploaded' => '{field} must fill!',
					'max_size' => '{field} Max size 1024 KB',
					'mime_in' => 'Format {field} must PNG, JPG, JPEG, GIF, ICO'
				]
			],
		])) {
			$cover = $this->request->getFile('cover');
			$file_name = $cover->getRandomName();
			$data = [
				'username' => $this->request->getPost('username'),
				'email' => $this->request->getPost('email'),
				'password' => $this->request->getPost('password'),
				'cover' => $file_name,
			];
			$cover->move('img/user', $file_name);
			$this->UserModel->add($data);
			session()->setFlashdata('success', 'Success Add Data');
			return redirect()->to(base_url('user'));
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('user'));
		}
	}

	public function edit($id)
	{
		if ($this->validate([
			'cover' => [
				'label' => 'cover',
				'rules' => 'max_size[cover,1024]|mime_in[cover,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
				'errors' => [
					'max_size' => '{field} Max size 1024 KB',
					'mime_in' => 'Format {field} must PNG, JPG, JPEG, GIF, ICO'
				]
			],
		])) {
			$cover = $this->request->getFile('cover');

			if ($cover->getError() == 4) {
				$data = [
					'id_user' => $id,
					'username' => $this->request->getPost('username'),
					'email' => $this->request->getPost('email'),
					'password' => $this->request->getPost('password')
				];
				$this->UserModel->edit($data);
			} else {
				$user = $this->UserModel->detail($id);
				if ($user['cover'] != "") {
					unlink('img/user/' . $user['cover']);
				}
				$file_name = $cover->getRandomName();
				$data = [
					'id_user' => $id,
					'username' => $this->request->getPost('username'),
					'email' => $this->request->getPost('email'),
					'password' => $this->request->getPost('password'),
					'cover' => $file_name,
				];
				$cover->move('img/user', $file_name);
				$this->UserModel->edit($data);
			}
			session()->setFlashdata('success', 'Success Edit Data');
			return redirect()->to(base_url('user'));
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('user'));
		}
	}

	public function delete($id){
		$user = $this->UserModel->detail($id);

		if ($user['cover'] != "") {
			unlink('img/user/' . $user['cover']);
		}
		$data = [
			'id_user' => $id
		];
		$this->UserModel->delete_user($data);
		session()->setFlashdata('success', 'Success Delete Data');
		return redirect()->to(base_url('user'));
	}

}
