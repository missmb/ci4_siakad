<?php namespace App\Models;

use CodeIgniter\Model;

class CoursesModel extends Model{
    public function data(){
        return $this->db->table('courses')
        ->orderBy('id_courses', 'DESC')
        ->get()->getResultArray();
    }

    public function data_prodi($id){
        return $this->db->table('courses')
        ->where('id_prodi', $id)
        // ->orderBy('smt', 'ASC')
        ->get()->getResultArray();
    }

    public function add($data){
        $this->db->table('courses')->insert($data);
    }

    public function edit($id){
        $this->db->table('courses')
        ->where('id_courses', $id['id_courses'])
        ->update($id);
    }

    public function delete_courses($id){
        $this->db->table('courses')
        ->where('id_courses', $id['id_courses'])
        ->delete($id);
    }
}
