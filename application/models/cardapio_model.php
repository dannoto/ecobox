<?php


class Cardapio_model extends CI_Model {

    public function insertCardapio($cardapio_nome, $cardapio_restaurante) {

        $data = array(
            'cardapio_nome' => $cardapio_nome,
            'cardapio_restaurante' => $cardapio_restaurante,
            'cardapio_data' => date('d-m-Y'),
            'cardapio_hora' => date('H:i:s'),
        );

        return $this->db->insert('cardapio_categorias', $data);
    }

    public function updateCardapio($cardapio_nome, $cardapio_restaurante) {

        $data = array(
            'cardapio_nome' => $cardapio_nome,
            'cardapio_restaurante' => $cardapio_restaurante,
            'cardapio_data' => date('d-m-Y'),
            'cardapio_hora' => date('H:i:s'),
        );

        return $this->db->update('cardapio_categorias', $data);
    }

    public function getCardapios($restaurante_id) {
        $this->db->where('cardapio_restaurante', $restaurante_id);
        $this->db->order_by('id','DESC');
        return $this->db->get('cardapio_categorias')->result();
    }

   

    public function getCardapio($id) {
        $this->db->where('id', $id);
      
        return $this->db->get('cardapio_categorias');

    }

   

    public function deleteCardapio($id, $restaurante) {
        $this->db->where('id', $id);
        $this->db->where('cardapio_restaurante', $restaurante);
        return $this->db->delete('cardapio_categorias');
    }

 


  
  
   



}
