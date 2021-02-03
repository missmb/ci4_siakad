<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    public function data(){
        return $this->db->table('user')
        ->orderBy('id_user', 'DESC')
        ->get()->getResultArray();
    }
    
    public function detail($id){
        return $this->db->table('user')
        ->where('id_user', $id)
        ->get()->getRowArray();
    }

    public function add($data){
        $this->db->table('user')->insert($data);
    }

    public function edit($id){
        $this->db->table('user')
        ->where('id_user', $id['id_user'])
        ->update($id);
    }

    public function delete_user($id){
        $this->db->table('user')
        ->where('id_user', $id['id_user'])
        ->delete($id);
    }
}
