<?php


class Recuperacao_model extends CI_Model {

    public function updatePassword($id, $old_password, $new_password) {

        $this->db->where('id', $id);
        $this->db->where('user_password', md5($old_password));

        $data = array (
            'user_password' => md5($new_password),
        );

        return $this->db->update('usuarios', $data);
    }

    
    public function checkPassword($id, $old_password) {
        
        $this->db->where('id', $id);
        $this->db->where('user_password', md5($old_password));
        
        return $this->db->get('usuarios');
        
    }
    
    public function getToken($email) {
        $this->db->where('user_email', $email);
        return $this->db->get('usuarios')->row_array()['user_token'];

    }
    
    public function newToken($id) {
        
        $this->db->where('id', $id);
        $data = array (
            'user_token' => mt_rand(),
        );
        
        return $this->db->update('usuarios', $data);

   }


   public function checkToken($id, $user_token) {

        $this->db->where('id', $id);
        $this->db->where('user_token', $user_token);
        
        return $this->db->get('usuarios')->row_array();

    }



}
