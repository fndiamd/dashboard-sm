<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MResumeTransaksi_model extends CI_Model
{
  private $table = 'resume_transaksi_outlet_harian';
  private $primaryKey = 'id';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAllRecord(){
    $this->db->order_by('tanggal', 'desc');
    return $this->db->get($this->table);
  }

  public function getRecordOutlet($clause){
    $this->db->where($clause);
    return $this->db->get($this->table);
  }
}

/* End of file MResumeTransaksi_model.php */
/* Location: ./application/models/MResumeTransaksi_model.php */
