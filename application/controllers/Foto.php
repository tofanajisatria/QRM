<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto extends CI_Controller {
/*
    function __construct(){
        parent::__construct();
        if($this->session->userdata('LEVEL') == '' ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
    }
*/
/*===========================================================================================================================================*/
/*===========================================================================================================================================*/

	public function index()
	{
        $data=array(
            'headerTitle'=>'Pengaturan',
            'formTitle'=>'Form Pengaturan',

            'active_pengaturan'=>'active',
            'data_media'=>$this->Adminm->getAllData('tbl_kategori'),
            'data_foto'=>$this->Adminm->get_all_media(),
        );
		$this->load->view('elements/header_frontend', $data);
		$this->load->view('pages/frontend/foto');
		$this->load->view('elements/footer_frontend');
	}

}
