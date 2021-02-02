<?php namespace App\Models;

use CodeIgniter\Model;

class RoomModel extends Model{
    public function data(){
        return $this->db->table('room')
        ->join('building', 'building.id_building = room.id_building', 'left')
        ->orderBy('id_room', 'ASC')
        ->get()->getResultArray();
    }

    public function detail($id){
        return $this->db->table('room')
        ->join('building', 'building.id_building = room.id_building', 'left')
        ->where('id_room', $id)
        ->get()->getRowArray();
    }

    public function add($data){
        $this->db->table('room')->insert($data);
    }

    public function edit($id){
        $this->db->table('room')
        ->where('id_room', $id['id_room'])
        ->update($id);
    }

    public function delete_room($id){
        $this->db->table('room')
        ->where('id_room', $id['id_room'])
        ->delete($id);
    }
}
