<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
		$this->load->library('form_validation');
	}

    public function index()
	{
		// if ($this->session->userdata('email') ){
		// 	redirect('user');
		// } // cek apakah data session masih ada.
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ( $this->form_validation->run() == FALSE ){
			$data['desc'] = 'Log In | Pusat beli Rempah, Kurma, Madu dan Warisan Alami Kekayaan Nusantara Termurah.';
		    $this->load->view('blogin/login', $data);
		    $this->load->view('template/template_footer_user');
		} else {
			// validasinya sukses
			$this->_login();
		}
    }

	private function _login()
	{
		$username = htmlspecialchars($this->input->post('username', true));
		$password = htmlspecialchars($this->input->post('password', true));

		$un = $this->db->get_where('tb_user', ['nama_user' => $username])->row_array();
		$ue = $this->db->get_where('tb_user', ['email_user' => $username])->row_array();
		
		// jika usernya ada

		if($un or $ue){
			// cek password
			if (password_verify($password, $un['password_user'] )){
				// buat session user yang login
				$data = [
					'email_user' => $un['email_user'],
					'nama_user' => $un['nama_user'],
					'level_user' => $un['level_user'],
					'id_user' => $un['id_user']
				];
				// cek apakah yang login admin atau  user
				if($data['level_user'] == 2 )
				{
					$this->session->set_userdata($data);
					redirect('SloginUser');
				}elseif($data['level_user'] == 1 ){
					$this->session->set_userdata($data);
					redirect('Slogin/HalamanDashboard');
				}
			} else {
				$this->session->set_flashdata('message', 'Password Salah.');
				redirect('Auth');
            }
        }else{
			$this->session->set_flashdata('message', 'Username Salah.');
			redirect('Auth');
		}
    }

	public function logout()
	{
		$this->session->unset_userdata('email_user');
		$this->session->unset_userdata('nama_user');
		$this->session->unset_userdata('level_user');
		$this->session->unset_userdata('id_user');
		
		$this->session->set_flashdata('logout-msg', 'Kamu telah logout.');
		redirect('Auth');
	}

}