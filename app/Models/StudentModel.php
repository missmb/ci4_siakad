<?php namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model{
    public function data(){
        return $this->db->table('student')
        ->join('prodi', 'student.id_prodi = prodi.id_prodi', 'left')
        ->orderBy('id_student', 'DESC')
        ->get()->getResultArray();
    }

    public function detail($id){
        return $this->db->table('student')
        ->join('prodi', 'prodi.id_prodi = student.id_prodi', 'left')
        ->where('id_student', $id)
        ->get()->getRowArray();
    }


    public function add($data){
        $this->db->table('student')->insert($data);
    }

    public function edit($id){
        $this->db->table('student')
        ->where('id_student', $id['id_student'])
        ->update($id);
    }

    public function delete_student($id){
        $this->db->table('student')
        ->where('id_student', $id['id_student'])
        ->delete($id);
    }
}
