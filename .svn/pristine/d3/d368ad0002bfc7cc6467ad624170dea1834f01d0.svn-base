<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fotoc extends CI_Controller {
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
            'headerTitle'=>'Data Foto',
            'formTitle'=>'Tabel Data Foto',

            'active_foto'=>'active',
            'data_foto'=>$this->Adminm->get_all_media(),
        );      
        $this->load->view('elements/header', $data);
        $this->load->view('pages/foto/data_foto');
        $this->load->view('elements/footer');
    }

    public function manage_data_foto()
    {
        $id= $this->uri->segment(3);
        if ($id == '') {

            $data=array(
                'headerTitle'=>'Data Foto',
                'formTitle'=>'Form Tambah Foto',

                'active_foto'=>'active',            
                'id'=>$this->Adminm->id_media(),
                'data_kategori'=>$this->Adminm->getAllData('tbl_kategori'),

            );      
            $this->load->view('elements/header', $data);
            $this->load->view('pages/foto/manage_data_foto');
            $this->load->view('elements/footer');

        } else {
            $id_media['id_media'] = $id;
            $data=array(
                'headerTitle'=>'Data Foto',
                'formTitle'=>'Form Ubah Foto',

                'active_foto'=>'active',            
                'data_foto'=>$this->Adminm->getSelectedData('tbl_media', $id_media),
                'data_kategori'=>$this->Adminm->getAllData('tbl_kategori'),
            );      
            $this->load->view('elements/header', $data);
            $this->load->view('pages/foto/manage_data_foto');
            $this->load->view('elements/footer');

        }
    }

    function proses_data_foto() {
        $key     = $this->input->post('id_media');
        if ($key != '') {

            $config['upload_path'] = './uploads/img';
            $config['allowed_types'] = 'jpg|png|gif|pdf|docs|docx|doc';
            $config['max_size'] = '100000';

            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('file_media')) {
                $this->session->set_flashdata('notif','File gagal di upload !');
                redirect('fotoc/manage_data_foto');
            } else {
                $file_media = $this->upload->data();
                $data=array(
                    'id_media'=>$this->input->post('id_media'),
                    'id_kategori'=>$this->input->post('id_kategori'),
                    'file_media' => $file_media['file_name'],
                    'status_media'=>$this->input->post('status_media'),
                    'keterangan_media'=>$this->input->post('keterangan_media'),
                );
                $this->Adminm->insertData('tbl_media',$data);
            }

        } elseif ($key == '') {

            $config['upload_path'] = './uploads/img';
            $config['allowed_types'] = 'jpg|png|gif|pdf|docs|docx|doc';
            $config['max_size'] = '100000';

            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('file_foto')) {
                $id['id_foto'] = $this->input->post('id');
                $data=array(
                    'id_kategori'=>$this->input->post('id_kategori'),
                    'status_media'=>$this->input->post('status_media'),
                    'keterangan_media'=>$this->input->post('keterangan_media'),
                );
                $this->Adminm->updateData('tbl_media',$data,$id);
            } else {
                $file_foto = $this->upload->data();
                $id['id_foto'] = $this->input->post('id');
                $data=array(
                    'id_kategori'=>$this->input->post('id_kategori'),
                    'file_media' => $file_foto['file_name'],
                    'status_media'=>$this->input->post('status_media'),
                    'keterangan_media'=>$this->input->post('keterangan_media'),
                );
                $this->Adminm->updateData('tbl_media',$data,$id);
            }

        }
        redirect("fotoc");
    }

    function proses_hapus_foto(){
        $id['id_media'] = $this->uri->segment(3);
        $this->Adminm->deleteData('tbl_media',$id);

        redirect("fotoc");
    }
}
