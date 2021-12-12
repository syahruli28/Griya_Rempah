<?php 

class Blogin_model extends CI_Model {

	public function TampilkanProdukBaru()
	{
        // $this->db->order_by('name', 'ASC');
        // return $this->db->get('tb_dagangan')->result_array();
        // ->result_array();
        $this->db->order_by("tanggal_upload", "desc");
        $this->db->limit(8);
        return $this->db->get_where('tb_produk', ['stok_produk' >  0 ])->result_array();

        // return $query->result();
    }

    public function AmbilDataKategori()
	{
		return $this->db->get('tb_kategori')->result_array();
	}

    public function TampilkanSemuaProduk()
	{
        // $this->db->order_by('name', 'ASC');
        // return $this->db->get('tb_dagangan')->result_array();
        // ->result_array();
        // $this->db->order_by("tanggal_upload", "desc");
        return $this->db->get('tb_produk')->result_array();

        // return $query->result();
    }

    public function CariDataProduk()
	{
		$keyword = $this->input->post('keyword');
		$this->db->like('nama_produk_ind', $keyword);
		$this->db->or_like('nama_produk_en', $keyword);
		// return $this->db->get('tb_dagangan')->result_array();
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
		return $this->db->get()->result_array();
	}

    public function AmbilDataByNamaKategori($nama_kategori)
	{
        // $this->db->order_by('name', 'ASC');
        // return $this->db->get('tb_dagangan')->result_array();
        // ->result_array();

        // ambil dulu id_kategorinya
        $id = $this->db->get_where('tb_kategori', ['nama_kategori' => $nama_kategori])->row_array();
        $this->db->order_by("tanggal_upload", "desc");
        // 
        // $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
        return $this->db->get_where('tb_produk', ['id_kategori' =>  $id['id_kategori'] ])->result_array();

        // return $query->result();
    }

    public function AmbilDataGambarKategori($nama_kategori)
	{
		return $this->db->get_where('tb_kategori', ['nama_kategori' => $nama_kategori])->row_array();
	}

    public function AmbilDataByNamaProduk($nama_produk)
	{
        // ambil dulu id_kategorinya
        return $this->db->get_where('tb_produk', ['nama_produk_ind' => $nama_produk])->row_array();
        
        // return $this->db->get_where('tb_produk', ['id_produk' =>  $id['id_produk'] ])->result_array();

        // return $query->result();
    }

    public function DetailDataProduk($id)
	{
	    return $this->db->get_where('tb_produk', ['id_produk' => $id])->row_array();
    }

    // untuk ambil gambar kategori sesuai produk
    public function AmbilDataGambarKategoriProduk($nama_produk)
	{
		$id_kategori = $this->db->get_where('tb_produk', ['nama_produk_ind' => $nama_produk])->row_array();
        return $this->db->get_where('tb_kategori', ['id_kategori' =>  $id_kategori['id_kategori'] ])->row_array();
	}

    public function TampilkanTestimoni()
	{
        return $this->db->get('tb_testimoni')->result_array();
    }

}