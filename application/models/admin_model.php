<?php


class Admin_model extends CI_Model {

    // LOGIN
    public function auth($email, $password) {
        $this->db->where('admin_email', $email);
        $this->db->where('admin_password', $password);

        return $this->db->get('admin')->row_array();

    }
    // LOGIN


    // DASHBOARD
    public function countRestaurantes() {
        return $this->db->count_all_results('restaurantes');

    }
    public function countUsuarios() {
        return $this->db->count_all_results('usuarios');

    }
    public function countPedidosConcluidos() {

        $where = '(pedido_status="4" or pedido_status="5")';
        $this->db->where($where);
        return $this->db->count_all_results('pedidos');

    }

    public function countPedidosAndamento() {

        $where = '(pedido_status="1" or pedido_status="2")';
        $this->db->where($where);
        return $this->db->count_all_results('pedidos');

    }

    public function countVendas() {
        $where = '(pedido_status="4" or pedido_status="5")';
        $this->db->where($where);
        $data =  $this->db->get('pedidos')->result();


        $total = 0;
        foreach ($data as $d) {

            $total = $total + $d->pedido_total;
        }

        return round($total,2);
    }

    public function countPedidosCancelados() {

        $this->db->where('pedido_status', '3');
        return $this->db->count_all_results('pedidos');
        
    }
    // DASHBOARD


    // USUARIOS
    public function getUsuarios() {
        return $this->db->get('usuarios')->result();
    }

    public function getUsuario($id) {
        $this->db->where('id', $id);
        return $this->db->get('usuarios')->result();
    }

    public function banirUsuario($id) {
        $this->db->where('id', $id);

        $data = array(
            'user_status' => 0,
        );
        return $this->db->update('usuarios', $data);
    }
    // USUARIOS


    // RESTAURANTES
    public function getRestaurantes() {
        return $this->db->get('restaurantes')->result();
    }

    public function getRestaurante($id) {
        $this->db->where('id', $id);
        return $this->db->get('restaurantes')->result();
    }

    // public function banirUsuario($id) {
    //     $this->db->where('id', $id);

    //     $data = array(
    //         'user_status' => 0,
    //     );
    //     return $this->db->update('usuarios', $data);
    // }

    // RESTAURANTES


    // CATEGORIAS

    public function insertCategoria($nome, $imagem) {

        $data = array(
            'cat_nome' => $nome,
            'cat_imagem' => $imagem,
        );

        return $this->db->insert('categorias', $data);
    }
    public function getCategorias() {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('categorias')->result();
    }

    public function deleteCategoria($id) {
        $this->db->where('id',$id);
        return $this->db->delete('categorias');
    }

    // CATEGORIAS


    // CUPONS

    public function getCupons() {
    $this->db->order_by('id','desc');
        return $this->db->get('cupons')->result();
    }

    public function insertCupom($cupom_codigo, $cupom_desconto, $cupom_minimo ) {
        $data = array(
            'cupom_codigo' => $cupom_codigo,
            'cupom_desconto' => $cupom_desconto,
            'cupom_minimo' => $cupom_minimo,
        );

        return $this->db->insert('cupons', $data);
    }

    public function deleteCupom($id) {
        $this->db->where('id',$id);
        return $this->db->delete('cupons');
    }
    // CUPONS


    // TERMOS
    public function getTermos() {
        return $this->db->get('termos')->row_array();
    }
    
    public function updateTermos($termos_nome, $termos_conteudo) {


        $data = array(
            'termos_nome' => $termos_nome,
            'termos_conteudo' => $termos_conteudo,
        );

        return $this->db->update('termos', $data);
    }
    // TERMOS


        // PRIVACIDADE
        public function getPrivacidade() {
            return $this->db->get('privacidade')->row_array();
        }
        
        public function updatePrivacidade($privacidade_nome, $privacidade_conteudo) {
    
            
            $data = array(
                'privacidade_nome' => $privacidade_nome,
                'privacidade_conteudo' => $privacidade_conteudo,
            );
    
            return $this->db->update('privacidade', $data);
        }
        // PRIVACIDADE
    





        // GET VENDAS
        public function getVendas() {
            $where = '(pedido_status="4" or pedido_status="5")';
            $this->db->where($where);
            return $this->db->get('pedidos')->result();
        }

        public function getVendasById($id) {
            $this->db->where('id',$id);
            return $this->db->get('pedidos')->result();
        }
        //  GET VENDAS


        // BUSCA
        public function searchRestaurante($cidade, $estado, $nome) {

            if (strlen($cidade) > 0 ) {
                $this->db->where('restaurante_cidade', $cidade);
            }

            if (strlen($estado) > 0 ) {
                $this->db->where('restaurante_estado', $cidade);
            }

            if (strlen($nome)  > 0) {
                $this->db->like('restaurante_nome', $nome);
            }

            return $this->db->get('restaurantes')->result();

        }
    


        // GERENTES

        public function insertGerentes($nome, $sobrenome, $email, $senha) {


            $data = array (
                'admin_status' => 2,
                'admin_nome' => $nome,
                'admin_sobrenome' => $sobrenome,
                'admin_email' => $email,
                'admin_password' => $senha
            );

            return  $this->db->insert('admin', $data);        

        }

        public function getGerentes() {
            $this->db->where('admin_status', '2');
            return  $this->db->get('admin')->result();

        }

        public function deleteGerente($id) {
            $this->db->where('id', $id);
            return $this->db->delete('admin');
        }


        public function getCategoriasFAQ() {
            $this->db->order_by('id', 'desc');
            return  $this->db->get('ajuda_categorias')->result();
        }

        public function getArtigo($id) {
            $this->db->order_by('id', 'desc');
            $this->db->where('artigo_categoria', $id);
            return  $this->db->get('ajuda_artigos')->result();
        }




        public function addArtigo($categoria,$titulo,$conteudo) {

            $data = array(
                'artigo_categoria' => $categoria,
                'artigo_titulo' =>  $titulo,
                'artigo_conteudo' =>  $conteudo,
                'artigo_data' => date('d-m-Y'),
                'artigo_user' => '1',
            );
            return  $this->db->insert('ajuda_artigos', $data);

        }

        public function deleteArtigo($id) {
            $this->db->where('id', $id);
            return  $this->db->delete('ajuda_artigos');

        }

        public function addCategoria($nome) {
            
            $data = array(
                'categoria_nome' => $nome,
                'categoria_descricao' =>  '',
                'categoria_data' => date('d-m-Y'),
                'categoria_user' => '1',
            );

            return  $this->db->insert('ajuda_categorias', $data);


        }

        public function deleteCategoriaFAQ($id) {

            $this->db->where('id', $id);
            return  $this->db->delete('ajuda_categorias');

        }



        public function routeAuth() {

            if ($this->session->userdata('session_admin')) {
           
            } else {
                redirect('admin');
            }
        }
}