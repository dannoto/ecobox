<?php


class Auth_model extends CI_Model {

    public function Login($email, $password) {

        $this->db->where('user_email', $email);
        $this->db->where('user_password', md5($password));

        return $this->db->get('usuarios')->row_array();
    }

   



}
