<?php

namespace App\Models;

use CodeIgniter\Model;

class CollegeScheduleModel extends Model
{
    public function data($id)
    {
        return $this->db->table('college_schedule')
            ->join('courses', 'courses.id_courses = college_schedule.id_courses', 'left')
            ->join('prodi', 'prodi.id_prodi = college_schedule.id_prodi', 'left')
            ->join('lecture', 'lecture.id_lecture = college_schedule.id_lecture', 'left')
            ->join('room', 'room.id_room = college_schedule.id_room', 'left')
            ->join('classes', 'classes.id_class = college_schedule.id_class', 'left')
            ->where('college_schedule.id_prodi', $id)
            ->orderBy('courses.smt', 'ASC')
            ->get()->getResultArray();
    }

    public function courses($id_prodi)
    {
        return $this->db->table('courses')
            ->where('id_prodi', $id_prodi)
            ->orderBy('courses.smt', 'ASC')
            ->get()->getResultArray();
    }

    public function class($id_prodi){
        return $this->db->table('classes')
        ->where('id_prodi', $id_prodi)
        ->orderBy('class_name', 'ASC')
        ->get()->getResultArray();
    }

    public function add($data){
        $this->db->table('college_schedule')->insert($data);
    }

    public function delete_schedule($id){
        $this->db->table('college_schedule')
        ->where('id_schedule', $id['id_schedule'])
        ->delete($id);
    }
}
