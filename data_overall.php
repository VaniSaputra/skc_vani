<?php
include_once "lib/config.php";
include "modul/enkripsi/function.php";
//kolom apa saja yang akan ditampilkan

$columns = array(
	'id_peserta',
	'kontingen',
	'nama',
	'tgl_lahir',
	'berat_badan',
	'perguruan',
	'isi',
	);

//lakukan query data dari 3 table dengan inner join
	$query 		= $datatable->get_custom("SELECT peserta.*, kelas_all.* 
											FROM kelas_all INNER JOIN peserta
											ON kelas_all.id_kelas=peserta.id_kelas",$columns);

	//buat inisialisasi array data
	$data = array();

	foreach ($query	as $value) {
		//array sementara data
		$ResultData = array();
		//masukan data ke array sesuai kolom table
		$ResultData[] = $value->id_peserta;
		$ResultData[] = $value->kontingen;
		$ResultData[] = $value->nama;
		$ResultData[] = $value->tgl_lahir;
		$ResultData[] = $value->berat_badan." Kg";
		$ResultData[] = $value->perguruan;							
		$ResultData[] = $value->isi;

		//bisa juga pake logic misal jika value tertentu maka outputnya

		//kita bisa buat tombol untuk keperluan edit, delete, dll,
		$edit = paramEncrypt("uri=peserta/peserta_edit&id_peserta=".$value->id_peserta);
		$del = paramEncrypt("uri=peserta/peserta_delete&id_peserta=".$value->id_peserta);
		$crud_uri = array(
							"edit" 		=> $edit,
							"delete"	=> $del,
							"del_msg"	=> "confirm return('Hapus Data ".$value->Nama."? ')"

						);
		$ResultData[] = "
			<span class='hide-print'>
			<a title='Ubah Data' href='./?".$crud_uri[edit]."' class='link'><span class='glyphicon glyphicon-pencil btn btn-xs btn-default'></span></a>
			<a title='Hapus Data' onClick='".$crud_uri[del_msg]."' href='./?".$crud_uri[delete]."' class='link'><span class='glyphicon glyphicon-trash btn btn-xs btn-danger'></span></a>
			<a title='Detail Data' href='url_edit/".$value->id_peserta." class='link'><span class='glyphicon glyphicon-list-alt btn btn-xs btn-success'></span></a>
			</span>
		";

		//memasukan array ke variable $data

		$data[] = $ResultData;

	} // CLOSE foreach ($query	as $value)

//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
