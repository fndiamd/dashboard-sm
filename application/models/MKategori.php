<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MKategori extends CI_Model {

  private $table = 'kategori';
  private $primaryKey = 'id_kategori';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAllRecord($ordering = 'asc'){
    $this->db->order_by($this->primaryKey, $ordering);
    return $this->db->get($this->table);
  }

}

/* End of file MKategori_model.php */
/* Location: ./application/models/MKategori_model.php */