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

    public function updateInformacoes($id, $user_nome, $user_sobrenome,  $user_telefone, $user_identidade, $user_nascimento, $user_sexo, $user_imagem ) {

        $this->db->where('id', $id);


        if (strlen($user_imagem) == 0 ) {

            $data = array (

                'user_nome' => $user_nome,
                'user_sobrenome' => $user_sobrenome,
                'user_telefone' => $user_telefone,
                'user_identidade' => $user_identidade,
                'user_nascimento' => $user_nascimento,
                'user_sexo' => $user_sexo,
            );

        } else {

            $data = array (

                'user_nome' => $user_nome,
                'user_sobrenome' => $user_sobrenome,
                'user_telefone' => $user_telefone,
                'user_identidade' => $user_identidade,
                'user_nascimento' => $user_nascimento,
                'user_sexo' => $user_sexo,
                'user_imagem' => $user_imagem,
            );
        }
       

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
