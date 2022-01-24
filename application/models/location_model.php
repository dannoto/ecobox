<?php


class location_model extends CI_Model {


   

    public function getEstados() {

        
        return $this->db->get('estado')->result();
      
    
    }

    public function getCidades($estado) {

        $this->db->where('Uf', $estado);
        return $this->db->get('municipio')->result();
    }


}
