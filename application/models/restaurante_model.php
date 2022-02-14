<?php


class Restaurante_model extends CI_Model {


    
    public function Login($email, $password) {

        $this->db->where('restaurante_email', $email);
        $this->db->where('restaurante_password', md5($password));

        return $this->db->get('restaurantes')->row_array();
    }

    public function checkPassword($restaurante, $user_current_password) {

        $this->db->where('id', $restaurante);
        $this->db->where('restaurante_password', md5($user_current_password));

        return $this->db->get('restaurantes')->row_array();
    }

    public function updatePassword($restaurante, $user_new_password) {

        $this->db->where('id', $restaurante);

        $data = array(
            'restaurante_password' =>md5($user_new_password),
        );

        return $this->db->update('restaurantes',$data);
    }


    public function updateModelo($rest, $restaurante_modelo) {

        $this->db->where('id', $rest) ;

        $data = array (
            'restaurante_modelo' => $restaurante_modelo,
        );
        return $this->db->update('restaurantes', $data);

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
            'restaurante_status' => '1',
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
        $this->db->where('id', $user);
        $data = array (
            'restaurante_status' => $status,
        );
        return $this->db->update('restaurantes', $data);
    }

    public function updateRestauranteFuncionamento(
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

        $this->db->where('funcionamento_restaurante', $user);
        return $this->db->update('restaurantes_funcionamento', $data);

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

    public function getRestaurantes() {
        return  $this->db->get('restaurantes')->result();
    }

    public function searchRestaurantesByCategoria($slug, $cidade) {
        $this->db->where('restaurante_categoria',$slug);
        $this->db->like('restaurante_cidade',$cidade);
        return  $this->db->get('restaurantes')->result();
    }

    public function searchProdutosByCategoria($slug, $cidade) {
        $this->db->like('produto_categoria',$slug);
        $this->db->like('produto_cidade',$cidade);
        return  $this->db->get('cardapio_produtos')->result();
    }

    public function getRestaurantesByLocation( $cidade) {
      
        $this->db->like('restaurante_cidade',$cidade);
        return  $this->db->get('restaurantes')->result();
    }

    public function getRestaurantesBySearch($query, $cidade) {
        $this->db->like('restaurante_nome',$query);
        $this->db->like('restaurante_cidade',$cidade);
        return  $this->db->get('restaurantes')->result();
    }

    public function getProdutosBySearch($query, $cidade) {
        $this->db->like('produto_nome',$query);
        $this->db->like('produto_cidade',$cidade);
        return  $this->db->get('cardapio_produtos')->result();
    }

    public function getRestauranteStatus($id) {
        $this->db->where('id', $id);
        $data = $this->db->get('restaurantes')->row_array();
        return $data['restaurante_status'];
    }

    public function updateRestauranteConfiguracoes(
        $user,
        $restaurante_nome,
        $restaurante_imagem,
        $restaurante_telefone,
        $restaurante_endereco,
        $restaurante_categoria,
        $restaurante_preparo_medio,
        $restaurante_cidade,
        $restaurante_estado)
     {

        if (strlen($restaurante_imagem) > 0 ) {
            $data = array (
                'restaurante_nome' => $restaurante_nome,
                'restaurante_imagem' => $restaurante_imagem,
                'restaurante_telefone' => $restaurante_telefone,
                'restaurante_endereco' =>  $restaurante_endereco,
                'restaurante_categoria' => $restaurante_categoria,
                'restaurante_preparo_medio' => $restaurante_preparo_medio,
        
                'restaurante_cidade' => $restaurante_cidade,
                'restaurante_estado' => $restaurante_estado,
            );

        } else {

            $data = array (
                'restaurante_nome' => $restaurante_nome,
                
                'restaurante_telefone' => $restaurante_telefone,
                'restaurante_endereco' =>  $restaurante_endereco,
                'restaurante_categoria' => $restaurante_categoria,
                'restaurante_preparo_medio' => $restaurante_preparo_medio,
        
                'restaurante_cidade' => $restaurante_cidade,
                'restaurante_estado' => $restaurante_estado,
            );
        }

       
        $this->db->where('id', $user);
        return $this->db->update('restaurantes', $data);
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
   
    public function getHorarios($id) {
        $this->db->where('funcionamento_restaurante', $id);
        return $this->db->get('restaurantes_funcionamento')->row_array();
    
    }
    public function getVendas($id) {
        $this->db->where('pedido_restaurante', $id);
        $where = '(pedido_status="4" or pedido_status="5")';
        $this->db->where($where);
        return $this->db->get('pedidos')->result();
    
    }

    public function getPedidosConcluidos($id) {
        $this->db->where('pedido_restaurante', $id);
        $where = '(pedido_status="4" or pedido_status="5")';
        $this->db->where($where);
        return $this->db->count_all_results('pedidos');
       
    }

    public function getPedidosAndamento($id) {
        $this->db->where('pedido_restaurante', $id);
        $where = '(pedido_status="1" or pedido_status="2")';
        $this->db->where($where);
        return $this->db->count_all_results('pedidos');
    }

    public function getPedidosGanhos($id) {
        $this->db->where('pedido_restaurante', $id);
        $where = '(pedido_status="4" or pedido_status="5")';
        $this->db->where($where);
        $data =  $this->db->get('pedidos')->result();


        $total = 0;
        foreach ($data as $d) {

            $total = $total + $d->pedido_total;
        }

        return round($total,2);
    }
    public function getPedidosVendas($id) {
        $this->db->where('pedido_restaurante', $id);

        $where = '(pedido_status="4" or pedido_status="5")';
        $this->db->where($where);

        return $this->db->count_all_results('pedidos');
    }

    public function getPedidosAvaliacoes($id) {
        $this->db->where('id', $id);
        return $this->db->get('restaurantes')->row_array()['restaurante_nota'];

    }

    public function getPedidosCancelados($id) {
        $this->db->where('pedido_restaurante', $id);
        $this->db->where('pedido_status', '3');
        return $this->db->count_all_results('pedidos');
    }




    public function getPedidosConcluidosArray($id) {
        $this->db->where('pedido_restaurante', $id);
        $where = '(pedido_status="4" or pedido_status="5")';
        $this->db->where($where);
        return $this->db->get('pedidos')->result();
       
    }

    public function getPedidosAndamentoArray($id) {
        $this->db->where('pedido_restaurante', $id);
        $where = '(pedido_status="1" or pedido_status="2")';
        $this->db->where($where);
        return $this->db->get('pedidos')->result();
    }

    public function getPedidosCanceladosArray($id) {
        $this->db->where('pedido_restaurante', $id);
        $this->db->where('pedido_status', '3');
        return $this->db->get('pedidos')->result();
    }

    public function getStatus($id) {

        $this->db->where('id', $id);
        return $this->db->get('restaurantes')->row_array()['restaurante_status'];
    }

    public function routeAuth() {

        // if ($this->session->userdata('session_restaurante')) {
           
        // } else {
        //     redirect('restaurante/login');
        // }
    }


}
