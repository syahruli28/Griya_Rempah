<?php 

class Sloginuser_model extends CI_Model {

    public function AmbilDataProfile($ses_email)
	{
		return $this->db->get_where('tb_user', ['email_user' => $ses_email])->row_array();
	}

    public function find($id)
    {
        $hasil = $this->db->where('id_produk', $id)
                            ->limit(1)
                            ->get('tb_produk');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        }else{
            return array();
        }
    }

    public function GetBarangById($id)
	{
	    return $this->db->get_where('tb_produk', ['id_produk' => $id])->row_array();
    }

    public function SimpanTransaksi($data)
	{
        $this->db->insert('tb_transaksi', $data); 
    }

    public function SimpanRincianTransaksi($data_rincian)
	{
        $this->db->insert('tb_rincian_transaksi', $data_rincian);
    }

    public function AmbilDataPesananSaya($id)
    {
		$this->db->order_by("tanggal_order", "desc");
        return $this->db->get_where('tb_transaksi', ['id_user' => $id])->result_array();
    }

    public function CariDataPesananSaya($id)
	{
		$keyword = $this->input->post('keyword');
		$this->db->like('tanggal_order', $keyword);
		$this->db->or_like('no_order', $keyword);
		return $this->db->get_where('tb_transaksi', ['id_user' => $id])->result_array();
	}

    public function AmbilPesananByNoOrder($no_order)
	{
		return $this->db->get_where('tb_transaksi', ['no_order' => $no_order])->row_array();
	}

    // ini salah nama function, tapi aman.
    public function AmbilDetailPesananByNoOrder($no_order)
	{
		$this->db->select('*');
		$this->db->from('tb_rincian_transaksi');
		$this->db->join('tb_produk', 'tb_produk.id_produk = tb_rincian_transaksi.id_produk', 'left');
		return $this->db->get()->result_array();

		// return $this->db->get_where('tb_rincian_transaksi', ['no_order' => $no_order])->result_array();
	}

}