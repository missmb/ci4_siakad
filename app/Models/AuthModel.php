<?php namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model{
    public function login($email, $password) {
        return $this->db->table('user')->where([
            'email' => $email,
            'password' => $password,
        ])->get()->getRowArray();
    }

    public function login_student($nim, $password) {
        return $this->db->table('student')->where([
            'nim' => $nim,
            'password' => $password,
        ])->get()->getRowArray();
    }

    public function login_lecture($nidn, $password) {
        return $this->db->table('lecture')->where([
            'nidn' => $nidn,
            'password' => $password,
        ])->get()->getRowArray();
    }
}