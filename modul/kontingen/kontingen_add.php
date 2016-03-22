   <!-- Page Content -->
<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1>
        	<a href="#" onclick="history.back()" title="Kembali" class="btn btn-success"><span class="glyphicon glyphicon-chevron-left"></span>  </a>
        	 Tambah kontingen Pertandingan <br> <small>Solocup 2016 Database</small> <br>
        </h1>
		
		<form method="post" action="./?<?php echo $link_kontingen_add; ?>">
			<!-- Text input-->
			<div class="form-group row">
			  <label class="col-md-4 control-label" for="isi_kontingen">kontingen Pertandingan</label>  
			  <div class="col-md-4">
			  <input id="isi_kontingen" name="isi_kontingen" type="text" placeholder="kontingen" class="form-control input-md" required="">
			    
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
		$kontingen 		= new Database;
		$table 		= 'kontingen_all';
		$kontingen_isi 	= array(
							'isi'=>$_POST[isi_kontingen]
							 );

		$exec 		= $kontingen->insert($table,$kontingen_isi);
		if($exec){
			echo "<script>alert('Perubahan Tersimpan');</script>";
			header('location:./?'.$link_manage_kontingen);
		}
	}	
?>