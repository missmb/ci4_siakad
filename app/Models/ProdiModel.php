<?php namespace App\Models;

use CodeIgniter\Model;

class ProdiModel extends Model{
    public function data(){
        return $this->db->table('prodi')
        ->join('faculty', 'faculty.id_faculty = prodi.id_faculty', 'left')
        ->orderBy('id_prodi', 'ASC')
        ->get()->getResultArray();
    }

    public function detail($id){
        return $this->db->table('prodi')
        ->join('faculty', 'faculty.id_faculty = prodi.id_faculty', 'left')
        ->where('id_prodi', $id)
        ->get()->getRowArray();
    }

    public function add($data){
        $this->db->table('prodi')->insert($data);
    }

    public function edit($id){
        $this->db->table('prodi')
        ->where('id_prodi', $id['id_prodi'])
        ->update($id);
    }

    public function delete_prodi($id){
        $this->db->table('prodi')
        ->where('id_prodi', $id['id_prodi'])
        ->delete($id);
    }
}