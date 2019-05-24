# QRM

bagian yang diganti
cd application/controllers/dokumenc.php
funtion : proses_data_dokumen ,
sebelumnya :
'tgl_sah_dokumen'=>date(d-M-Y),
menjadi :
'tgl_sah_dokumen'=>$this->input->post('tgl_sah_dokumen'),

cd application/views/frontend/dokumen.php
pada looping data dokumen
sebelumnya:
<td><?php echo $row->id_dokumen; ?></td>
menjadi :
<td><?php echo $row->no_dokumen; ?></td>
		                       
Lampiran dokumenc.php dan dokumen.php adalah source code yang sudah dibenarkan
