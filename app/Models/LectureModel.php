<?php namespace App\Models;

use CodeIgniter\Model;

class LectureModel extends Model{
    public function data(){
        return $this->db->table('lecture')
        ->orderBy('id_lecture', 'DESC')
        ->get()->getResultArray();
    }

    public function detail($id){
        return $this->db->table('lecture')
        ->where('id_lecture', $id)
        ->get()->getRowArray();
    }

    public function add($data){
        $this->db->table('lecture')->insert($data);
    }

    public function edit($id){
        $this->db->table('lecture')
        ->where('id_lecture', $id['id_lecture'])
        ->update($id);
    }

    public function delete_lecture($id){
        $this->db->table('lecture')
        ->where('id_lecture', $id['id_lecture'])
        ->delete($id);
    }
}
