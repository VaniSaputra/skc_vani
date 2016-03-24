   <!-- Page Content -->
<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1> <span class="label label-danger">View Drowing</span><br> <small>Solocup 2016 Database</small> <br></h1>        
	<?php

		$id_kelas = $uriget[id_kelas];

		// Konversi id_kelas > isi dansebaliknya

		include "lib/config.php";
		$kelas_id_conv    = array();
		$kelas_id         = $db->fetch_all("kelas_all");

		foreach($kelas_id as $val){
		// Buat Array dengan id=isi kelas dan value id kelas, untuk konversi saat POST
		$kelas_id_conv[$val->isi] = $val->id_kelas;

		// Buat Array dengan id=idkelas kelas dan value isi, untuk konversi saat POST
		$kelas_val_conv[$val->id_kelas] = $val->isi;
		}
		// -- END KONVERSI

		// Hitung jumlah peserta di kelas ini
		$query_count	= $db->custom_query("SELECT COUNT(*) AS Jumlah FROM peserta WHERE id_kelas='$id_kelas'");
		foreach ($query_count as $count){
			$count_kelas	= $count->Jumlah;
		}

		// List Nama peserta & Kontingen
		$urutan				= array();
		$isi_urutan 		= array();	
		$no 				= 1;


		// Maksimal 2 pool tiap kelas
		$pool 		 = array();
		if($count_kelas > 16){
			//cek genap / ganjil
			if($count_kelas % 2 == 0){
			}
		}

		$query_peserta	= $db->custom_query("SELECT * FROM peserta WHERE id_kelas='$id_kelas' ORDER BY rand()");

		foreach ($query_peserta as $val) {
			$isi_urutan["nama"]			= $val->nama;
			$isi_urutan["kontingen"]	= $val->kontingen;
			$urutan[$no]				= $isi_urutan;
			$no += 1;
		}

		$conv_serial = serialize($urutan);


		echo "ID Kelas: ".$id_kelas."<br>";
		echo "<strong>".$kelas_val_conv[$id_kelas]."</strong><br>";
		echo "Jumlah Peserta Kelas: ".$count_kelas."<br>";
		echo " Jumlah Pool : <br><br>"
		// echo $conv_serial;
	?>
	<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<thead>
			<th align="center" >No.</th>
			<th align="center" >Nama</th>
			<th align="center" >Kontingen</th>
			<th align="center" >Pool</th>
			<th align="center" >No. Urut</th>
		</thead>
		<tbody>
			<?php 
				
				$urutan_de		= unserialize($conv_serial);
				$no_tanding		= 0;

				foreach ($urutan_de AS $list_keys => $list ){
						$no_tanding += 1;
						// echo "No : ".."<br>";
						// echo $list[nama]." - ".$list[kontingen]."<br><br>";
			?>		
			<tr>
				<td><?php //echo $no_tanding; ?></td>
				<td><?php echo $list[nama]; ?></td>
				<td><?php echo $list[kontingen]; ?></td>
				<td> <input type="text" name="pool_no"></td>
				<td> <input type="text" name="no_tanding"></td>
			</tr>

			<?php 
				} // Close foreach ($urutan_de AS $list_keys => $list )
			?>

		</tbody>
	</table>
	</div> <!-- Close .table-responsive -->
    </div> <!-- END Heading Row -->
</div>    <!-- END Page Content -->	