<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SloginUser extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SloginUser_model');
        Is_logged_in_user();
	}

    public function Index()
	{
        $ses_email = $this->session->userdata('email_user');
        // $ses_level_user = $this->session->userdata('level_user_user');
        
		$data['judul'] = 'Halaman Dashboard | Griya Rempah';
        $data['profil'] = $this->SloginUser_model->AmbilDataProfile($ses_email);

		$this->load->view('template/template_header_slogin_user', $data);
		$this->load->view('sloginuser/slogin_user', $data);
		$this->load->view('template/template_footer_slogin_user');
	}

    public function TambahKeKeranjang($id)
	{
		$produk = $this->SloginUser_model->find($id);
		$data = array(
			'id'		=>	$produk->id_produk,
			'qty'		=>	1,
			'price'		=>	$produk->harga_produk_ind,
			'name'		=>	$produk->nama_produk_ind
		);
		$this->cart->insert($data);
		redirect('Blogin/TokoSemua');
	}

	public function Updatecart()
	{
		$i = 1;
		foreach($this->cart->contents() as $item ) {
			$data = array(
				'rowid' => $item['rowid'],
				'qty' => $this->input->post($i . '[qty]'),
			);
			$this->cart->update($data);
			$i++;
		}
		redirect('SloginUser');

	}

	public function hapussb($rowid)
	{
		$this->cart->remove($rowid);
		redirect('SloginUser');
	}

    public function HapusKeranjang()
	{
		$this->cart->destroy();
		redirect('Blogin');
	}

	public function FormPemesanan()
    {
        $data['judul'] = 'Form Pemesanan | Griya Rempah';

        // form validation
		$this->form_validation->set_rules('nama_penerima', 'Nama Penerima', 'required|min_length[3]', ['required' => '%s mohon diisi.',
		'min_length' => '%s harus diisi minimal 3 karakter.'
		]);
		$this->form_validation->set_rules('no_penerima', 'No. Hp Penerima', 'required|min_length[8]', ['required' => '%s mohon diisi.',
		'min_length' => '%s harus diisi minimal 8 karakter.'
		]);
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required', ['required' => '%s mohon diisi.'
		]);
		$this->form_validation->set_rules('kota', 'Kota/Kabupaten', 'required', ['required' => '%s mohon diisi.'
		]);
		$this->form_validation->set_rules('ekspedisi', 'Ekspedisi', 'required', ['required' => '%s mohon diisi.'
		]);
		$this->form_validation->set_rules('paket', 'Paket', 'required', ['required' => '%s mohon diisi.'
		]);
		$this->form_validation->set_rules('alamat_penerima', 'Alamat Penerima', 'required|min_length[12]', ['required' => '%s mohon diisi.',
		'min_length' => 'mohon mengisi kolom %s dengan detail (kecamatan, kelurahan ataupun nama jalan).'
		]);

        if ($this->form_validation->run() == FALSE ) {
			$this->load->view('sloginuser/form-pemesanan', $data);
			$this->load->view('template/template_footer_user');
        }else{

			// cek jumlah pembelian dengan sisa jumlah stok
			$i = 1;
			foreach($this->cart->contents() as $item){
				// $no_order = htmlspecialchars($this->input->post('no_order', true));
				$id_produk = $item['id'];
				$produk = $this->db->get_where('tb_produk', ['id_produk' => $id_produk])->row_array();
				$banyak_produk = $produk['stok_produk'];
				$banyak_beli = htmlspecialchars($this->input->post('qty'.$i++, true));

				if ($banyak_beli > $banyak_produk) {
					// echo 'WOY KEBANYAKAN'; die;
					$this->session->set_flashdata('msg-limit', 'Jumlah pembelian produk melebihi jumlah stok Kami, mohon kurangi stok pembelian.');
					redirect('SloginUser');
				}else{
					// echo 'NAH INI PAS'; die;
					$data = array(
						'id_user' => $this->session->userdata('id_user'),
						'no_order' => htmlspecialchars($this->input->post('no_order', true)),
						'tanggal_order' => date('Y-m-d'),
						'nama_penerima' => htmlspecialchars($this->input->post('nama_penerima', true)),
						'no_hp_penerima' => htmlspecialchars($this->input->post('no_penerima', true)),
						'provinsi' => htmlspecialchars($this->input->post('provinsi', true)),
						'kota' => htmlspecialchars($this->input->post('kota', true)),
						'alamat' => htmlspecialchars($this->input->post('alamat_penerima', true)),
						'kode_pos' => htmlspecialchars($this->input->post('kodepos', true)),
						'expedisi' => htmlspecialchars($this->input->post('ekspedisi', true)),
						'paket' => htmlspecialchars($this->input->post('paket', true)),
						'estimasi' => htmlspecialchars($this->input->post('estimasi', true)),
						'ongkir' => htmlspecialchars($this->input->post('ongkir', true)),
						'berat' => htmlspecialchars($this->input->post('berat', true)),
						'grand_total' => htmlspecialchars($this->input->post('grand_total', true)),
						'total_bayar' => htmlspecialchars($this->input->post('total_bayar', true)),
						'status_bayar' => '0',
						'status_order' => '0',
					);
					$this->SloginUser_model->SimpanTransaksi($data);
					// simpan rincian transaksi
					$i = 1;
					foreach($this->cart->contents() as $item){
						$data_rincian = array(
							'no_order' => htmlspecialchars($this->input->post('no_order', true)),
							'id_produk' => $item['id'],
							'qty' => htmlspecialchars($this->input->post('qty'.$i++, true)),
						);
						// masukan ke tb
						$this->SloginUser_model->SimpanRincianTransaksi($data_rincian);
					}
					// =====
					$this->cart->destroy();
		
					$this->session->set_flashdata('msg-success', 'Pesanan Anda telah Kami simpan, mohon lakukan <strong>pembayaran</strong> ke rekening Kami sesuai jumlah tagihan, Pesanan Anda akan Kami <strong>hapus</strong> dalam 2-3 hari bila Anda belum melakukan <strong><a href="https://api.whatsapp.com/send/?phone&text=No.%20Order%20%20%20%20%3A%0ANama%20Bank%20%20%20%20%3A%0ANo.%20Rekening%20%3A%0ARekening%20a.n.%3A`">konfirmasi pembayaran</a></strong>. Terimakasih');
					redirect('SloginUser/PesananSaya');
				}
			}


        }
    }

	public function PesananSaya()
	{
		$ses_email = $this->session->userdata('email_user');
		$data['profil'] = $this->SloginUser_model->AmbilDataProfile($ses_email);
		$id = $data['profil']['id_user'];

		$data['judul'] = 'Halaman Pesanan Saya | Griya Rempah';
		$data['pesanan'] = $this->SloginUser_model->AmbilDataPesananSaya($id);
		if ( $this->input->post('keyword') ) {
			$data['pesanan'] = $this->SloginUser_model->CariDataPesananSaya($id);
		}

		$this->load->view('template/template_header_slogin_user', $data);
		$this->load->view('sloginuser/halaman_pesanan_saya', $data);
		$this->load->view('template/template_footer_slogin_user');
	}

	public function DetailPesananSaya($no_order)
	{
		$data['pesanan'] = $this->SloginUser_model->AmbilPesananByNoOrder($no_order);
		$data['detail_pesanan'] = $this->SloginUser_model->AmbilDetailPesananByNoOrder($no_order);

		$data['judul'] = 'Validasi Pembayaran | Griya Rempah';

		// $this->load->view('template/template_header_admin', $data);
		$this->load->view('sloginuser/halaman_detail_pesanan_saya', $data);
		$this->load->view('template/template_footer_slogin_user');
		
	}

	public function Info()
	{
		$ses_email = $this->session->userdata('email_user');
        // $ses_level_user = $this->session->userdata('level_user_user');
        
		$data['judul'] = 'Halaman Dashboard | Griya Rempah';
        $data['profil'] = $this->SloginUser_model->AmbilDataProfile($ses_email);

		$data['judul'] = 'Info Belanja / Pembayaran | Griya Rempah';

		$this->load->view('template/template_header_slogin_user', $data);
		$this->load->view('sloginuser/halaman_info', $data);
		$this->load->view('template/template_footer_slogin_user');
		
	}

}