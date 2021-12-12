<?php 

class Slogin_model extends CI_Model {

    public function AmbilDataKategori()
	{
		return $this->db->get('tb_kategori')->result_array();
	}

    public function AmbilKategoriById($id)
	{
		return $this->db->get_where('tb_kategori', ['id_kategori' => $id])->row_array();
	}

	public function CariDataKategori()
	{
		$keyword = htmlspecialchars($this->input->post('keyword', true));
		$this->db->like('nama_kategori', $keyword);
		$this->db->or_like('kode_kategori', $keyword);
		return $this->db->get('tb_kategori')->result_array();
	}

    public function TambahDataKategori()
        {
            $namakategori	= htmlspecialchars($this->input->post('namakategori', true));
            $kodekategori	= htmlspecialchars($this->input->post('kodekategori', true));
            $gambar			= $_FILES['gambarkategori'];
            if ($gambar=''){}else{
                $config['upload_path']	=	'./assets/griyarempah/img/gambarweb';
                $config['allowed_types']	=	'jpg|png';
                $config['encrypt_name']	=	true;
                
                $this->load->library('upload');
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambarkategori')){
                    echo "Upload Gagal"; die();
                }else{
                    $gambar=$this->upload->data('file_name');
                }
            }
            
            $data = array(
                'nama_kategori'			=> $namakategori,
                'kode_kategori'         => $kodekategori,
                'gambar_kategori'		=> $gambar,
            );
            // print_r($data);die;
            $this->db->insert('tb_kategori', $data);
        }

        public function HapusKategori($id, $data)
        {
            // $gambar = $data['kategori']['gambar_kategori'];
            // if ($gambar){
            //     unlink(FCPATH . 'assets/griyarempah/img/gambarweb/' . $gambar);
            //         // hapus gambar lama 
            // }
            // $this->db->where('id_kategori', $id);
            // $this->db->delete('tb_kategori');

			$gambardiproduk =  $this->db->get_where('tb_produk', ['id_kategori' => $id])->result_array();
			// hapus pada tb dagang
			foreach ($gambardiproduk as $g) {
				# code...
				$gambar = $g['gambar_produk'];
				if ($gambar){
					unlink(FCPATH . 'assets/griyarempah/img/gambarweb/' . $gambar);
					// hapus gambar lama di tb_produk
				}
				$this->db->where('id_kategori', $id);
				$this->db->delete('tb_produk');

			}
		
			$gambar = $data['kategori']['gambar_kategori'];
            if ($gambar){
                unlink(FCPATH . 'assets/griyarempah/img/gambarweb/' . $gambar);
                // hapus gambar lama di tb_kategori
            }
			// hapus pada tb kategori dan dagangan
			$this->db->where('id_kategori', $id);
			$this->db->delete('tb_kategori');
        }

        public function UbahKategori($data)
        {

            $namakategori = htmlspecialchars($this->input->post('namakategori', true));
            $kodekategori = htmlspecialchars($this->input->post('kodekategori', true));
            $upload_image = $_FILES['gambarkategori'];
            // cek jika ada gambar yang diupload
            $upload_image = $_FILES['gambarkategori']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'png|jpg|jpeg'; // format gambar yang dibolehkan
                $config['upload_path']   = './assets/griyarempah/img/gambarweb/'; // tempat file untuk upload gambar
                $config['encrypt_name']	=	true;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambarkategori')) {
                    $old_image = $data['kategori']['gambar_kategori']; // ambil data gambar lama dari session.
                    if ($old_image) {
                        unlink(FCPATH . './assets/griyarempah/img/gambarweb/' . $old_image);
                        // hapus gambar lama 
                    }

                    $new_image = $this->upload->data('file_name');
                    // $this->db->set('gambar_hewan', $new_image); // update gambar lama dengan yang baru.
                } else {
                    echo $this->upload->display_errors();
                }
            }else{
                $new_image = $data['kategori']['gambar_kategori'];
            }

            $data = array(
                'nama_kategori'		=> $namakategori,
                'kode_kategori'		=> $kodekategori,
                'gambar_kategori'	=> $new_image,
            );

            // print_r($data);die;
            $this->db->where('id_kategori', $this->input->post('id'));
            $this->db->update('tb_kategori', $data);
        }


        // Setting Lokasi Toko
        private $idToko = 1;

        public function AmbilDataToko()
        {
            return $this->db->get('tb_setting_lokasi')->result_array();
        }

        public function LokasiId()
        {
            $this->db->select('*');
            $this->db->from('tb_setting_lokasi');
            $this->db->where('id_lokasi', 1);
            return $this->db->get()->row();
        }

        public function UbahDataToko()
        {

            $kotakabupaten = htmlspecialchars($this->input->post('kotakabupaten', true));
            
            $data = array(
                'kota_kabupaten'	=> $kotakabupaten,
            );

            // print_r($data);die;
            $this->db->where('id_lokasi', $this->idToko);
            $this->db->update('tb_setting_lokasi', $data);
        }

        // Produk
        // public function AmbilDataProduk()
	    // {
		//     return $this->db->get('tb_produk')->result_array();
	    // }

    public function AmbilDataProduk()
	{
		// return $this->db->get('tb_dagangan')->result_array();
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
		return $this->db->get()->result_array();
	}

	public function CariDataProduk()
	{
		$keyword = htmlspecialchars($this->input->post('keyword', true));
		$this->db->like('nama_produk_ind', $keyword);
		$this->db->or_like('nama_produk_en', $keyword);
		// return $this->db->get('tb_dagangan')->result_array();
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
		return $this->db->get()->result_array();
	}

        public function TambahDataProduk()
	{
		$namaprodukind			= htmlspecialchars($this->input->post('npind', true));
		$namaproduken			= htmlspecialchars($this->input->post('npen', true));
		$hargaprodukrp		= htmlspecialchars($this->input->post('hprp', true));
	    $hargaprodukusd		= htmlspecialchars($this->input->post('hpusd', true));
	    $kategori		= htmlspecialchars($this->input->post('kategori', true));
	    $beratproduk		= htmlspecialchars($this->input->post('beratproduk', true));
	    $stokproduk		= htmlspecialchars($this->input->post('stokproduk', true));
	    $diskon		= htmlspecialchars($this->input->post('diskon', true));
	    $jumlahdiskon		= htmlspecialchars($this->input->post('jumdis', true));
		$gambar			= $_FILES['gambarproduk'];
		if ($gambar=''){}else{
			$config['upload_path']	=	'./assets/griyarempah/img/gambarweb';
			$config['allowed_types']	=	'jpg|png';
			$config['encrypt_name']	=	true;
			
			$this->load->library('upload');
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('gambarproduk')){
				echo "Upload Gagal"; die();
			}else{
				$gambar=$this->upload->data('file_name');
			}
		}
		
		$data = array(
			'nama_produk_ind'	=> $namaprodukind,
			'nama_produk_en'	=> $namaproduken,
			'harga_produk_ind'	=> $hargaprodukrp,
			'harga_produk_en'	=> $hargaprodukusd,
			'diskon'			=> $diskon,
			'jumlah_diskon'		=> $jumlahdiskon,
			'stok_produk'		=> $stokproduk,
			'id_kategori'		=> $kategori,
			'gambar_produk'		=> $gambar,
			'berat_produk'		=> $beratproduk,
			'tanggal_upload'	=> date('Y/m/d'),
		);
		// print_r($data);die;
	    $this->db->insert('tb_produk', $data);
	}

    public function AmbilDataProdukId($id)
	{
		return $this->db->get_where('tb_produk', ['id_produk' => $id])->row_array();
	}

    public function HapusDataProduk($id, $data)
	{
		$gambar = $data['produk']['gambar_produk'];
		if ($gambar){
			unlink(FCPATH . 'assets/griyarempah/img/gambarweb/' . $gambar);
				// hapus gambar lama 
		}
		$this->db->where('id_produk', $id);
		$this->db->delete('tb_produk');
	}

    public function UbahDataProduk($data)
	{

		$namaprodukind	= htmlspecialchars($this->input->post('npind', true));
		$namaproduken	= htmlspecialchars($this->input->post('npen', true));
		$hargaprodukrp	= htmlspecialchars($this->input->post('hprp', true));
	    $hargaprodukusd	= htmlspecialchars($this->input->post('hpusd', true));
		$diskon			= htmlspecialchars($this->input->post('diskon', true));
	    $jumlahdiskon	= htmlspecialchars($this->input->post('jumdis', true));
	    $kategori		= htmlspecialchars($this->input->post('kategori', true));
	    $beratproduk	= htmlspecialchars($this->input->post('beratproduk', true));
	    $stokproduk		= htmlspecialchars($this->input->post('stokproduk', true));
		$upload_image	= $_FILES['gambarproduk'];
		// cek jika ada gambar yang diupload
		$upload_image = $_FILES['gambarproduk']['name'];

		if ($upload_image) {
			$config['allowed_types'] = 'png|jpg'; // format gambar yang dibolehkan
			$config['upload_path']   = './assets/griyarempah/img/gambarweb/'; // tempat file untuk upload gambar
			$config['encrypt_name']	=	true;

			$this->load->library('upload');
			$this->upload->initialize($config);

			if ($this->upload->do_upload('gambarproduk')) {
				$old_image = $data['produk']['gambar_produk']; // ambil data gambar lama dari session.
				if ($old_image) {
					unlink(FCPATH . 'assets/griyarempah/img/gambarweb/' . $old_image);
					// hapus gambar lama 
				}

				$new_image = $this->upload->data('file_name');
				// $this->db->set('gambar_hewan', $new_image); // update gambar lama dengan yang baru.
			} else {
				echo $this->upload->display_errors();
			}
		}else{
			$new_image = $data['produk']['gambar_produk'];
		}

		$data = array(
			'nama_produk_ind'	=> $namaprodukind,
			'nama_produk_en'	=> $namaproduken,
			'harga_produk_ind'	=> $hargaprodukrp,
			'harga_produk_en'	=> $hargaprodukusd,
			'diskon'			=> $diskon,
			'jumlah_diskon'		=> $jumlahdiskon,
			'stok_produk'		=> $stokproduk,
			'id_kategori'		=> $kategori,
			'gambar_produk'		=> $new_image,
			'berat_produk'		=> $beratproduk,
			'tanggal_upload'	=> date('Y/m/d'),
		);

		// print_r($data);die;
		$this->db->where('id_produk', $this->input->post('id'));
		$this->db->update('tb_produk', $data);
	}

	public function AmbilDataAdmin()
	{
        return $this->db->get_where('tb_user', ['level_user' => 1])->result_array();
    }

	public function AmbilDataAdminId($id)
	{
		return $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
	}

	public function CariDataUser()
	{
		$keyword = $this->input->post('keyword');
		$this->db->like('nama_user', $keyword);
		$this->db->or_like('no_telp_user', $keyword);
		$this->db->or_like('email_user', $keyword);
		return $this->db->get('tb_user')->result_array();
	}

	public function HapusDataAdmin($id)
	{
		if($id != 12){
			$this->db->where('id_user', $id);
			$this->db->delete('tb_user');
		}elseif($id == 12){
			$this->session->set_flashdata('msg-no', 'Anda tidak bisa <strong>menghapus</strong> akun utama.');
			redirect('Slogin/HalamanAdmin');
		}
	}

	public function UbahAdmin($data)
	{

		$idadmin = $this->input->post('id');
		$passwordlama = htmlspecialchars($this->input->post('passwordlama', true));
		$adminse = $this->db->get_where('tb_user', ['id_user' => $idadmin])->row_array();
		// cek password lama apakah benar
		if ($adminse){
			// cek passwordnya
			if(password_verify($passwordlama, $adminse['password_user'])){
				$username = htmlspecialchars($this->input->post('namaadmin', true));
				$email = htmlspecialchars($this->input->post('emailadmin', true));
				$notelp = htmlspecialchars($this->input->post('notelpadmin', true));
				$password = password_hash($this->input->post('passwordadmin1', true), PASSWORD_DEFAULT);

				$data = array(
					'nama_user'			=> $username,
					'no_telp_user'		=> $notelp,
					'email_user'		=> $email,
					'password_user'		=> $password,
					'level_user'		=> 1,
				);

				// print_r($data);die;
				$this->db->where('id_user', $this->input->post('id'));
				$this->db->update('tb_user', $data);

				$this->session->set_flashdata('msg-success', 'Diubah');
				redirect('Slogin/HalamanAdmin');
			}else{
				$this->session->set_flashdata('msg-gagalubah', 'gagal mengubah (Password lama salah.)');
				redirect('Slogin/HalamanAdmin');
			}
		}
		
	}

	public function AmbilDataUser()
	{
        return $this->db->get_where('tb_user', ['level_user' => 2])->result_array();
    }

	public function UbahUser($data)
	{

		$idadmin = $this->input->post('id');
		$passwordlama = htmlspecialchars($this->input->post('passwordlama'));
		$adminse = $this->db->get_where('tb_user', ['id_user' => $idadmin])->row_array();
		// cek password lama apakah benar
		if ($adminse){
			// cek passwordnya
			if(password_verify($passwordlama, $adminse['password_user'])){
				$username = htmlspecialchars($this->input->post('username', true));
				$email = htmlspecialchars($this->input->post('email', true));
				$notelp = htmlspecialchars($this->input->post('notelpwa', true));
				$password = password_hash($this->input->post('password1', true), PASSWORD_DEFAULT);

				$data = array(
					'nama_user'			=> $username,
					'no_telp_user'		=> $notelp,
					'email_user'		=> $email,
					'password_user'		=> $password,
					'level_user'		=> 2,
				);

				// print_r($data);die;
				$this->db->where('id_user', $this->input->post('id'));
				$this->db->update('tb_user', $data);

				$this->session->set_flashdata('msg-success', 'Diubah');
				redirect('Slogin/HalamanUser');
			}else{
				// $this->session->set_flashdata('msg-gagalubah', 'Diubah (Password lama salah.)');
				redirect('Slogin/HalamanUser');
			}
		}
		
	}

	public function AmbilDataAntrianPesanan()
    {
		$this->db->order_by("tanggal_order", "desc");
        return $this->db->get_where('tb_transaksi', ['status_order' => 0])->result_array();
    }

	public function CariDataAntrianPesanan()
	{
		$keyword = $this->input->post('keyword');
		$this->db->like('no_order', $keyword);
		$this->db->or_like('nama_penerima', $keyword);
		return $this->db->get('tb_transaksi')->result_array();
	}

	public function AmbilPesananByNoOrder($no_order)
	{
		return $this->db->get_where('tb_transaksi', ['no_order' => $no_order])->row_array();
	}

	public function HapusPesanan($no_order)
	{
		// kembaliin jumlah produknya

		// TB_PRODUKNYA
		$bidproduknya = $this->db->get_where('tb_rincian_transaksi', ['no_order' => $no_order])->result_array();
		// ulang untuk setiap data produknya agar stoknya kembali semua
		foreach ($bidproduknya as $bip){
			$idproduknya = $bip['id_produk'];
			// echo $idproduknya;

			$bjumlahprodukasli = $this->db->get_where('tb_produk', ['id_produk' => $idproduknya])->row_array();
			$jumlahprodukasli = $bjumlahprodukasli['stok_produk'];
			// echo $jumlahprodukasli;
	
			// TB_RINCIAN_PRODUKNYA
			$jumlahrinci = $this->db->get_where('tb_rincian_transaksi', ['no_order' => $no_order])->row_array();
			$jumlahrinciannya = $jumlahrinci['qty'];
			// echo $jumlahrinciannya;
	
			// Penambahannya
			$totaljumlahprodukkembali = $jumlahprodukasli + $jumlahrinciannya;
			// echo $totaljumlahprodukkembali;
			$data = array(
				'stok_produk'		=> $totaljumlahprodukkembali,
			);

			// Masukkan TB_PRODUK
			$this->db->where('id_produk', $idproduknya);
			$this->db->update('tb_produk', $data);

		}

		// hapus di tb_rincian_transaksi
		$this->db->where('no_order', $no_order);
		$this->db->delete('tb_rincian_transaksi');

		// hapus di tb_transaksi
		$this->db->where('no_order', $no_order);
		$this->db->delete('tb_transaksi');
	}

	public function AmbilDetailPesananByNoOrder($no_order)
	{
		$this->db->select('*');
		$this->db->from('tb_rincian_transaksi');
		$this->db->join('tb_produk', 'tb_produk.id_produk = tb_rincian_transaksi.id_produk', 'left');
		return $this->db->get()->result_array();

		// return $this->db->get_where('tb_rincian_transaksi', ['no_order' => $no_order])->result_array();
	}

	public function ValidasiPembayaran($data)
	{

		// $noorder	= htmlspecialchars($this->input->post('noorder', true));
		$atasnama	= htmlspecialchars($this->input->post('atasnama', true));
		$namabank	= htmlspecialchars($this->input->post('namabank', true));
	    $norek	= htmlspecialchars($this->input->post('norek', true));
		$noresi			= htmlspecialchars($this->input->post('noresi', true));
		$statusorder			= htmlspecialchars($this->input->post('statusorder', true));
		$upload_image	= $_FILES['buktibayar'];

		// print($noresi);die;
		// cek jika ada gambar yang diupload
		$upload_image = $_FILES['buktibayar']['name'];

		if ($upload_image) {
			$config['allowed_types'] = 'png|jpg'; // format gambar yang dibolehkan
			$config['upload_path']   = './assets/griyarempah/img/transaksi/'; // tempat file untuk upload gambar
			$config['encrypt_name']	=	true;

			$this->load->library('upload');
			$this->upload->initialize($config);

			if ($this->upload->do_upload('buktibayar')) {
				$old_image = $data['pesanan']['bukti_bayar']; // ambil data gambar lama dari session.
				if ($old_image) {
					unlink(FCPATH . 'assets/griyarempah/img/transaksi/' . $old_image);
					// hapus gambar lama 
				}

				$new_image = $this->upload->data('file_name');
				// $this->db->set('gambar_hewan', $new_image); // update gambar lama dengan yang baru.
			} else {
				echo $this->upload->display_errors();
			}
		}else{
			$new_image = $data['pesanan']['bukti_bayar'];
		}

		$data = array(
			'atas_nama'		=> $atasnama,
			'nama_bank'		=> $namabank,
			'no_rek'		=> $norek,
			'bukti_bayar'	=> $new_image,
			'no_resi'		=> $noresi,
			'tanggal_bayar'	=> date('Y/m/d'),
			'status_bayar'	=> '1',
			'status_order'	=> $statusorder,
		);

		// print_r($data);die;
		$this->db->where('no_order', $this->input->post('noorder'));
		$this->db->update('tb_transaksi', $data);
		
	}

	public function AmbilDataPesananSelesai()
    {
		$this->db->order_by("tanggal_bayar", "desc");
        return $this->db->get_where('tb_transaksi', ['status_order' => 1])->result_array();
    }

	public function CariDataPesananSelesai()
	{
		$keyword = $this->input->post('keyword');
		$this->db->like('tanggal_bayar', $keyword);
		return $this->db->get('tb_transaksi')->result_array();
	}

	public function AmbilDataTestimoni()
	{
		return $this->db->get('tb_testimoni')->result_array();
	}

	public function CariDataTestimoni()
	{
		$keyword = htmlspecialchars($this->input->post('keyword', true));
		$this->db->like('nama_testimoni', $keyword);
		$this->db->or_like('kalimat_testimoni', $keyword);
		return $this->db->get('tb_testimoni')->result_array();
	}

	public function AmbilTestimoniById($id)
	{
		return $this->db->get_where('tb_testimoni', ['id_testimoni' => $id])->row_array();
	}

	public function TambahDataTestimoni()
        {
            $nama		= htmlspecialchars($this->input->post('namat', true));
            $kalimat	= htmlspecialchars($this->input->post('kalimatt', true));
            $gambar		= $_FILES['gambartestimoni'];
            if ($gambar=''){}else{
                $config['upload_path']	=	'./assets/griyarempah/img/gambarweb';
                $config['allowed_types']	=	'jpg|png';
                $config['encrypt_name']	=	true;
                
                $this->load->library('upload');
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambartestimoni')){
                    echo "Upload Gagal"; die();
                }else{
                    $gambar=$this->upload->data('file_name');
                }
            }
            
            $data = array(
                'nama_testimoni'			=> $nama,
                'kalimat_testimoni'         => $kalimat,
                'gambar_testimoni'			=> $gambar,
            );
            // print_r($data);die;
            $this->db->insert('tb_testimoni', $data);
        }

		public function UbahTestimoni($data)
        {

            $nama = htmlspecialchars($this->input->post('namat', true));
            $kalimat = htmlspecialchars($this->input->post('kalimatt', true));
            $upload_image = $_FILES['gambartestimoni'];
            // cek jika ada gambar yang diupload
            $upload_image = $_FILES['gambartestimoni']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'png|jpg|jpeg'; // format gambar yang dibolehkan
                $config['upload_path']   = './assets/griyarempah/img/gambarweb/'; // tempat file untuk upload gambar
                $config['encrypt_name']	=	true;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambartestimoni')) {
                    $old_image = $data['testimoni']['gambar_testimoni']; // ambil data gambar lama dari session.
                    if ($old_image) {
                        unlink(FCPATH . './assets/griyarempah/img/gambarweb/' . $old_image);
                        // hapus gambar lama 
                    }

                    $new_image = $this->upload->data('file_name');
                    // $this->db->set('gambar_hewan', $new_image); // update gambar lama dengan yang baru.
                } else {
                    echo $this->upload->display_errors();
                }
            }else{
                $new_image = $data['testimoni']['gambar_testimoni'];
            }

            $data = array(
                'nama_testimoni'		=> $nama,
                'kalimat_testimoni'		=> $kalimat,
                'gambar_testimoni'		=> $new_image,
            );

            // print_r($data);die;
            $this->db->where('id_testimoni', $this->input->post('id'));
            $this->db->update('tb_testimoni', $data);
        }

	
		public function HapusTestimoni($id, $data)
		{
			
			$gambar = $data['testimoni']['gambar_testimoni'];
			if ($gambar){
				unlink(FCPATH . 'assets/griyarempah/img/gambarweb/' . $gambar);
					// hapus gambar lama 
			}
			$this->db->where('id_testimoni', $id);
			$this->db->delete('tb_testimoni');
		
        }

}