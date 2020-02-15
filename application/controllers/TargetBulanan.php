<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TargetBulanan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MKategori', 'kategori');
  }

  public function index()
  {
    $data = [
      'title' => 'Target Bulanan',
      'kategori' => $this->kategori->getAllRecord()->result(),
      'page' => 'target_bulanan/index'
    ];

    $this->load->view('index', $data);
  }

  public function load()
  {
    if ($this->input->post('outlet')) {
      $outlet = $this->input->post('outlet');
      
      switch ($outlet) {
        case 'tomo':
          $sql = "select date_trunc('month', tanggal) as tgl, sum(nilai_jual) as revenue, sum(jml_transaksi) as transaksi from resume_transaksi_outlet_harian where id_produk = 'SBF' group by tgl order by tgl desc";
          break;
        case 'minimarket':
          $sql = "select date_trunc('month', tanggal) as tgl, sum(nilai_jual) as revenue, sum(jml_transaksi) as transaksi from resume_transaksi_outlet_harian where id_outlet in( select id_outlet from mt_outlet where upline in ('FA146895', 'FA207324')) group by tgl order by tgl desc";
          break;
        case 'ekspedisi':
          $sql = "select date_trunc('month', tanggal) as tgl, sum(nilai_jual) as revenue, sum(jml_transaksi) as transaksi from resume_transaksi_outlet_harian where id_produk in ('LOGLION', 'LOGIDL') group by tgl order by tgl desc";
          break;
        case 'travel':
          $sql = "select date_trunc('month', tanggal) as tgl, sum(nilai_jual) as revenue, sum(jml_transaksi) as transaksi from resume_transaksi_outlet_harian where id_produk like 'TP%' or id_produk like '%KAI' group by tgl order by tgl desc";
          break;
        case 'h2h':
          $sql = "select date_trunc('month', tanggal) as tgl, sum(nilai_jual) as revenue, sum(jml_transaksi) as transaksi from resume_transaksi_outlet_harian where id_outlet like 'HH%' or id_outlet like 'SP%' group by tgl order by tgl desc";
          break;
        case 'top 15 h2h':
          $sql = "select date_trunc('month', tanggal) as tgl, sum(nilai_jual) as revenue, sum(jml_transaksi) as transaksi from resume_transaksi_outlet_harian where id_outlet like 'HH%' group by tgl order by tgl desc";
          break;
        default:
          $sql = "select date_trunc('month', tanggal) as tgl, sum(nilai_jual) as revenue, sum(jml_transaksi) as transaksi from resume_transaksi_outlet_harian group by tgl order by tgl desc";
      }
    } else {
      $sql = "select date_trunc('month', tanggal) as tgl, sum(nilai_jual) as revenue, sum(jml_transaksi) as transaksi from resume_transaksi_outlet_harian group by tgl order by tgl desc";
    }

    $query = $this->db->query($sql);
    $data = [];
    $no = 1;

    foreach ($query->result() as $row) {
      $data[] = array(
        date_format(date_create($row->tgl), 'M Y'),
        'Rp' . number_format($row->revenue, 0, ',', '.'),
        number_format($row->transaksi, 0, ',', '.')
      );
    }

    $result = array(
      "data" => $data
    );

    echo json_encode($result);
    exit();
  }
}


/* End of file ResumeTransaksi.php */
/* Location: ./application/controllers/ResumeTransaksi.php */
