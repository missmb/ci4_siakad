<?php namespace App\Models;

use CodeIgniter\Model;

class ClassesModel extends Model{
    public function data(){
        return $this->db->table('classes')
        ->join('prodi', 'prodi.id_prodi = classes.id_prodi', 'left')
        ->join('lecture', 'lecture.id_lecture = classes.id_lecture', 'left')
        ->orderBy('id_class', 'ASC')
        ->get()->getResultArray();
    }

    public function detail($id){
        return $this->db->table('classes')
        ->join('prodi', 'prodi.id_prodi = classes.id_prodi', 'left')
        ->join('lecture', 'lecture.id_lecture = classes.id_lecture', 'left')
        ->where('id_class', $id)
        ->get()->getRowArray();
    }

    public function add($data){
        $this->db->table('classes')->insert($data);
    }

    public function edit($id){
        $this->db->table('classes')
        ->where('id_class', $id['id_class'])
        ->update($id);
    }

    public function delete_classes($id){
        $this->db->table('classes')
        ->where('id_class', $id['id_class'])
        ->delete($id);
    }

    //show data student orderby class
    public function student($id_class){
        return $this->db->table('student')
        ->join('prodi', 'student.id_prodi = prodi.id_prodi', 'left')
        ->where('id_class', $id_class)
        ->orderBy('id_student', 'DESC')
        ->get()->getResultArray();
    }

    public function totalStudent($id){
		return $this->db->table('student')
		->where('id_class', $id)
		->countAllResults();
    }
    
    public function totalClassNot(){
        return $this->db->table('student')
        ->join('prodi', 'prodi.id_prodi = student.id_prodi', 'left')
        ->where('id_class', null)
        ->orderBy('id_student', 'DESC')
		->get()->getResultArray();
    }
    
   public function updateStudent($id){
    $this->db->table('student')
    ->where('id_student', $id['id_student'])
    ->update($id);
   }
}
