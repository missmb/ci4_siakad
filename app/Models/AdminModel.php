<?php namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model{
    public function total_building(){
        return $this->db->table('building')
        ->countAll();
    }

    public function total_room(){
        return $this->db->table('room')
        ->countAll();
    }

    public function total_faculty(){
        return $this->db->table('faculty')
        ->countAll();
    }

    public function total_prodi(){
        return $this->db->table('prodi')
        ->countAll();
    }

    public function total_lecture(){
        return $this->db->table('lecture')
        ->countAll();
    }

    public function total_student(){
        return $this->db->table('student')
        ->countAll();
    }


    public function total_courses(){
        return $this->db->table('courses')
        ->countAll();
    }

    public function total_user(){
        return $this->db->table('user')
        ->countAll();
    }
}