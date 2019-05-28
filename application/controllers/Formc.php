<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formc extends CI_Controller {

    // function __construct(){
    //     parent::__construct();
    //     if($this->session->userdata('LEVEL') == '' ){
    //         $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
    //         redirect('');
    //     };
    // }

/*===========================================================================================================================================*/
/*===========================================================================================================================================*/

	public function index()
	{
        $data=array(
            'headerTitle'=>'Data Form',
            'formTitle'=>'Tabel Data Form',

            'active_form'=>'active',
            'data_form'=>$this->Adminm->getAllData('tbl_form'),
        );		
		$this->load->view('elements/header', $data);
		$this->load->view('pages/form/data_form');
		$this->load->view('elements/footer');
	}

	public function manage_data_form()
	{
        $id= $this->uri->segment(3);
		if ($id == '') {

	        $data=array(
	            'headerTitle'=>'Data Form',
	            'formTitle'=>'Form Tambah Form',

	            'active_form'=>'active',            
	            'id'=>$this->Adminm->id_form(),
	        );		
			$this->load->view('elements/header', $data);
			$this->load->view('pages/form/manage_data_form');
			$this->load->view('elements/footer');

		} else {
	        $id_form['id_form'] = $this->uri->segment(3);
	        $data=array(
	            'headerTitle'=>'Data Form',
	            'formTitle'=>'Form Ubah Form',

	            'active_form'=>'active',            
	            'data_form'=>$this->Adminm->getSelectedData('tbl_form', $id_form),
	        );		
			$this->load->view('elements/header', $data);
			$this->load->view('pages/form/manage_data_form');
			$this->load->view('elements/footer');

		}
	}

    function proses_data_form() {
        $key     = $this->input->post('id_form');
    	if ($key != '') {

	        $config['upload_path'] = './uploads/berkas';
	        $config['allowed_types'] = 'jpg|png|gif|pdf|docs|docx|doc|xls|xlsx';
	        $config['max_size'] = '100000';

	        $this->load->library('upload', $config);
	        
	        if ( ! $this->upload->do_upload('file_form')) {
	            $this->session->set_flashdata('notif','File gagal di upload !');
	            redirect('formc/manage_data_form');
	        } else {
	            $file_form = $this->upload->data();
	            $data=array(
			        'id_form'=>$this->input->post('id_form'),
	                'file_form' => $file_form['file_name'],
		            'nm_form'=>$this->input->post('nm_form'),
		            'status_form'=>$this->input->post('status_form'),
	            );
		        $this->Adminm->insertData('tbl_form',$data);
	        }

    	} elseif ($key == '') {

	        $config['upload_path'] = './uploads/img';
	        $config['allowed_types'] = 'jpg|png|gif|pdf|docs|docx|doc';
	        $config['max_size'] = '100000';

	        $this->load->library('upload', $config);
	        
	        if ( ! $this->upload->do_upload('file_form')) {
		        $id['id_form'] = $this->input->post('id');
		        $data=array(
		            'nm_form'=>$this->input->post('nm_form'),
		            'status_form'=>$this->input->post('status_form'),
		        );
		        $this->Adminm->updateData('tbl_form',$data,$id);
	        } else {
	            $file_form = $this->upload->data();
		        $id['id_form'] = $this->input->post('id');
	            $data=array(
			        'id_form'=>$this->input->post('id_form'),
	                'file_form' => $file_form['file_name'],
		            'nm_form'=>$this->input->post('nm_form'),
		            'status_form'=>$this->input->post('status_form'),
	            );
		        $this->Adminm->updateData('tbl_form',$data,$id);
	        }

    	}
        redirect("formc");
    }

    function proses_hapus_form(){
        $id['id_form'] = $this->uri->segment(3);
        $this->Adminm->deleteData('tbl_form',$id);

        redirect("formc");
    }
}
