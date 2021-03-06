<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('id')){
            redirect('index.php/welcome');
        }
    }

    public function index()
    {
        $data['title'] = 'Riwayat';
        $data['riwayat'] = $this->m_model->get('tb_riwayat')->result();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/riwayat', $data);
        $this->load->view('admin/templates/footer');
    }

    public function delete($id)
    {
        $where = array('id' => $id );

        $riwayatBarang = $this->m_model->get_where($where, 'tb_riwayat')->result();

        foreach ($riwayatBarang as $rBrg) {
            $dataRiwayat = array(
                'kode'      => $rBrg->kode,
                'jenis'     => $rBrg->jenis,
                'jumlah'    => $rBrg->jumlah
            );

            $whereBarang = array('kode' => $rBrg->kode);

            $barang = $this->m_model->get_where($whereBarang, 'tb_barang')->result();

            foreach ($barang as $brg) {
                $dataBarang = array(
                    'stok' => $brg->stok
                );
            }

            if($rBrg->jenis == 'Masuk'){
                $updateStok = array(
                    'stok' => $brg->stok - $rBrg->jumlah
                );
            } else {
                $updateStok = array(
                    'stok' => $brg->stok + $rBrg->jumlah
                );
            }
        }

        $this->m_model->delete($where, 'tb_riwayat');
        $this->m_model->update($whereBarang, $updateStok, 'tb_barang');
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
        redirect('index.php/admin/riwayat');
    }
}