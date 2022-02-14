<?php


class Produtos_model extends CI_Model {

    public function insertProduto(
        $produto_nome,
        $produto_restaurante,
        $produto_descricao,
        $produto_categoria,
        $produto_imagem,
        $produto_valor,
        $produto_desconto_habilitado,
        $produto_desconto,
        $produto_desconto_tipo,
        $produto_cidade
        ) {

        $data = array(
            'produto_nome' => $produto_nome,
            'produto_restaurante' => $produto_restaurante,
            'produto_descricao' => $produto_descricao ,
            'produto_categoria' => $produto_categoria,
            'produto_imagem' => $produto_imagem,
            'produto_valor' => $produto_valor,
            'produto_desconto_habilitado' => $produto_desconto_habilitado,
            'produto_desconto' => $produto_desconto,
            'produto_desconto_tipo' => $produto_desconto_tipo,
            'produto_cidade' => $produto_cidade,
        );

        return $this->db->insert('cardapio_produtos', $data);
    }

    public function updateProduto(
        $produto_id,
        $produto_nome,
        $produto_descricao,
        $produto_categoria,
        $produto_imagem,
        $produto_valor,
        $produto_desconto_habilitado,
        $produto_desconto,
        $produto_desconto_tipo) {

        $data = array(
            'produto_nome' => $produto_nome,
            'produto_descricao' => $produto_descricao,
            'produto_categoria' => $produto_categoria,
            'produto_imagem' => $produto_imagem,
            'produto_valor' => $produto_valor,
            'produto_desconto_habilitado' => $produto_desconto_habilitado,
            'produto_desconto' => $produto_desconto,
            'produto_desconto_tipo' => $produto_desconto_tipo
        );

        $this->db->where('id', $produto_id);
        return $this->db->update('cardapio_produtos', $data);
    }

    public function getProduto($id) {
        $this->db->where('id',$id);
        return $this->db->get('cardapio_produtos')->row_array();
    }

    public function getProdutos() {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('cardapio_produtos')->result();
    }

    public function getProdutosByRestaurante($restaurante_id) {
        $this->db->order_by('id', 'DESC');
        $this->db->where('produto_restaurante', $restaurante_id);
        return $this->db->get('cardapio_produtos')->result();
    }

    public function getProdutosByCategoria($categoria_id) {
        $this->db->order_by('id', 'DESC');
        $this->db->where('produto_Categoria', $categoria_id);
        return $this->db->get('cardapio_produtos')->result();
    }

   
    public function deleteProduto($id, $restaurante) {
        $this->db->where('id', $id);
        $this->db->where('produto_restaurante', $restaurante);
        return $this->db->delete('cardapio_produtos');
    }

 


  
  
   



}
