<?php 

function Is_logged_in_admin()
{
	$ci = get_instance(); // untuk ngambil fitur $this CodeIgniter
	if (!($ci->session->userdata('email_user')) ) { // cek data session
		redirect('Auth'); // kembalikan ke halaman default.
    }elseif($ci->session->userdata('level_user') == 2) { // cek apakah yang login admin
        redirect('SloginUser'); // kembalikan ke halaman default.
    }
}

function Is_logged_in_user()
{
	$ci = get_instance(); // untuk ngambil fitur $this CodeIgniter
	if (!($ci->session->userdata('email_user')) ) { // cek data session
		redirect('Auth'); // kembalikan ke halaman default.
    }elseif($ci->session->userdata('level_user') == 1) { // cek apakah yang login user
        redirect('Slogin/HalamanDashboard'); // kembalikan ke halaman default.
    }
}