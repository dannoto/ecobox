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












    

    public function addAcompanhamento($acompanhamento_nome,$acompanhamento_restaurante, $acompanhamento_produto ) {


        $data = array (
            'acompanhamento_nome' => $acompanhamento_nome,
            'acompanhamento_restaurante' => $acompanhamento_restaurante,
            'acompanhamento_produto' => $acompanhamento_produto
        ) ;

       return  $this->db->insert('cardapio_acompanhamentos', $data);

    }
    public function deleteAcompanhamento($acompanhamento_id) {

        $this->db->where('id', $acompanhamento_id);
        return $this->db->delete('cardapio_acompanhamentos');
    }

    public function deleteAcompanhamentoCarrinho($user) {

        $this->db->where('acompanhamento_user', $user);
        return $this->db->delete('carrinho_acompanhamentos');
    }

    public function addAcompanhamentoCarrinho($carrinho_user, $carrinho_produto, $acompanhamentos_nome, $carrinho_restaurante) {

        $data = array (
            'acompanhamento_user' => $carrinho_user,
            'acompanhamento_produto' => $carrinho_produto,
            'acompanhamento_restaurante' => $carrinho_restaurante,
            'acompanhamento_nome' => $acompanhamentos_nome,
        ) ;

       return  $this->db->insert('carrinho_acompanhamentos', $data);

    }

    public function addElemento($elemento_nome,$elemento_restaurante, $elemento_acompanhamento, $elemento_produto) {
        
        $data = array (
            'elemento_nome' => $elemento_nome,
            'elemento_restaurante' => $elemento_restaurante,
            'elemento_produto' => $elemento_produto,
            'elemento_acompanhamento' => $elemento_acompanhamento

        ) ;

       return  $this->db->insert('cardapio_elementos', $data);

    }

    public function deleteElemento($acompanhamento_id) {

        $this->db->where('id', $acompanhamento_id);
        return $this->db->delete('cardapio_elementos');
        
    }

    public function deleteElementoByAcompanhamento($acompanhamento_id) {

        $this->db->where('elemento_acompanhamento', $acompanhamento_id);
        return $this->db->delete('cardapio_elementos');
        
    }

    public function getAcompanhamentos($produto_id) {
        $this->db->where('acompanhamento_produto', $produto_id);
        $this->db->order_by('id','DESC');
        return $this->db->get('cardapio_acompanhamentos')->result();
    }

    public function getElementos($acompanhamento_id) {
        $this->db->where('elemento_acompanhamento', $acompanhamento_id);
        return $this->db->get('cardapio_elementos')->result();
    }
 


  
  
   



}
