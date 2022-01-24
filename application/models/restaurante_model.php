<?php


class Restaurante_model extends CI_Model {


    
    public function Login($email, $password) {

        $this->db->where('restaurante_email', $email);
        $this->db->where('restaurante_password', md5($password));

        return $this->db->get('restaurantes')->row_array();
    }


    public function insertRestaurante($restaurante_representante_nome, $restaurante_representante_sobrenome, $restaurante_representante_telefone, $restaurante_email, $restaurante_password) {

        
        $data = array (
            'restaurante_representante_nome' => $restaurante_representante_nome,
            'restaurante_representante_nome' => $restaurante_representante_sobrenome,
            'restaurante_telefone' => $restaurante_representante_telefone,
            'restaurante_email' => $restaurante_email,
            'restaurante_password' =>  md5($restaurante_password),
            'restaurante_registro' => date('d-m-Y'),
            'restaurante_token' => mt_rand(),
            'restaurante_status' => 'pendente',
            'restaurante_imagem' => 'avatar.png',
        );

        return $this->db->insert('restaurantes', $data);
    }

    public function checkEmailRestaurante($restaurante_email) {
        $this->db->where('restaurante_email', $restaurante_email);
        $r =  $this->db->count_all_results('restaurantes');

        if ($r > 0 ) {
            return false;
        } else {
            return true;
        }
    }

    public function getRestaurante($id) {

        $this->db->where('id', $id);
        return $this->db->get('restaurantes')->row_array();
   
    }



    public function getCategorias() {

        return $this->db->get('categorias')->result();

    }
    public function existeRestaurante($id) {
        $this->db->where('id', $id);
        return $this->db->get('restaurantes')->row_array();
    }

    public function updateStatus($user, $status) {

        $data = array (
            'restaurante_status' => $status,
        );
        return $this->db->update('restaurantes', $data);
    }


    public function insertRestauranteFuncionamento(
        $user,
        $funcionamento_seg_sex_abertura,
        $funcionamento_seg_sex_fechamento,
        $funcionamento_sab_abertura,
        $funcionamento_sab_fechamento,
        $funcionamento_dom_abertura,
        $funcionamento_dom_fechamento,
        $funcionamento_feriado_abertura,
        $funcionamento_feriado_fechamento
    ) {

        $data = array (
            'funcionamento_seg_sex_abertura' => $funcionamento_seg_sex_abertura,
			'funcionamento_seg_sex_fechamento' => $funcionamento_seg_sex_fechamento,
			'funcionamento_sab_abertura' => $funcionamento_sab_abertura,
			'funcionamento_sab_fechamento' =>  $funcionamento_sab_fechamento,
			'funcionamento_dom_abertura' => $funcionamento_dom_abertura,
			'funcionamento_dom_fechamento' => $funcionamento_dom_fechamento,
			'funcionamento_feriado_abertura' => $funcionamento_feriado_abertura,
			'funcionamento_feriado_fechamento' => $funcionamento_feriado_fechamento,
            'funcionamento_restaurante' => $user
        );

        $this->db->where('id', $user);
        return $this->db->insert('restaurantes_funcionamento', $data);

    }

    public function getRestauranteStatus($id) {
        $this->db->where('id', $id);
        $data = $this->db->get('restaurantes')->row_array();
        return $data['restaurante_status'];
    }

    public function updateRestauranteInformacoes(
        $user,
        $restaurante_nome,
        $restaurante_imagem,
        $restaurante_telefone,
        $restaurante_endereco,
        $restaurante_categoria,
        $restaurante_preparo_medio,
        $restaurante_cnpj,
        $restaurante_razao_social,
        $restaurante_representante_nome,
        $restaurante_representante_sobrenome,
        $restaurante_representante_cpf,
        $restaurante_cidade,
        $restaurante_estado) {

            
        $data = array (
            'restaurante_nome' => $restaurante_nome,
			'restaurante_imagem' => $restaurante_imagem,
			'restaurante_telefone' => $restaurante_telefone,
			'restaurante_endereco' =>  $restaurante_endereco,
			'restaurante_categoria' => $restaurante_categoria,
			'restaurante_preparo_medio' => $restaurante_preparo_medio,
			'restaurante_cnpj' => $restaurante_cnpj,
			'restaurante_razao_social' => $restaurante_razao_social,
			'restaurante_representante_nome' => $restaurante_representante_nome,
			'restaurante_representante_sobrenome' => $restaurante_representante_sobrenome,
			'restaurante_representante_cpf' => $restaurante_representante_cpf,
            'restaurante_cidade' => $restaurante_cidade,
            'restaurante_estado' => $restaurante_estado,
        );
        $this->db->where('id', $user);
        return $this->db->update('restaurantes', $data);
    }


    public function updateRestauranteDocumentos($user, $restaurante_contrato_social, $restaurante_alvara_bombeiros, $restaurante_alvara_sanitaria) {

            
        $data = array (
            'restaurante_contrato_social' => $restaurante_contrato_social,
			'restaurante_alvara_bombeiro' => $restaurante_alvara_bombeiros,
			'restaurante_alvara_sanitaria' => $restaurante_alvara_sanitaria,
			
        );
        $this->db->where('id', $user);
        return $this->db->update('restaurantes', $data);
    }

    // public function checkEmailRestaurante($restaurante_email) {
    //     $this->db->where('restaurante_email', $restaurante_email);
    //     $r =  $this->db->count_all_results('restaurantes');

    //     if ($r > 0 ) {
    //         return false;
    //     } else {
    //         return true;
    //     }
    // }
   



}
