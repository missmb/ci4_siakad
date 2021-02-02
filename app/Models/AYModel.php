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
}
