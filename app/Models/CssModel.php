<?php namespace App\Models;

use CodeIgniter\Model;

class CssModel extends Model{
    public function DataStudent(){
        return $this->db->table('student')
        ->join('prodi', 'prodi.id_prodi = student.id_prodi', 'left')
        ->join('faculty', 'faculty.id_faculty = prodi.id_faculty', 'left')
        ->join('classes', 'classes.id_class = student.id_class', 'left')
        ->join('lecture', 'lecture.id_lecture = classes.id_lecture', 'left')
        ->where('nim', session()->get('email')) //session email = nim
        ->get()->getRowArray();
    }

    public function CoursesOffering($id_ay){
        return $this->db->table('college_schedule')
        ->join('courses', 'courses.id_courses = college_schedule.id_courses', 'left')
        ->join('classes', 'classes.id_class = college_schedule.id_class', 'left')
        ->join('room', 'room.id_room = college_schedule.id_room', 'left')
        ->join('lecture', 'lecture.id_lecture = college_schedule.id_lecture', 'left')
        ->where('id_ay', $id_ay)
        ->get()->getResultArray();
    }

    public function AddCourse($data) {
        return $this->db->table('css')->insert($data);
    }

    // public function DetailStudent(){
    //     return $this->db->table('student')
    //     ->where('nim', session()->get('email'))
    //     ->get()->getRowArray();
    // }

    public function DataCss($id_student, $id_ay){
        return $this->db->table('css')
        ->join('college_schedule', 'college_schedule.id_schedule = css.id_schedule', 'left')
        ->join('courses', 'courses.id_courses = college_schedule.id_courses', 'left')
        ->join('classes', 'classes.id_class = college_schedule.id_class', 'left')
        ->join('room', 'room.id_room = college_schedule.id_room', 'left')
        ->join('lecture', 'lecture.id_lecture = college_schedule.id_lecture', 'left')
        ->where('id_student', $id_student)
        ->where('css.id_ay', $id_ay)
        ->get()->getResultArray();
    }

    public function DeleteCss($id){
        $this->db->table('css')
        ->where('id_css', $id['id_css'])
        ->delete($id);
    }

}
