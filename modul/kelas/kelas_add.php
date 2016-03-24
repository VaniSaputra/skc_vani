   <!-- Page Content -->
<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1>
        	<a href="#" onclick="history.back()" title="Kembali" class="btn btn-success"><span class="glyphicon glyphicon-chevron-left"></span>  </a>
        	 Tambah Kelas Pertandingan <br> <small>Solocup 2016 Database</small> <br>
        </h1>
		
		<form method="post" action="./?<?php echo $link_kelas_add; ?>">
			<!-- Text input-->
			<div class="form-group row">
			  <label class="col-md-4 control-label" for="isi_kelas">Kelas Pertandingan</label>  
			  <div class="col-md-4">
			  <input id="isi_kelas" name="isi_kelas" type="text" placeholder="Kelas" class="form-control input-md" required="">
			    
			  </div>
			</div>
			
			<!-- Button (Double) -->
			<div class="form-group row">
			  <label class="col-md-4 control-label" for="button1idsubmit"></label>
			  <div class="col-md-4">
			    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			    <button type="reset" id="reset" name="reset" class="btn btn-default">Reset</button>
			  </div>
			</div>			
		</form>
	</div>
</div>

<?php
	include "lib/config.php";

	if($_POST[submit])
	{
		$kelas 		= new Database;
		$table 		= 'kelas_all';
		$kelas_isi 	= array(
							'isi_kelas'=>$_POST[isi_kelas]
							 );

		$exec 		= $kelas->insert($table,$kelas_isi);
		if($exec){
			echo "<script>alert('Perubahan Tersimpan');</script>";
			header('location:./?'.$link_manage_kelas);
		}
	}	
?>