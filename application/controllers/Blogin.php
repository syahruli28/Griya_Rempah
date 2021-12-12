<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	// 	$this->load->model('Pengunjung_model');
		$this->load->model('Blogin_model');
		$this->load->model('SloginUser_model');
	// 	$this->load->helper('form');
	// 	$this->load->library('form_validation');
	}

    public function Index()
	{
		$data['produk'] = $this->Blogin_model->TampilkanProdukBaru();
		$data['testimoni'] = $this->Blogin_model->TampilkanTestimoni();
		$data['kategori'] = $this->Blogin_model->AmbilDataKategori();
		if ( $this->input->post('keyword') ) {
			$key = htmlspecialchars($this->input->post('keyword', true));
			$this->CariProduk($key);
		}else{
			$data['judul'] = 'GRIYA REMPAH | Warisan Alami Kekayaan Nusantara';
			$data['desc'] = 'Pusat beli Rempah, Kurma, Madu dan Warisan Alami Kekayaan Nusantara Termurah.';

			$this->load->view('template/template_header_user', $data);
			$this->load->view('blogin/index', $data);
			$this->load->view('template/template_footer_user');
		}
    }

	public function Error404()
	{
		$this->load->view('errors/halaman_404');
	}

	public function CariProduk($key=null)
	{
		// $this->load->model('Admin_model');
		if ($key){
			
			$data['judul'] = 'GRIYA REMPAH | Cari Produk';
			$data['desc'] = 'Cari | Pusat beli Rempah, Kurma, Madu dan Warisan Alami Kekayaan Nusantara Termurah.';
			$data['produk'] = $this->Blogin_model->CariDataProduk();

			$this->load->view('template/template_header_user', $data);
			$this->load->view('blogin/toko-cari-barang', $data);
			$this->load->view('template/template_footer_user');
		}else{
			$data['judul'] = 'GRIYA REMPAH | Semua Produk';
			$data['produk'] = $this->Blogin_model->TampilkanSemuaProduk();
			if ( $this->input->post('keyword') ) {
				$data['produk'] = $this->Blogin_model->CariDataProduk();
			}
			$this->load->view('template/template_header_user', $data);
			$this->load->view('blogin/toko-semua-barang', $data);
			$this->load->view('template/template_footer_user');
		}
	}

	public function TokoSemua()
	{
		$data['judul'] = 'GRIYA REMPAH | Semua Produk';
		$data['desc'] = ' Semua Produk | Pusat beli Rempah, Kurma, Madu dan Warisan Alami Kekayaan Nusantara Termurah.';
		$data['produk'] = $this->Blogin_model->TampilkanSemuaProduk();
		if ( $this->input->post('keyword') ) {
			$key = htmlspecialchars($this->input->post('keyword', true));
			$this->CariProduk($key);
		}else{
			$this->load->view('template/template_header_user', $data);
			$this->load->view('blogin/toko-semua-barang', $data);
			$this->load->view('template/template_footer_user');
		}
	}

    public function KeranjangBelanja()
    {
        $data['judul'] = 'GRIYA REMPAH | Keranjang Belanja';
		if ( $this->input->post('keyword') ) {
			$key = htmlspecialchars($this->input->post('keyword', true));
			$this->CariProduk($key);
		}else{
			$data['desc'] = 'Keranjang Belanja | Pusat beli Rempah, Kurma, Madu dan Warisan Alami Kekayaan Nusantara Termurah.';
			// $this->load->view('template/template_header_user', $data);
			$this->load->view('blogin/keranjang-belanja', $data);
			$this->load->view('template/template_footer_user');
		}
    }

    public function HalamanGaleri()
    {
        $data['judul'] = 'GRIYA REMPAH | Galeri';
		$data['desc'] = 'Galeri Foto | Pusat beli Rempah, Kurma, Madu dan Warisan Alami Kekayaan Nusantara Termurah.';
		if ( $this->input->post('keyword') ) {
			$key = htmlspecialchars($this->input->post('keyword', true));
			$this->CariProduk($key);
		}else{
			$this->load->view('template/template_header_user', $data);
			$this->load->view('blogin/galeri', $data);
			$this->load->view('template/template_footer_user');
		}
    }

    public function HalamanTentangKami()
    {
        $data['judul'] = 'GRIYA REMPAH | Tentang Kami';
		$data['desc'] = 'Tentang Kami & FAQ | Pusat beli Rempah, Kurma, Madu dan Warisan Alami Kekayaan Nusantara Termurah.';
		if ( $this->input->post('keyword') ) {
			$key = htmlspecialchars($this->input->post('keyword', true));
			$this->CariProduk($key);
		}else{
			$this->load->view('template/template_header_user', $data);
			$this->load->view('blogin/tentangkami', $data);
			$this->load->view('template/template_footer_user');
		}
    }

    public function TambahUser()
	{

		if($this->session->userdata('email_user')){
			redirect('Slogin/HalamanDashboard');
		}

		// form validation
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|is_unique[tb_user.nama_user]',  [
			'is_unique' => 'Username sudah terdaftar, gunakan Username yang lainnya.'
		]);
		$this->form_validation->set_rules('notelpwa', 'No. Telp', 'required|min_length[10]|is_unique[tb_user.no_telp_user]',  [
			'is_unique' => 'No. Telpon sudah terdaftar, gunakan No. Telpon yang lainnya.'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tb_user.email_user]',  [
			'is_unique' => 'Email sudah terdaftar, gunakan Email yang lainnya.'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|min_length[3]|matches[password2]',  [
			'matches' => 'Konfirmasi password tidak sama, mohon ketik dengan benar.'
		]);
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required');

		// $data['kategori'] = $this->Slogin_model->AmbilDataKategori();

		if ($this->form_validation->run() == FALSE ) {
			$data['desc'] = 'Buat Akun | Pusat beli Rempah, Kurma, Madu dan Warisan Alami Kekayaan Nusantara Termurah.';
			$this->load->view('blogin/buat-akun', $data);
			$this->load->view('template/template_footer_user');
		} else {
			$username = htmlspecialchars($this->input->post('username', true));
			$notelp = htmlspecialchars($this->input->post('notelpwa', true));
            $email = htmlspecialchars($this->input->post('email', true));
            $password = htmlspecialchars(password_hash($this->input->post('password1', true), PASSWORD_DEFAULT));
            $data = array(
                'nama_user'    => $username,
                'no_telp_user'    => $notelp,
                'email_user'       => $email,
                'password_user'    => $password,
                'level_user'    => 2,
            );
            // print_r($data);die;
            $this->db->insert('tb_user', $data);
			$this->session->set_flashdata('msg-success', 'Dibuat');
            redirect('Auth');
		}	
	}

	public function Kategori($nama_kategori)
	{
		// replace %20 dengan spasi
		$nama_kategori = str_replace("%20"," ", $nama_kategori);
		$data['judul_kategori'] = $nama_kategori;
		// echo $nama_kategori;die;
		$data['judul'] = 'GRIYA REMPAH | Kategori';
		$data['desc'] = 'Produk Kategori | Pusat beli Rempah, Kurma, Madu dan Warisan Alami Kekayaan Nusantara Termurah.';
		$data['gambar_kategori'] = $this->Blogin_model->AmbilDataGambarKategori($nama_kategori);
		$data['kategori'] = $this->Blogin_model->AmbilDataByNamaKategori($nama_kategori);
		if ( $this->input->post('keyword') ) {
			$key = htmlspecialchars($this->input->post('keyword', true));
			$this->CariProduk($key);
		}else{
			$this->load->view('template/template_header_user', $data);
			$this->load->view('blogin/toko-kategori', $data);
			$this->load->view('template/template_footer_user');
		}
		// $this->Slogin_model->HapusKategori($nama_kategori, $data);
		// flashdata
		// $this->session->set_flashdata('msg-success', 'Dihapus');
		// redirect('Slogin/HalamanKategori');
	}

	public function DetailProduk($nama_produk)
	{
		// replace %20 dengan spasi
		$nama_produk = str_replace("%20"," ", $nama_produk);
		
		$data['judul'] = 'GRIYA REMPAH | Detail Produk';
		$data['desc'] = 'Detail Produk | Pusat beli Rempah, Kurma, Madu dan Warisan Alami Kekayaan Nusantara Termurah.';
		// $data['detail'] = $this->Pengunjung_model->getHewanById($id);
		// $data['kategori'] = $this->Admin_model->getAllKategori();
		$data['gambar_kategori'] = $this->Blogin_model->AmbilDataGambarKategoriProduk($nama_produk);
		$data['produk'] = $this->Blogin_model->AmbilDataByNamaProduk($nama_produk);
		// $data['detail'] = $this->Blogin_model->DetailDataProduk($nama_produk);

		if ( $this->input->post('keyword') ) {
			$key = htmlspecialchars($this->input->post('keyword', true));
			$this->CariProduk($key);
		}else{
			$this->load->view('template/template_header_user', $data);
			$this->load->view('blogin/toko-details', $data);
			$this->load->view('template/template_footer_user');
		}
    }

}