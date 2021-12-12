<?php


class Cupom_model extends CI_Model {

    public function insertCupom($cupom_codigo, $cupom_descricao, $cupom_desconto, $cupom_desconto_tipo, $cupom_limite, $cupom_cidade, $cupom_estado, $cupom_user) {

        $data = array(
            'cupom_codigo' => $cupom_codigo,
            'cupom_descricao' => $cupom_descricao,
            'cupom_desconto' => $cupom_desconto,
            'cupom_desconto_tipo' => $cupom_desconto_tipo,
            'cupom_limite' => $cupom_limite,
            'cupom_cidade' => $cupom_cidade,
            'cupom_estado' => $cupom_estado ,
            'cupom_user' => $cupom_user
        );

        return $this->db->insert('cupons', $data);
    }

    public function getCupom($id) {

        $this->db->where('id', $id);
        return $this->db->get('cupons')->row_array();
    }

    public function getCuponsByCidade($cupom_cidade) {

        $this->db->where('cupom_cidade', $cupom_cidade);
        return $this->db->get('cupons')->result();
    }

    public function getCupomByCidade($id, $cupom_cidade) {
        $this->db->where('id', $id);
        $this->db->where('cupom_cidade', $cupom_cidade);
        return $this->db->get('cupons')->result();
    }


    public function getCuponsByEstado($cupom_estado) {

        $this->db->where('cupom_estado', $cupom_estado);
        return $this->db->get('cupons')->result();
    }

    public function getCupomByEstado($id, $cupom_estado) {
        $this->db->where('id', $id);
        $this->db->where('cupom_estado', $cupom_estado);
        return $this->db->get('cupons')->result();
    }

    public function getCupons() {

        return $this->db->get('cupons')->result();
    }

    public function updateCupom($cupom_codigo, $cupom_descricao, $cupom_desconto, $cupom_desconto_tipo, $cupom_limite, $cupom_cidade, $cupom_estado, $cupom_user) {

        $data = array(
            'cupom_codigo' => $cupom_codigo,
            'cupom_descricao' => $cupom_descricao,
            'cupom_desconto' => $cupom_desconto,
            'cupom_desconto_tipo' => $cupom_desconto_tipo,
            'cupom_limite' => $cupom_limite,
            'cupom_cidade' => $cupom_cidade,
            'cupom_estado' => $cupom_estado ,
            'cupom_user' => $cupom_user,
        );

        return $this->db->update('cupons', $data);
    }

    public function deleteCupom($id) {

        $this->db->where('id', $id);
        return $this->db->delete('cupons');
    }

    public function getCupomLimite($id) {

        $this->db->where('id', $id);
        return $this->db->get('cupons')['cupom_limite'];

    }

    public function PlusCupom($id, $cupom_limite) {

        $cupom_limite = ($cupom_limite + 1);

        $this->db->where('id', $id);

        $data = array(
            'cupom_limite' => $cupom_limite,
        );

        return $this->db->update('cupons', $data);

    }

    public function MinusCupom($id, $cupom_limite) {

        $cupom_limite = ($cupom_limite - 1);

        $this->db->where('id', $id);

        $data = array(
            'cupom_limite' => $cupom_limite,
        );

        return $this->db->update('cupons', $data);

    }

  
   



}
