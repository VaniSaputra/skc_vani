<?php
//$uriget in index.php
include "lib/config.php";

$id 		 = $uriget[id_kelas];
$peserta 	 = new Database;

$table		 = "kelas_all";
$where		 = "id_kelas";

$peserta_del = $peserta->delete($table,$where,$id);
echo "
	<script type='text/javascript'>				
		alert('Data dihapus');
	</script>
	<meta http-equiv='refresh' content='0;url=./?".$link_manage_kelas."' />
";


?>