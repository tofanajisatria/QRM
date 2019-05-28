<?php

class Adminm extends CI_Model{

// ===========================================          Script         ======================================= //
// ===========================================                         ======================================= //


    public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }

    public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data)->result();
    }

    function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }

    function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }

    public function insertData($table,$data)
    {
        $this->db->insert($table,$data);
    }

    public function find($id){
        //Query mencari record berdasarkan ID-nya
        $hasil = $this->db->where('id_berkas', $id)
                          ->limit(1)
                          ->get('tbl_berkas');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        } else {
            return array();
        }
    }

// ===========================================          Script         ======================================= //
// ===========================================                         ======================================= //

    public function id_user()
    {
        $q = $this->db->query("select MAX(RIGHT(id_user,4)) as id_max from tbl_user");
        $id = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $id = "0001";
        }
        return "US-".$id;
    }

// ===========================================          Script         ======================================= //
// ===========================================                         ======================================= //

    public function id_berita()
    {
        $q = $this->db->query("select MAX(RIGHT(id_berita,4)) as id_max from tbl_berita");
        $id = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $id = "0001";
        }
        return "BR-".$id;
    }

    function get_all_berita(){
        return $this->db->query("
            SELECT *
            FROM tbl_berita a
            JOIN tbl_kategori_berita b ON a.id_kategori_berita = b.id_kategori_berita
        ")->result();
    }

    function get_berita($id_berita){
        return $this->db->query("
            SELECT *
            FROM tbl_berita a
            JOIN tbl_kategori_berita b ON a.id_kategori_berita = b.id_kategori_berita
            WHERE a.id_berita = '$id_berita'
        ")->result();
    }

    function get_kategori_berita($id_kategori_berita){
        return $this->db->query("
            SELECT *
            FROM tbl_berita a
            JOIN tbl_kategori_berita b ON a.id_kategori_berita = b.id_kategori_berita
            WHERE a.id_kategori_berita = '$id_kategori_berita'
        ")->result();
    }

// ===========================================          Script         ======================================= //
// ===========================================                         ======================================= //

    public function id_kategori_berita()
    {
        $q = $this->db->query("select MAX(RIGHT(id_kategori_berita,4)) as id_max from tbl_kategori_berita");
        $id = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $id = "0001";
        }
        return "KB-".$id;
    }

// ===========================================          Script         ======================================= //
// ===========================================                         ======================================= //

    public function id_dokumen()
    {
        $q = $this->db->query("select MAX(RIGHT(id_dokumen,4)) as id_max from tbl_dokumen");
        $id = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $id = "0001";
        }
        return "DK-".$id;
    }

    function get_all_dokumen(){
        return $this->db->query("
            SELECT *
            FROM tbl_dokumen a
            JOIN tbl_kategori_dokumen b ON a.id_kategori_dokumen = b.id_kategori_dokumen
        ")->result();
    }

    function get_dokumen($id_dokumen){
        return $this->db->query("
            SELECT *
            FROM tbl_dokumen a
            JOIN tbl_kategori_dokumen b ON a.id_kategori_dokumen = b.id_kategori_dokumen
            WHERE a.id_dokumen = '$id_dokumen'
        ")->result();
    }

    function get_kategori($id_kategori_dokumen){
        return $this->db->query("SELECT * FROM tbl_kategori_dokumen WHERE id_kategori_dokumen = '$id_kategori_dokumen'")->row()->nm_kategori_dokumen;        
    }
    function get_dokumen_kategori($id_kategori_dokumen){
        return $this->db->query("
            SELECT *
            FROM tbl_dokumen a
            JOIN tbl_kategori_dokumen b ON a.id_kategori_dokumen = b.id_kategori_dokumen
            WHERE a.id_kategori_dokumen = '$id_kategori_dokumen'
        ")->result();
    }

// ===========================================          Script         ======================================= //
// ===========================================                         ======================================= //

    public function id_kategori_dokumen()
    {
        $q = $this->db->query("select MAX(RIGHT(id_kategori_dokumen,4)) as id_max from tbl_kategori_dokumen");
        $id = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $id = "0001";
        }
        return "KD-".$id;
    }

// ===========================================          Script         ======================================= //
// ===========================================                         ======================================= //

    public function id_komentar_berita()
    {
        $q = $this->db->query("select MAX(RIGHT(id_komentar_berita,4)) as id_max from tbl_komentar_berita");
        $id = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $id = "0001";
        }
        return "KM-".$id;
    }

// ===========================================          Script         ======================================= //
// ===========================================                         ======================================= //

    public function id_media()
    {
        $q = $this->db->query("select MAX(RIGHT(id_media,4)) as id_max from tbl_media");
        $id = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $id = "0001";
        }
        return "MD-".$id;
    }

    function get_all_media(){
        return $this->db->query("
            SELECT *
            FROM tbl_media a
            JOIN tbl_kategori b ON a.id_kategori = b.id_kategori
        ")->result();
    }

// ===========================================          Script         ======================================= //
// ===========================================                         ======================================= //

    public function id_testimoni()
    {
        $q = $this->db->query("select MAX(RIGHT(id_testimoni,4)) as id_max from tbl_testimoni");
        $id = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $id = "0001";
        }
        return "TST-".$id;
    }

// ===========================================          Script         ======================================= //
// ===========================================                         ======================================= //
// ===========================================          Script         ======================================= //
// ===========================================                         ======================================= //

    public function id_form()
    {
        $q = $this->db->query("select MAX(RIGHT(id_form,4)) as id_max from tbl_form");
        $id = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $id = "0001";
        }
        return "FR-".$id;
    }

