<?php namespace App\Models;

use CodeIgniter\Model;

class BuildingModel extends Model{
    public function data(){
        return $this->db->table('building')
        ->orderBy('id_building', 'DESC')
        ->get()->getResultArray();
    }

    public function add($data){
        $this->db->table('building')->insert($data);
    }

    public function edit($id){
        $this->db->table('building')
        ->where('id_building', $id['id_building'])
        ->update($id);
    }

    public function delete_building($id){
        $this->db->table('building')
        ->where('id_building', $id['id_building'])
        ->delete($id);
    }
}
