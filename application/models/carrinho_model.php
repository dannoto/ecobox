<?php


class Carrinho_model extends CI_Model {

    public function insertProdutoCarrinho($carrinho_user, $carrinho_restaurante, $carrinho_produto, $carrinho_valor, $carrinho_quantidade) {

        $data = array(
            'carrinho_user' => $carrinho_user,
            'carrinho_restaurante' => $carrinho_restaurante,
            'carrinho_produto' => $carrinho_produto,
            'carrinho_data' => date('d-m-Y'),
            'carrinho_hora' => date('H:i:s'),
            'carrinho_valor' => $carrinho_valor, 
            'carrinho_quantidade' => $carrinho_quantidade,
        );

        return $this->db->insert('carrinho_produtos', $data);
    }

    public function existeProdutoCarrinho($carrinho_user, $carrinho_produto) {
        $this->db->where('carrinho_user', $carrinho_user);
        $this->db->where('carrinho_produto', $carrinho_produto);
        return $this->db->count_all_results('carrinho_produtos');
    }

    public function getCarrinho( $carrinho_user) {
        $this->db->where('carrinho_user', $carrinho_user);
        return $this->db->get('carrinho_produtos');
    }

    public function getCarrinhoUser( $carrinho_user) {
        $this->db->where('carrinho_user', $carrinho_user);
        return $this->db->get('carrinho_produtos')->result();
    }

    public function getQuantidadeProdutoCarrinho($carrinho_user, $carrinho_produto) {
        $this->db->where('carrinho_user', $carrinho_user);
        $this->db->where('carrinho_produto', $carrinho_produto);
        return $this->db->get('carrinho_produtos')->row_array()['carrinho_quantidade'];
    }


    public function getCarrinhoRestaurante($carrinho_user) {
        $this->db->distinct();
        $this->db->select('carrinho_restaurante');
        $this->db->where('carrinho_user', $carrinho_user); 
        return $this->db->get('carrinho_produtos')->result();
    }

    public function getProdutoQuantidade($carrinho_produto) {
        $this->db->where('carrinho_produto', $carrinho_produto); 
        return $this->db->get('carrinho_produtos')->row_array()['carrinho_quantidade'];
    }


    public function deleteProduto($carrinho_produto) {
        $this->db->where('carrinho_produto', $carrinho_produto); 
        return $this->db->delete('carrinho_produtos');
    }

    public function getRestauranteFrete($carrinho_restaurante) {
        $this->db->where('id', $carrinho_restaurante); 
        return $this->db->get('restaurantes')->row_array()['restaurante_frete'];
    }

    public function getCheckoutTotal($carrinho_pedido, $carrinho_frete, $carrinho_desconto) {

   
        // Adicionando desconto
        $desconto_porcentagem = ($carrinho_desconto/100);
        $desconto = ($carrinho_pedido * $desconto_porcentagem);
        $desconto_total = ( ($carrinho_pedido - $desconto) + $carrinho_frete );
       
        return $desconto_total;

    }

    public function getTotalByRestaurante($carrinho_restaurante) {
        $this->db->where('carrinho_restaurante', $carrinho_restaurante); 
        $data = $this->db->get('carrinho_produtos')->result();

        $total = 0;

        foreach ($data as $a) {
            $quantidade = $a->carrinho_quantidade;
            $valor = $a->carrinho_valor;

            $subtotal = ($quantidade * $valor);
            $total = $total + $subtotal;
        }


        return $total;
    }

    public function getCarrinhoByRestaurante($carrinho_restaurante) {
        $this->db->where('carrinho_restaurante', $carrinho_restaurante); 
        return $this->db->get('carrinho_produtos')->result();
    }

    public function getCarrinhoAcompanhamento($carrinho_user) {
        $this->db->where('acompanhamento_user', $carrinho_user); 
        return $this->db->get('carrinho_acompanhamentos')->result();
    }

    public function countCarrinhoByUser($carrinho_user) {
        $this->db->where('carrinho_user', $carrinho_user);
        return $this->db->count_all_results('carrinho_produtos');
    }

    public function somaProdutoCarrinhoQuantidade($carrinho_user, $carrinho_produto, $carrinho_quantidade_atual, $carrinho_quantidade_antiga) {
      
        $nova_quantidade = ($carrinho_quantidade_atual + $carrinho_quantidade_antiga);

        $this->db->where('carrinho_user', $carrinho_user);
        $this->db->where('carrinho_produto', $carrinho_produto);
        
        $data = array(
            'carrinho_quantidade' => $nova_quantidade,
        );
        
        return  $this->db->update('carrinho_produtos', $data ); 

       

    }

    public function deleteProdutoCarrinho( $carrinho_user, $carrinho_produto) {
        $this->db->where('carrinho_user', $carrinho_user);
        $this->db->where('carrinho_produto', $carrinho_produto);
        return $this->db->delete('carrinho_produtos');
    }

    public function deleteCarrinho($carrinho_user, $carrinho_restaurante) {
        $this->db->where('carrinho_user', $carrinho_user);
        $this->db->where('carrinho_restaurante', $carrinho_restaurante);
        return $this->db->delete('carrinho_produtos');
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
