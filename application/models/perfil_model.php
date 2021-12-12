<?php


class Perfil_model extends CI_Model {

    public function getPerfil($id) {

        $this->db->where('id', $id);
        return $this->db->get('usuarios')->row_array();
    }

  
    public function getPedidos($pedido_user) {

        $this->db->where('pedido_user', $pedido_user);
        return $this->db->get('pedidos')->result();
    }

    public function getCupons($cupom_user) {

        $this->db->where('cupom_user', $cupom_user);
        return $this->db->get('cupons')->result();
    }

    public function updateInformacoes($id, $user_nome, $user_sobrenome, $user_email, $user_telefone, $user_identidade, $user_nascimento, $user_genero ) {

        $this->db->where('id', $id);

        $data = array (

            'user_nome' => $user_nome,
            'user_sobrenome' => $user_sobrenome,
            'user_email' => $user_email,
            'user_telefone' => $user_telefone,
            'user_identidade' => $user_identidade,
            'user_nascimento' => $user_nascimento,
            'user_genero' => $user_genero,
        );

        return $this->db->update('usuarios', $data);
    }

    public function updateSeguranca($id, $old_password, $new_password) {

        $this->db->where('id', $id);
        $this->db->where('user_password', md5($old_password));

        $data = array (
            'user_password' => md5($new_password),
        );

        return $this->db->update('usuarios', $data);
    }

    
    



}
