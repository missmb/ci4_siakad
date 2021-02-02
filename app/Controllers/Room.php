<?php

namespace App\Controllers;

use App\Models\BuildingModel;
use App\Models\RoomModel;

class Room extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->BuildingModel = new BuildingModel();
		$this->RoomModel = new RoomModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Room',
			'room' => $this->RoomModel->data(),
			'content' => 'Admin/Room/index'
		];
		return view('layout/wrapper', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Add Room',
			// 'room' =>$this->request->getPost('room'),
			'building' => $this->BuildingModel->data(),
			'content' => 'Admin/Room/add_room'
		];
		return view('layout/wrapper', $data);
	}

	public function insert()
	{
		if ($this->validate([
			'id_building' => [
				'label' => 'Building',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
		])) {
			$data = [
				'id_building' => $this->request->getPost('id_building'),
				'room' => $this->request->getPost('room'),
			];
			$this->RoomModel->add($data);
			session()->setFlashdata('success', 'Success Add Data');
			return redirect()->to(base_url('room'));
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('room/add'));
		}
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Edit Room',
			'building' => $this->BuildingModel->data(),
			'room' => $this->RoomModel->detail($id),
			'content' => 'Admin/Room/edit_room',
		];
		return view('layout/wrapper', $data);
	}

	public function update($id_room)
	{
		if ($this->validate([
			'id_building' => [
				'label' => 'Building',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} must fill!'
				]
			],
		])) {
			$data = [
				'id_room' => $id_room,
				'id_building' => $this->request->getPost('id_building'),
				'room' => $this->request->getPost('room'),
			];
			$this->RoomModel->edit($data);
			session()->setFlashdata('success', 'Success Update Data');
			return redirect()->to(base_url('room'));
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('room/edit/' . $id_room));
		}
	}

	public function delete($id)
	{
		$data = [
			'id_room' => $id
		];
		$this->RoomModel->delete_room($data);
		session()->setFlashdata('success', 'Success Delete Data');
		return redirect()->to(base_url('room'));
	}
}
