<?php

namespace App\Models;

use CodeIgniter\Model;

class LtrModel extends Model
{
    public function data()
    {
        return $this->db->table('lecture')
            ->where('nidn', session()->get('email'))
            ->get()->getRowArray();
    }

    public function LectureSchedule($id_lecture)
    {
        return $this->db->table('college_schedule')
            ->join('courses', 'courses.id_courses = college_schedule.id_courses', 'left')
            ->join('prodi', 'prodi.id_prodi = college_schedule.id_prodi', 'left')
            ->join('lecture', 'lecture.id_lecture = college_schedule.id_lecture', 'left')
            ->join('room', 'room.id_room = college_schedule.id_room', 'left')
            ->join('classes', 'classes.id_class = college_schedule.id_class', 'left')
            ->where('lecture.id_lecture', $id_lecture)
            // ->where('lecture.nidn', session()->get('email'))
            ->get()->getResultArray();
    }
}
