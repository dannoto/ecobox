<?php


class Pedido_model extends CI_Model {

    public function insertPedido($pedido_restaurante, $pedido_user, $pedido_data, $pedido_hora, $pedido_status, $pedido_total, $pedido_desconto, $pedido_cupom, $pedido_cidade, $pedido_estado) {

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

        $this->db->where('pedido_user', $pedido_user);
        return $this->db->get('pedidos')->result();
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
