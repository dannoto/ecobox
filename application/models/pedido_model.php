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

        return $this->db->insert('pedidos', $data);
    }
    
    public function getPedido($id) {
        
        $this->db->where('id', $id);
        return $this->db->get('pedidos')->row_array();
    }
    
    public function getPedidos() {

        return $this->db->get('pedidos')->result();
    }

    public function getPedidosByUser($pedido_user) {

        $this->db->where('pedido_usuario', $pedido_user);
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
