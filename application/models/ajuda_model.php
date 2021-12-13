<?php


class Ajuda_model extends CI_Model {

    // Categorias
    public function insertCategoria($categoria_nome, $categoria_descricao, $categoria_user, $categoria_data) {

        $data = array(
            'categoria_nome' => $categoria_nome,
            'categoria_descricao' => $categoria_descricao,
            'categoria_user' => $categoria_user,
            'categoria_data' => $categoria_data,
           
        );

        return $this->db->insert('ajuda_categorias', $data);
    }

    public function updateCategoria($categoria_nome, $categoria_descricao, $categoria_user, $categoria_data) {

        $data = array(
            'categoria_nome' => $categoria_nome,
            'categoria_descricao' => $categoria_descricao,
            'categoria_user' => $categoria_user,
            'categoria_data' => $categoria_data,
           
        );

        return $this->db->update('ajuda_categorias', $data);
    }

    public function getCategoria($id) {

        $this->db->where('id', $id);

        return $this->db->get('ajuda_categorias')->row_array();
    }

    public function getCategorias() {

        return $this->db->get('ajuda_categorias')->result();
    }

    public function deleteCategoria($id) {

        $this->db->where('id', $id);
        

        return $this->db->delete('ajuda_categorias');
    }

    

    // Artigos

    public function insertArtigo($artigo_categoria, $artigo_titulo, $artigo_conteudo, $artigo_data, $artigo_user) {

        $data = array(
            'artigo_categoria' => $artigo_categoria,
            'artigo_titulo' => $artigo_titulo,
            'artigo_conteudo' => $artigo_conteudo,
            'artigo_data' => $artigo_data,
            'artigo_user' => $artigo_user,
        );

        return $this->db->insert('ajuda_artigos', $data);
    }

    public function getArtigo($id) {

        $this->db->where('id', $id);
        return $this->db->get('ajuda_artigos')->row_array();

    }
   
    public function getArtigosByCategoria($artigo_categoria) {

        $this->db->where('artigo_categoria', $artigo_categoria);
        return $this->db->get('ajuda_artigos')->result();
    }

    public function updateArtigo($artigo_categoria, $artigo_titulo, $artigo_conteudo, $artigo_data, $artigo_user) {

        $data = array(
            'artigo_categoria' => $artigo_categoria,
            'artigo_titulo' => $artigo_titulo,
            'artigo_conteudo' => $artigo_conteudo,
            'artigo_data' => $artigo_data,
            'artigo_user' => $artigo_user,
        );

        return $this->db->update('ajuda_artigos', $data);
    }

    public function deleteArtigo($id) {

        $this->db->where('id', $id);
        return $this->db->delete('ajuda_artigos');
    }



}
