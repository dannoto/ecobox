<?php


class Pedido_model extends CI_Model {


    public function addPedido(
                $pedido_restaurante,
				$pedido_pagamento,
				$pedido_user,
				$pedido_total,
				$pedido_desconto,
				$pedido_cupom,
				$pedido_endereco,
				$pedido_observacoes,
				$pedido_frete,
				$pedido_troco,
				$pedido_cep,
				$pedido_cidade,
				$pedido_estado
    ) {
        
        $data = array(
            'pedido_restaurante' => $pedido_restaurante,
            'pedido_usuario' => $pedido_user,
            'pedido_data' => date('d-m-Y'),
            'pedido_hora' => date('H:i:s'),
            'pedido_status' => '1',
            'pedido_total' => $pedido_total,
            'pedido_desconto' => $pedido_desconto,
            'pedido_cupom' => $pedido_cupom,
            'pedido_cidade' => $pedido_cidade,
            'pedido_estado' => $pedido_estado,
            

            'pedido_endereco' => $pedido_endereco,
            'pedido_observacoes' => $pedido_observacoes,
            'pedido_cep' => $pedido_cep,
            'pedido_frete' => $pedido_frete,
            'pedido_cidade'=> $pedido_cidade,
            'pedido_estado' => $pedido_estado,
            'pedido_troco' => $pedido_troco,
            'pedido_pagamento' => $pedido_pagamento
        );

         $this->db->insert('pedidos', $data);
         return $this->db->insert_id();
    }

    public function getPedidoAcompanhamentoByProduto($user,$pedido, $pedido_produto) {

        $this->db->where('item_produto', $pedido_produto);
        $this->db->where('item_pedido', $pedido);
        $this->db->where('item_user', $user);
        return $this->db->get('pedidos_acompanhamentos')->result();

    }

    public function getAcompanhamentoById($id) {

        $this->db->where('id', $id);
    
        return $this->db->get('cardapio_elementos')->row_array();

    }

    public function addPedidoAcompanhamento($id_pedido,$acompanhamento_user, $acompanhamento_restaurante, $acompanhamento_produto, $acompanhamento_nome) {
  

        $data = array(
            'item_produto' => $acompanhamento_produto,
            'item_pedido' => $id_pedido,
            'item_user' => $acompanhamento_user,
            'item_restaurante' => $acompanhamento_restaurante,
            'item_acompanhamento' => $acompanhamento_nome
        );

        $this->db->insert('pedidos_acompanhamentos', $data);
    }
    public function addPedidoProdutos($pedido_id, $pedido_user,$pedido_produto, $pedido_quantidade) {

        
        $data = array(
            'pedido_id' => $pedido_id,
            'pedido_user' => $pedido_user,
            'pedido_produto' => $pedido_produto,
            'pedido_quantidade' => $pedido_quantidade
        );


        $this->db->insert('pedido_produtos', $data);
    }
    
    public function getPedido($id) {
        
        $this->db->where('id', $id);
        return $this->db->get('pedidos')->row_array();
    }

    public function getPedidoProdutos($pedido_id) {
        
        $this->db->where('pedido_id', $pedido_id);
        return $this->db->get('pedido_produtos')->result();
    }
    
    public function getPedidos() {

        return $this->db->get('pedidos')->result();
    }

    public function getPedidosByUser($pedido_user) {

        $this->db->where('pedido_usuario', $pedido_user);
        $this->db->order_by('id','DESC');
        return $this->db->get('pedidos')->result();
    }

    public function getPedidosByRestaurante($pedido_restaurante) {

        $this->db->where('pedido_restaurante', $pedido_restaurante);
        $this->db->order_by('id','DESC');
        return $this->db->get('pedidos')->result();
    }
   
    public function searchPedidosByRestaurante($pedido_id,$pedido_restaurante) {

        $this->db->where('pedido_restaurante', $pedido_restaurante);
        $this->db->where('id', $pedido_id);
        $this->db->order_by('id','DESC');
        return $this->db->get('pedidos')->result();
    }

    public function getPedidosByCodigo($pedido_restaurante, $codigo) {

        $this->db->where('pedido_restaurante', $pedido_restaurante);
        $this->db->where('id', $codigo);
        $this->db->order_by('id','DESC');
        return $this->db->get('pedidos')->result();
    }


    public function updateStatus($pedido_user, $pedido_status, $pedido_id) {

        $this->db->where('pedido_usuario', $pedido_user);
        $this->db->where('id', $pedido_id);

        $data = array (
            'pedido_status' => $pedido_status,
        );

        return $this->db->update('pedidos', $data);

    }
        
    public function updateStatusRestaurante($pedido_restaurante, $pedido_status, $pedido_id) {

        $this->db->where('pedido_restaurante', $pedido_restaurante);
        $this->db->where('id', $pedido_id);

        $data = array (
            'pedido_status' => $pedido_status,
        );

        return $this->db->update('pedidos', $data);

    
    }

    public function getPedidosByEstado($pedido_estado) {

        $this->db->where('pedido_estado', $pedido_estado);
        return $this->db->get('pedidos')->result();
    }

    public function getPedidosByCidade($pedido_cidade) {

        $this->db->where('pedido_cidade', $pedido_cidade);
        return $this->db->get('pedidos')->result();
    }

    public function getPedidosByStatus($pedido_status) {

        $this->db->where('pedido_status', $pedido_status);
        return $this->db->get('pedidos')->result();
    }


    public function updatePedido($pedido_restaurante, $pedido_user, $pedido_data, $pedido_hora, $pedido_status, $pedido_total, $pedido_desconto, $pedido_cupom, $pedido_cidade, $pedido_estado) {

        $data = array(
            'pedido_restaurante' => $pedido_restaurante,
            'pedido_user' => $pedido_user,
            'pedido_data' => $pedido_data,
            'pedido_hora' => $pedido_hora,
            'pedido_status' => $pedido_status,
            'pedido_total' => $pedido_total,
            'pedido_desconto' => $pedido_desconto,
            'pedido_cupom' => $pedido_cupom,
            'pedido_cidade' => $pedido_cidade,
            'pedido_estado' => $pedido_estado
        );
        
        return $this->db->update('pedidos', $data);
    }


    public function deletePedido($id) {

        $this->db->where('id', $id);
        return $this->db->delete('pedidos');
    }


  
   



}
