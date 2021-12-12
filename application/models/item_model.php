<?php


class Item_model extends CI_Model {

    public function insertItem($item_produto, $item_restaurante, $item_pedido, $item_quantidade, $item_user, $item_data, $item_hora, $item_cidade, $item_estado) {

        $data = array(
            'item_produto' => $item_produto,
            'item_restaurante' => $item_restaurante,
            'item_pedido' => $item_pedido,
            'item_quantidade' => $item_quantidade,
            'item_user' => $item_user,
            'item_data' => $item_data,
            'item_hora' => $item_hora,
            'item_cidade' => $item_cidade,
            'item_estado' => $item_estado,
        );

        return $this->db->insert('pedidos_itens', $data);
    }

    public function updateItem($id, $item_produto, $item_restaurante,  $item_pedido, $item_quantidade, $item_user, $item_data, $item_hora, $item_cidade, $item_estado) {

        $this->db->where('id', $id);

        $data = array(

            'item_produto' => $item_produto,
            'item_restaurante' => $item_restaurante,
            'item_pedido' => $item_pedido,
            'item_quantidade' => $item_quantidade,
            'item_user' => $item_user,
            'item_data' => $item_data,
            'item_hora' => $item_hora,
            'item_cidade' => $item_cidade,
            'item_estado' => $item_estado,
        );

        return $this->db->update('pedidos_itens', $data);
    }

    public function getItem($id) {
        $this->db->where('id', $id);
        return $this->db->get('pedidos_itens')->row_array();

    }
    public function getItensByPedido($item_pedido, $id) {

        $this->db->where('item_user', $id);
        $this->db->where('item_pedido', $item_pedido);
        return $this->db->get('pedidos_itens')->result();
    }

    public function getItensByRestaurante($item_restaurante) {

        $this->db->where('$item_restaurante', $$item_restaurante);
        return $this->db->get('pedidos_itens')->result();
    }


    public function getItensByCidade($item_cidade) {

        $this->db->where('$item_cidade', $item_cidade);
        return $this->db->get('pedidos_itens')->result();
    }


    public function getItensByEstado($item_estado) {

        $this->db->where('$item_estado', $item_estado);
        return $this->db->get('pedidos_itens')->result();
    }




   



}
