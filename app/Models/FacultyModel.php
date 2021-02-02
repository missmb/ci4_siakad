<?php namespace App\Models;

use CodeIgniter\Model;

class FacultyModel extends Model{
    public function data(){
        return $this->db->table('faculty')
        ->orderBy('id_faculty', 'DESC')
        ->get()->getResultArray();
    }

    public function add($data){
        $this->db->table('faculty')->insert($data);
    }

    public function edit($id){
        $this->db->table('faculty')
        ->where('id_faculty', $id['id_faculty'])
        ->update($id);
    }

    public function delete_faculty($id){
        $this->db->table('faculty')
        ->where('id_faculty', $id['id_faculty'])
        ->delete($id);
    }
}
