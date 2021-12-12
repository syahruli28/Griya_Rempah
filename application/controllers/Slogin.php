<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slogin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Slogin_model');
		$this->load->model('SloginUser_model');
		Is_logged_in_admin();
	}

	public function HalamanDashboard()
	{
		// fetching data
		$data['produk'] = $this->Slogin_model->AmbilDataProduk();
		$data['admin'] = $this->Slogin_model->AmbilDataAdmin();
		$data['user'] = $this->Slogin_model->AmbilDataUser();
		$data['pesanan'] = $this->Slogin_model->AmbilDataAntrianPesanan();
		// 

		$data['judul'] = 'Halaman Dashboard | Griya Rempah';

		$this->load->view('template/template_header_admin', $data);
		$this->load->view('slogin/dashboard_admin');
		$this->load->view('template/template_footer_admin');
	}

	public function HalamanKategori()
	{

		$data['judul'] = 'Halaman Kategori | Griya Rempah';
		$data['kategori'] = $this->Slogin_model->AmbilDataKategori();
		if ( $this->input->post('keyword') ) {
			$data['kategori'] = $this->Slogin_model->CariDataKategori();
		}

		$this->load->view('template/template_header_admin', $data);
		$this->load->view('slogin/halaman_kategori_admin', $data);
		$this->load->view('template/template_footer_admin');
	}

	public function TambahKategori()
	{

		// form validation
		$this->form_validation->set_rules('namakategori', 'Nama', 'required|is_unique[tb_kategori.nama_kategori]');
		$this->form_validation->set_rules('kodekategori', 'Kode', 'required|min_length[3]|is_unique[tb_kategori.kode_kategori]');
		// $this->form_validation->set_rules('gambarkategori', 'Gambar', 'required');

		if ($this->form_validation->run() == FALSE ) {
			
			$data['judul'] = 'Tambah Kategori | Griya Rempah';

			$this->load->view('template/template_header_admin', $data);
			$this->load->view('slogin/halaman_tambah_kategori');
			$this->load->view('template/template_footer_admin');
		} else {
			$this->Slogin_model->TambahDataKategori();
			// flashdata
			$this->session->set_flashdata('msg-success', 'Ditambahkan');
			redirect('Slogin/HalamanKategori');
		}	
	}

	public function HapusDataKategori($id)
	{
		$data['kategori'] = $this->Slogin_model->AmbilKategoriById($id);
		$this->Slogin_model->HapusKategori($id, $data);
		// flashdata
		$this->session->set_flashdata('msg-success', 'Dihapus');
		redirect('Slogin/HalamanKategori');
	}

	public function UbahDataKategori($id)
	{
		$data['kategori'] = $this->Slogin_model->AmbilKategoriById($id);

		// form validation
		$this->form_validation->set_rules('namakategori', 'Nama', 'required');
		$this->form_validation->set_rules('kodekategori', 'Kode', 'required|min_length[3]');

		if ($this->form_validation->run() == FALSE ) {
			$data['judul'] = 'Edit Kategori | Griya Rempah';

			$this->load->view('template/template_header_admin', $data);
			$this->load->view('slogin/halaman_ubah_kategori', $data);
			$this->load->view('template/template_footer_admin');
		} else {
			$this->Slogin_model->UbahKategori($data);
			// flashdata
			$this->session->set_flashdata('msg-success', 'Diubah');
			redirect('Slogin/HalamanKategori');
		}
	}

	public function SettingLokasi()
    {
        $data['judul'] = 'Halaman Setting Lokasi | GRIYA REMPAH';
        $data['toko'] = $this->Slogin_model->AmbilDataToko();

        // form validation
		$this->form_validation->set_rules('kotakabupaten', 'Lokasi Toko', 'required|numeric');

        if ($this->form_validation->run() == FALSE ) {
            $this->load->view('template/template_header_admin', $data);
			$this->load->view('slogin/halaman_lokasi_toko', $data);
			$this->load->view('template/template_footer_admin');
        }else{
            $this->Slogin_model->UbahDataToko();
			// // flashdata
			$this->session->set_flashdata('msg-success', 'Diubah');
			redirect('Slogin/SettingLokasi');
        }
    }

	public function HalamanProduk()
	{

		$data['judul'] = 'Halaman Produk | Griya Rempah';
		$data['produk'] = $this->Slogin_model->AmbilDataProduk();
		if ( $this->input->post('keyword') ) {
			$data['produk'] = $this->Slogin_model->CariDataProduk();
		}

		$this->load->view('template/template_header_admin', $data);
		$this->load->view('slogin/halaman_produk_admin', $data);
		$this->load->view('template/template_footer_admin');
	}

	public function TambahProduk()
	{

		// form validation
		$this->form_validation->set_rules('npind', 'Nama Produk (Indonesia)', 'required|min_length[3]|is_unique[tb_kategori.nama_kategori]');
		$this->form_validation->set_rules('npen', 'Nama Produk (English)', 'required|min_length[3]|is_unique[tb_kategori.kode_kategori]');
		$this->form_validation->set_rules('hprp', 'Harga Produk (Indonesia)', 'required');
		$this->form_validation->set_rules('hpusd', 'Nama Produk (English)', 'required');
		$this->form_validation->set_rules('diskon', 'Diskon', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('beratproduk', 'Berat Produk', 'required');
		$this->form_validation->set_rules('stokproduk', 'Stok Produk', 'required');
		// $this->form_validation->set_rules('gambarkategori', 'Gambar', 'required');

		$data['kategori'] = $this->Slogin_model->AmbilDataKategori();

		if ($this->form_validation->run() == FALSE ) {
			
			$data['judul'] = 'Tambah Produk | Griya Rempah';

			$this->load->view('template/template_header_admin', $data);
			$this->load->view('slogin/halaman_tambah_produk', $data);
			$this->load->view('template/template_footer_admin');
		} else {
			$this->Slogin_model->tambahDataProduk();
			// flashdata
			$this->session->set_flashdata('msg-success', 'Ditambahkan');
			redirect('Slogin/HalamanProduk');
		}	
	}

	public function HapusDataProduk($id)
	{
		$data['produk'] = $this->Slogin_model->AmbilDataProdukId($id);
		$this->Slogin_model->HapusDataProduk($id, $data);
		// flashdata
		$this->session->set_flashdata('msg-success', 'Dihapus');
		redirect('Slogin/HalamanProduk');
	}

	public function UbahDataProduk($id)
	{
		$data['produk'] = $this->Slogin_model->AmbilDataProdukId($id);
		$data['diskon'] = ['Ada', 'Tidak'];
		$data['kategori'] = $this->Slogin_model->AmbilDataKategori();

		// form validation
		$this->form_validation->set_rules('npind', 'Nama Produk (Indonesia)', 'required|min_length[3]|is_unique[tb_kategori.nama_kategori]');
		$this->form_validation->set_rules('npen', 'Nama Produk (English)', 'required|min_length[3]|is_unique[tb_kategori.kode_kategori]');
		$this->form_validation->set_rules('hprp', 'Harga Produk (Indonesia)', 'required');
		$this->form_validation->set_rules('hpusd', 'Nama Produk (English)', 'required');
		$this->form_validation->set_rules('diskon', 'Diskon', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('beratproduk', 'Berat Produk', 'required');
		$this->form_validation->set_rules('stokproduk', 'Stok Produk', 'required');

		if ($this->form_validation->run() == FALSE ) {

			$data['judul'] = 'Edit Produk | Griya Rempah';

			$this->load->view('template/template_header_admin', $data);
			$this->load->view('slogin/halaman_ubah_produk', $data);
			$this->load->view('template/template_footer_admin');
		} else {
			$this->Slogin_model->UbahDataProduk($data);
			// flashdata
			$this->session->set_flashdata('msg-success', 'Diubah');
			redirect('Slogin/HalamanProduk');
		}
	}

	public function HalamanAdmin()
	{

		$data['judul'] = 'Halaman Admin | Griya Rempah';
		$data['admin'] = $this->Slogin_model->AmbilDataAdmin();
		if ( $this->input->post('keyword') ) {
			$data['admin'] = $this->Slogin_model->CariDataUser();
		}

		$this->load->view('template/template_header_admin', $data);
		$this->load->view('slogin/halaman_admin', $data);
		$this->load->view('template/template_footer_admin');
	}

	public function TambahAdmin()
	{

		// form validation
		$this->form_validation->set_rules('namaadmin', 'Nama Admin', 'required|min_length[3]|is_unique[tb_user.nama_user]',  [
			'is_unique' => 'Username sudah terdaftar, gunakan Username yang lainnya.'
		]);
		$this->form_validation->set_rules('notelpadmin', 'No. Telp Admin', 'required|min_length[10]|is_unique[tb_user.no_telp_user]',  [
			'is_unique' => 'No. Telpon sudah terdaftar, gunakan No. Telpon yang lainnya.'
		]);
		$this->form_validation->set_rules('emailadmin', 'Email', 'required|valid_email|is_unique[tb_user.email_user]',  [
			'is_unique' => 'Email sudah terdaftar, gunakan Email yang lainnya.'
		]);
		$this->form_validation->set_rules('passwordadmin1', 'Password', 'required|min_length[3]|matches[passwordadmin2]');
		$this->form_validation->set_rules('passwordadmin2', 'Password 2', 'required');

		// $data['kategori'] = $this->Slogin_model->AmbilDataKategori();

		if ($this->form_validation->run() == FALSE ) {
			
			$data['judul'] = 'Tambah Admin | Griya Rempah';

			$this->load->view('template/template_header_admin', $data);
			$this->load->view('slogin/halaman_tambah_admin', $data);
			$this->load->view('template/template_footer_admin');
		} else {
			$username = htmlspecialchars($this->input->post('namaadmin', true));
			$notelp = htmlspecialchars($this->input->post('notelpadmin', true));
            $email = htmlspecialchars($this->input->post('emailadmin', true));
            $password = htmlspecialchars(password_hash($this->input->post('passwordadmin1'), PASSWORD_DEFAULT));
            $data = array(
                'nama_user'    => $username,
                'no_telp_user'    => $notelp,
                'email_user'       => $email,
                'password_user'    => $password,
                'level_user'    => 1,
            );
            // print_r($data);die;
            $this->db->insert('tb_user', $data);
			$this->session->set_flashdata('msg-success', 'Ditambah');
            redirect('Slogin/HalamanAdmin');
		}	
	}

	public function HapusAdmin($id)
	{
		$data['admin'] = $this->Slogin_model->AmbilDataAdminId($id);
		$this->Slogin_model->HapusDataAdmin($id, $data);
		// redirect('admin/dataAdmin');
		$this->session->set_flashdata('msg-success', 'Dihapus');
		redirect('Slogin/HalamanAdmin');
	}

	public function UbahDataAdmin($id)
	{
		$data['admin'] = $this->Slogin_model->AmbilDataAdminId($id);

		// form validation
		$this->form_validation->set_rules('namaadmin', 'Nama Admin', 'required|min_length[3]');
		$this->form_validation->set_rules('notelpadmin', 'No. Telp Admin', 'required|min_length[10]');
		$this->form_validation->set_rules('emailadmin', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('passwordlama', 'Password Lama', 'required');
		$this->form_validation->set_rules('passwordadmin1', 'Password', 'required|min_length[3]|matches[passwordadmin2]');
		$this->form_validation->set_rules('passwordadmin2', 'Password 2', 'required');

		if ($this->form_validation->run() == FALSE ) {
			$data['judul'] = 'Edit Admin | Griya Rempah';

			$this->load->view('template/template_header_admin', $data);
			$this->load->view('slogin/halaman_ubah_admin', $data);
			$this->load->view('template/template_footer_admin');
		} else {
			$this->Slogin_model->UbahAdmin($data);
			// flashdata
			// $this->session->set_flashdata('msg-success', 'Diubah');
			redirect('Slogin/HalamanAdmin');
		}
	}

	public function HalamanUser()
	{

		$data['judul'] = 'Halaman User | Griya Rempah';
		$data['user'] = $this->Slogin_model->AmbilDataUser();
		if ( $this->input->post('keyword') ) {
			$data['user'] = $this->Slogin_model->CariDataUser();
		}

		$this->load->view('template/template_header_admin', $data);
		$this->load->view('slogin/halaman_user', $data);
		$this->load->view('template/template_footer_admin');
	}

	public function HapusUser($id)
	{
		$data['admin'] = $this->Slogin_model->AmbilDataAdminId($id);
		$this->Slogin_model->HapusDataAdmin($id, $data);
		// redirect('admin/dataAdmin');
		$this->session->set_flashdata('msg-success', 'Dihapus');
		redirect('Slogin/HalamanUser');
	}

	public function UbahDataUser($id)
	{
		$data['user'] = $this->Slogin_model->AmbilDataAdminId($id);

		// form validation
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[3]');
		$this->form_validation->set_rules('notelpwa', 'No. Telp', 'required|min_length[10]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('passwordlama', 'Password', 'required');
		$this->form_validation->set_rules('password1', 'Password', 'required|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required');

		if ($this->form_validation->run() == FALSE ) {
			$data['judul'] = 'Edit User | Griya Rempah';

			$this->load->view('template/template_header_admin', $data);
			$this->load->view('slogin/halaman_ubah_user', $data);
			$this->load->view('template/template_footer_admin');
		} else {
			$this->Slogin_model->UbahUser($data);
			// flashdata
			// $this->session->set_flashdata('msg-success', 'Diubah');
			redirect('Slogin/HalamanUser');
		}
	}

	public function HalamanAntrianPesanan()
	{
		$ses_email = $this->session->userdata('email_user');
		$data['profil'] = $this->SloginUser_model->AmbilDataProfile($ses_email);

		$data['judul'] = 'Halaman Antrian Pesanan | Griya Rempah';
		$data['pesanan'] = $this->Slogin_model->AmbilDataAntrianPesanan();
		if ( $this->input->post('keyword') ) {
			$data['pesanan'] = $this->Slogin_model->CariDataAntrianPesanan();
		}

		$this->load->view('template/template_header_admin', $data);
		$this->load->view('slogin/halaman_antrian_pesanan', $data);
		$this->load->view('template/template_footer_admin');
	}

	public function HapusDataPesanan($no_order)
	{
		$data['pesanan'] = $this->Slogin_model->AmbilPesananByNoOrder($no_order);
		$this->Slogin_model->HapusPesanan($no_order, $data);
		// flashdata
		$this->session->set_flashdata('msg-success', 'Dihapus');
		redirect('Slogin/HalamanAntrianPesanan');
	}

	public function HalamanValidasiPembayaran($no_order)
	{
		$data['pesanan'] = $this->Slogin_model->AmbilPesananByNoOrder($no_order);
		$data['detail_pesanan'] = $this->Slogin_model->AmbilDetailPesananByNoOrder($no_order);

		// form validation
		$this->form_validation->set_rules('atasnama', 'Atas nama', 'required');
		$this->form_validation->set_rules('namabank', 'Nama Bank', 'required');
		$this->form_validation->set_rules('norek', 'No. Rekening', 'required');
		$this->form_validation->set_rules('noresi', 'No. Resi', 'required');
		$this->form_validation->set_rules('statusorder', 'Status Order', 'required');

		if ($this->form_validation->run() == FALSE ) {
			$data['judul'] = 'Validasi Pembayaran | Griya Rempah';

			// $this->load->view('template/template_header_admin', $data);
			$this->load->view('slogin/halaman_validasi_pembayaran', $data);
			$this->load->view('template/template_footer_admin');
		} else {
			$this->Slogin_model->ValidasiPembayaran($data);
			// flashdata
			$this->session->set_flashdata('vld-success', 'Pembayaran berhasil di Validasi');
			redirect('Slogin/HalamanAntrianPesanan');
		}
	}

	public function HalamanPesananSelesai()
	{
		$ses_email = $this->session->userdata('email_user');
		$data['profil'] = $this->SloginUser_model->AmbilDataProfile($ses_email);

		$data['judul'] = 'Halaman Pesanan Selesai | Griya Rempah';
		$data['pesanan'] = $this->Slogin_model->AmbilDataPesananSelesai();
		if ( $this->input->post('keyword') ) {
			$data['pesanan'] = $this->Slogin_model->CariDataPesananSelesai();
		}

		$this->load->view('template/template_header_admin', $data);
		$this->load->view('slogin/halaman_pesanan_selesai', $data);
		$this->load->view('template/template_footer_admin');
	}

	public function HalamanFormValidasiPembayaran($no_order)
	{
		$data['pesanan'] = $this->Slogin_model->AmbilPesananByNoOrder($no_order);
		$data['detail_pesanan'] = $this->Slogin_model->AmbilDetailPesananByNoOrder($no_order);

		// form validation
		$this->form_validation->set_rules('atasnama', 'Atas nama', 'required');
		$this->form_validation->set_rules('namabank', 'Nama Bank', 'required');
		$this->form_validation->set_rules('norek', 'No. Rekening', 'required');
		$this->form_validation->set_rules('noresi', 'No. Resi', 'required');
		$this->form_validation->set_rules('statusorder', 'Status Order', 'required');

		if ($this->form_validation->run() == FALSE ) {
			$data['judul'] = 'Validasi Pembayaran | Griya Rempah';

			// $this->load->view('template/template_header_admin', $data);
			$this->load->view('slogin/halaman_form_pesanan_selesai', $data);
			$this->load->view('template/template_footer_admin');
		} else {
			$this->Slogin_model->ValidasiPembayaran($data);
			// flashdata
			$this->session->set_flashdata('vld-success', 'Pembayaran berhasil di Validasi');
			redirect('Slogin/HalamanPesananSelesai');
		}
	}

	public function HalamanTestimoni()
	{

		$data['judul'] = 'Halaman Testimoni | Griya Rempah';
		$data['testimoni'] = $this->Slogin_model->AmbilDataTestimoni();
		if ( $this->input->post('keyword') ) {
			$data['testimoni'] = $this->Slogin_model->CariDataTestimoni();
		}

		$this->load->view('template/template_header_admin', $data);
		$this->load->view('slogin/halaman_testimoni_admin', $data);
		$this->load->view('template/template_footer_admin');
	}

	public function TambahTestimoni()
	{

		// form validation
		$this->form_validation->set_rules('namat', 'Nama', 'required');
		$this->form_validation->set_rules('kalimatt', 'Kalimat', 'required');
		// $this->form_validation->set_rules('gambarkategori', 'Gambar', 'required');

		if ($this->form_validation->run() == FALSE ) {
			
			$data['judul'] = 'Tambah Testimoni | Griya Rempah';

			$this->load->view('template/template_header_admin', $data);
			$this->load->view('slogin/halaman_tambah_testimoni');
			$this->load->view('template/template_footer_admin');
		} else {
			$this->Slogin_model->TambahDataTestimoni();
			// flashdata
			$this->session->set_flashdata('msg-success', 'Ditambahkan');
			redirect('Slogin/HalamanTestimoni');
		}	
	}

	public function HapusDataTestimoni($id)
	{
		$data['testimoni'] = $this->Slogin_model->AmbilTestimoniById($id);
		$this->Slogin_model->HapusTestimoni($id, $data);
		// flashdata
		$this->session->set_flashdata('msg-success', 'Dihapus');
		redirect('Slogin/HalamanTestimoni');
	}

	public function UbahDataTestimoni($id)
	{
		$data['testimoni'] = $this->Slogin_model->AmbilTestimoniById($id);

		// form validation
		$this->form_validation->set_rules('namat', 'Nama', 'required');
		$this->form_validation->set_rules('kalimatt', 'Kalimat', 'required');

		if ($this->form_validation->run() == FALSE ) {
			$data['judul'] = 'Edit Testimoni | Griya Rempah';

			$this->load->view('template/template_header_admin', $data);
			$this->load->view('slogin/halaman_ubah_testimoni', $data);
			$this->load->view('template/template_footer_admin');
		} else {
			$this->Slogin_model->UbahTestimoni($data);
			// flashdata
			$this->session->set_flashdata('msg-success', 'Diubah');
			redirect('Slogin/HalamanTestimoni');
		}
	}

}