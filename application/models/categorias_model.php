<?php


class Categorias_model extends CI_Model {

    public function insertCategoria($cat_nome, $cart_descricao, $cat_imagem) {

        $data = array(
            'cat_nome' => $cat_nome,
            'cart_descricao' => $cart_descricao,
            'cat_imagem' => $cat_imagem,
        );

        return $this->db->insert('categorias', $data);
    }

    public function updateCategoria($cat_nome, $cart_descricao, $cat_imagem) {

        $data = array(
            'cat_nome' => $cat_nome,
            'cart_descricao' => $cart_descricao,
            'cat_imagem' => $cat_imagem,
        );

        return $this->db->update('categorias', $data);
    }

    public function getCategorias($id) {
        return $this->db->get('categorias')->result();
    }

    public function deleteCategorias($id) {
        $this->db->where('id', $id);
        return $this->db->delete('categorias');
    }


    public function getCategoria($id) {

        $this->db->where('id', $id);
        return $this->db->get('categorias')->row_array();
    }

  
   



}
