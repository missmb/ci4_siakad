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
            ->get()->getResultArray();
    }

    public function DetailSchedule($id_schedule){
        return $this->db->table('college_schedule')
        ->where('college_schedule.id_schedule', $id_schedule)
        ->join('prodi', 'prodi.id_prodi = college_schedule.id_prodi', 'left')
        ->join('faculty', 'faculty.id_faculty = prodi.id_faculty', 'left')
        ->join('courses', 'courses.id_courses = college_schedule.id_courses', 'left')
        ->join('lecture', 'lecture.id_lecture = college_schedule.id_lecture', 'left')
        ->join('classes', 'classes.id_class = college_schedule.id_class', 'left')
        ->where('college_schedule.id_schedule', $id_schedule)
        ->get()->getRowArray();
    }

    public function DataStudent($id_schedule){
        return $this->db->table('css')
        ->join('student', 'student.id_student = css.id_student', 'left')
        ->where('id_schedule', $id_schedule)
        ->get()->getResultArray();
    }

    public function EditAbsent($id_schedule){
        $this->db->table('css')
        ->where('id_css', $id_schedule['id_css'])
        ->update($id_schedule);
    }
}
