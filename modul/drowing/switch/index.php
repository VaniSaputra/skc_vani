<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta name="author" content="Darko Bunic"/>
		<meta name="description" content="Drag and drop table content with JavaScript"/>
		<meta name="viewport" content="width=device-width, user-scalable=no"/><!-- "position: fixed" fix for Android 2.2+ -->
		<link rel="stylesheet" href="../../../assets/css/bootstrap.min.css" type="text/css"/>
		<link rel="stylesheet" href="style.css" type="text/css" media="screen"/>
		<script type="text/javascript" src="../../../assets/js/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="../../../assets/redips/header.js"></script>
		<script type="text/javascript" src="../../../assets/redips/redips-drag-min.js"></script>
		<script type="text/javascript" src="script.js"></script>

		<title>Drowing Switch Content</title>
	</head>
	<body>
		<!-- tables inside this DIV could have draggable content -->
		<div class="container">
			<div align="center">
				<?php 		
				echo "<br />ID Kelas: 5 <br>";
				echo "<strong>Kadet Junior Putra</strong><br>";
				echo "Jumlah Peserta Kelas: 36 /";
				echo " Jumlah Pool : 3<br><br>"		
				?>
			</div>
			<div id="redips-drag">
				<!-- <div class="hide-this"> -->
					<!-- "shift" drop option with animation checkbox -->
					<!-- <input type="radio" name="drop_option" class="checkbox hide-this" onclick="setDropMode(this)" value="shift" title="Shift table content"/> Shift -->
					<!-- (<input type="checkbox" class="checkbox" onclick="toggleAnimation(this)" title="Enable / disable animation"/>with animation) -->
					<!-- <br/> -->
					<!-- "switching" drop option -->
					<!-- <input type="radio" name="drop_option" class="checkbox" onclick="setDropMode(this)" value="switching" title="Switching content continuously" checked="true"/> Switching -->
				<!-- </div> -->

				<!-- table -->
				<table id="table1">
					<thead><th>Pool A</th></thead>
					<tbody>
						<?php
							$nama 	= array("John", "Tari", "Nurma", "Leina", "Baroui", "Nimanum", "Raowsandi", "Akmal",
											"Imam", "Jandon", "Mikey", "La Fahmi");
							$no		= 0;
							foreach ($nama as $key => $value) {						
										$no += 1;
						 ?>					
						<tr class="a<?php echo $no; ?>"><td>
							<span><?php echo $no; ?></span>
							<div class="redips-drag white" value="<?php echo $value; ?>"><?php echo $value; ?></div>
						</td></tr>
						<?php
							} // CLOSE foreach ($nama as $key) {
						?>
					</tbody>
				</table>

				<table id="table1">
					<thead><th>Pool B</th></thead>
					<tbody>
						<?php
							$nama_2 	= array("Baroui", "Nimanum", "Raowsandi", "Akmal",
											"Imam", "Jandon", "Mikey","John", "Tari", "Nurma", "Leina","La Fahmi");
							foreach ($nama_2 as $key => $value) {						
										$no += 1;
						 ?>					
						<tr class="a<?php echo $no; ?>"><td>
							<span><?php echo $no; ?></span>
							<div class="redips-drag white" value="<?php echo $value; ?>"><?php echo $value; ?></div>
						</td></tr>
						<?php
							} // CLOSE foreach ($nama as $key) {
						?>
					</tbody>
				</table>

				<table id="table1">
					<thead><th>Pool C</th></thead>
					<tbody>
						<?php
							$nama_3 	= array("Akmal","Imam", "Jandon", "Baroui", "Nimanum", "Raowsandi", 
											"Mikey","John", "Tari", "Nurma", "Leina","La Fahmi");
							foreach ($nama_2 as $key => $value) {						
										$no += 1;
						 ?>					
						<tr class="a<?php echo $no; ?>"><td>
							<span><?php echo $no; ?></span>
							<div class="redips-drag white" value="<?php echo $value; ?>"><?php echo $value; ?></div>
						</td></tr>
						<?php
							} // CLOSE foreach ($nama as $key) {
						?>
					</tbody>
				</table>

				<br>
				<button class="btn btn-primary">Selesai Edit Manual</button>
				<br><br>
				<form action="#" method="post">
					<?php 					
						$jml_nama = count($nama);
						foreach ($nama_2 as $key => $value) {
							$nama[$jml_nama] = $value;
							$jml_nama += 1;
						}
						foreach ($nama_3 as $key => $value) {
							$nama[$jml_nama] = $value;
							$jml_nama += 1;
						}					
						$no		= 0;
						foreach ($nama as $key => $value) {						
							$no += 1;
							if($no % 12 == 0){echo "<br>";}
					?>
					<div class="disp-input">			
					No. <?php echo $no; ?> : <input type="text" name="var<?php echo $no; ?>" id="var<?php echo $no; ?>" placeholder="Variable <?php echo $no; ?>" />
					</div>
					<?php } // close foreach ?>
				</form> 						
			</div> <!-- Redisp Drag -->
		</div> <!-- .container -->
	</body>

	<script type="text/javascript">
		var val;
		$(document).ready(function(){
		    $("button").click(function(){
				<?php 
					$no		= 0;
					foreach ($nama as $key => $value) {						
						$no += 1;
				?>			    	
			        val = $("tr.a<?php echo $no; ?>>td>div").attr("value");
			        $("#var<?php echo $no; ?>").attr({
			          "value" : val			   
		        	});
			    <?php } // close foreach ?>
		    });
		});
	</script>	
</html>