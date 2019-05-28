<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kertas_kerja extends CI_Controller {
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
            'headerTitle'=>'Pages Form',
            'formTitle'=>'Form',

            'active_pengaturan'=>'active',            
            'data_kertas_kerja'=>$this->Adminm->getAllData('tbl_kertas_kerja'),
        );
        $this->load->view('elements/header_frontend', $data);
		$this->load->view('pages/frontend/kertas_kerja', $data);
        $this->load->view('elements/footer_frontend');
	}

}
