<?php namespace App\Models;

use CodeIgniter\Model;

class AYModel extends Model{
    public function data(){
        return $this->db->table('ay')
        ->orderBy('id_ay', 'DESC')
        ->get()->getResultArray();
    }

    public function add($data){
        $this->db->table('ay')->insert($data);
    }

    public function edit($id){
        $this->db->table('ay')
        ->where('id_ay', $id['id_ay'])
        ->update($id);
    }

    public function delete_ay($id){
        $this->db->table('ay')
        ->where('id_ay', $id['id_ay'])
        ->delete($id);
    }

    public function resetStatus(){
        $this->db->table('ay')->update(['status' => 0 ]);
    }

    public function ay_active(){
        return $this->db->table('ay')
        ->where('status', 1)
        ->get()->getRowArray();
    }
}
