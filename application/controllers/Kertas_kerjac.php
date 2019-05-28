<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kertas_kerjac extends CI_Controller {

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
            'headerTitle'=>'Data Kertas Kerja',
            'formTitle'=>'Tabel Data Kertas Kerja',

            'active_kertas_kerja'=>'active',
            'data_kertas_kerja'=>$this->Adminm->getAllData('tbl_kertas_kerja'),
        );		
		$this->load->view('elements/header', $data);
		$this->load->view('pages/kertas_kerja/data_kertas_kerja');
		$this->load->view('elements/footer');
	}

	public function manage_data_kertas_kerja()
	{
        $id= $this->uri->segment(3);
		if ($id == '') {

	        $data=array(
	            'headerTitle'=>'Data Kertas Kerja',
	            'formTitle'=>'Form Tambah Form',

	            'active_kertas_kerja'=>'active',            
	            'id'=>$this->Adminm->id_kertas_kerja(),
	        );		
			$this->load->view('elements/header', $data);
			$this->load->view('pages/kertas_kerja/manage_data_kertas_kerja');
			$this->load->view('elements/footer');

		} else {
	        $id_kertas_kerja['id_kertas_kerja'] = $this->uri->segment(3);
	        $data=array(
	            'headerTitle'=>'Data Kertas Kerja',
	            'formTitle'=>'Form Ubah Form',

	            'active_kertas_kerja'=>'active',            
	            'data_kertas_kerja'=>$this->Adminm->getSelectedData('tbl_kertas_kerja', $id_kertas_kerja),
	        );		
			$this->load->view('elements/header', $data);
			$this->load->view('pages/kertas_kerja/manage_data_kertas_kerja');
			$this->load->view('elements/footer');

		}
	}

    function proses_data_kertas_kerja() {
        $key     = $this->input->post('id_kertas_kerja');
    	if ($key != '') {

	        $config['upload_path'] = './uploads/berkas';
	        $config['allowed_types'] = 'jpg|png|gif|pdf|docs|docx|doc|xls|xlsx';
	        $config['max_size'] = '100000';

	        $this->load->library('upload', $config);
	        
	        if ( ! $this->upload->do_upload('file_kertas_kerja')) {
	            $this->session->set_flashdata('notif','File gagal di upload !');
	            redirect('kertas_kerjac/manage_data_kertas_kerja');
	        } else {
	            $file_kertas_kerja = $this->upload->data();
	            $data=array(
			        'id_kertas_kerja'=>$this->input->post('id_kertas_kerja'),
	                'file_kertas_kerja' => $file_kertas_kerja['file_name'],
		            'nm_kertas_kerja'=>$this->input->post('nm_kertas_kerja'),
		            'status_kertas_kerja'=>$this->input->post('status_kertas_kerja'),
	            );
		        $this->Adminm->insertData('tbl_kertas_kerja',$data);
	        }

    	} elseif ($key == '') {

	        $config['upload_path'] = './uploads/img';
	        $config['allowed_types'] = 'jpg|png|gif|pdf|docs|docx|doc';
	        $config['max_size'] = '100000';

	        $this->load->library('upload', $config);
	        
	        if ( ! $this->upload->do_upload('file_kertas_kerja')) {
		        $id['id_kertas_kerja'] = $this->input->post('id');
		        $data=array(
		            'nm_kertas_kerja'=>$this->input->post('nm_kertas_kerja'),
		            'status_kertas_kerja'=>$this->input->post('status_kertas_kerja'),
		        );
		        $this->Adminm->updateData('tbl_kertas_kerja',$data,$id);
	        } else {
	            $file_kertas_kerja = $this->upload->data();
		        $id['id_kertas_kerja'] = $this->input->post('id');
	            $data=array(
			        'id_kertas_kerja'=>$this->input->post('id_kertas_kerja'),
	                'file_kertas_kerja' => $file_kertas_kerja['file_name'],
		            'nm_kertas_kerja'=>$this->input->post('nm_kertas_kerja'),
		            'status_kertas_kerja'=>$this->input->post('status_kertas_kerja'),
	            );
		        $this->Adminm->updateData('tbl_kertas_kerja',$data,$id);
	        }

    	}
        redirect("kertas_kerjac");
    }

    function proses_hapus_kertas_kerja(){
        $id['id_kertas_kerja'] = $this->uri->segment(3);
        $this->Adminm->deleteData('tbl_kertas_kerja',$id);

        redirect("kertas_kerjac");
    }
}
