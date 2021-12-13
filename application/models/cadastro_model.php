<?php


class Cadastro_model extends CI_Model {


    public function Registrar($nome, $sobrenome, $email, $telefone, $password, $token, $registro, $identidade, $nascimento, $sexo, $imagem) {

 

        $data = array(
            'user_nome' => $nome,
            'user_sobrenome' => $sobrenome,
            'user_email' => $email,
            'user_telefone' => $telefone,
            'user_password' => md5($password),
            'user_token' => $token,
            'user_registro' => $registro,
            'user_identidade' => $identidade,
            'user_nascimento' => $nascimento,
            'user_sexo' => $sexo,
            'user_imagem' => $imagem,



        );
        return $this->db->insert('usuarios', $data);
    }

    public function checkEmail($email) {

        $this->db->where('user_email', $email);
        
        if ($this->db->count_all_results('usuarios') > 0 ) {
            return false;
        } else {
            return true;
        }
    
    }


}
