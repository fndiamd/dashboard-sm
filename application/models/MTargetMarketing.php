<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MTargetMarketing_model extends CI_Model
{

  private $table = 'target_marketing';
  private $primaryKey = 'id_target';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAllRecord(){
    $this->db->order_by(['tahun' => 'desc', 'bulan' => 'desc']);
    return $this->db->get($this->table)->result();
  }

}

/* End of file MTargetMarketing_model.php */
/* Location: ./application/models/MTargetMarketing_model.php */