// ===========================================          Script         ======================================= //
// ===========================================                         ======================================= //

    public function id_kertas_kerja()
    {
        $q = $this->db->query("select MAX(RIGHT(id_kertas_kerja,4)) as id_max from tbl_kertas_kerja");
        $id = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $id = "0001";
        }
        return "KK-".$id;
    }

// ===========================================          Script         ======================================= //
// ===========================================                         ======================================= //

    public function id_kategori()
    {
        $q = $this->db->query("select MAX(RIGHT(id_kategori,4)) as id_max from tbl_kategori");
        $id = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $id = "0001";
        }
        return "KG-".$id;
    }

// ===========================================          Script         ======================================= //
// ===========================================                         ======================================= //

    public function id_video()
    {
        $q = $this->db->query("select MAX(RIGHT(id_video,4)) as id_max from tbl_video");
        $id = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $id = "0001";
        }
        return "VD-".$id;
    }
 
// ===========================================          Script         ======================================= //

// ===========================================          Script         ======================================= //
// ===========================================                         ======================================= //

    function cek($id) {
        //create query to connect user login database
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('id_user', $id);
        $this->db->limit(1);

        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return 'Ada'; //if data is true
        } else {
            return 'Tidak'; //if data is wrong
        }
    }

    function cek_user($username) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('username', $username);
        $this->db->limit(1);

        //get query and processing
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function cek_pegawai($nip_pegawai, $username, $email_pegawai) {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->where('nip_pegawai', $nip_pegawai);
        $this->db->or_where('username', $username);
        $this->db->or_where('email_pegawai', $email_pegawai);
        $this->db->limit(1);

        //get query and processing
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

// ===========================================          Script         ======================================= //
// ===========================================                         ======================================= //

    function login($username, $password) {
        //create query to connect user login database
        $this->db->select('*');
        $this->db->from('tbl_user');
        // $this->db->join('tbl_pegawai', 'tbl_user.id_pegawai = tbl_pegawai.id_pegawai');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $this->db->limit(1);

        //get query and processing
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
        }
    }


    function login_pegawai($username, $password) {

        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $this->db->limit(1);

        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
        }
    }

    function jumlah_aktivitas($id_aktivitas_pegawai, $status_aktivitas) {

        $this->db->select('*');
        $this->db->from('tbl_detail_aktivitas_pegawai');
        $this->db->where('id_aktivitas_pegawai', $id_aktivitas_pegawai);
        $this->db->where('status_detail_aktivitas_pegawai', $status_aktivitas);

        $query = $this->db->get();
        $data = $query->num_rows();
        return $data; //if data is true
    }

    function jumlah_aktivitas_p($id_aktivitas_pegawai) {

        $this->db->select('*');
        $this->db->from('tbl_detail_aktivitas_pegawai');
        $this->db->where('id_aktivitas_pegawai', $id_aktivitas_pegawai);

        $query = $this->db->get();
        $data = $query->num_rows();
        return $data; //if data is true
    }

/*
Source Code by : Aldy Muldani
Email : dieabra@gmail.com
Github : https://github.com/alldie1207
Line : alldie1207
No: 082295673583
2017-2018
*/// ===========================================          Script         ======================================= //
// ===========================================                         ======================================= //

}
