<?php
//$uriget in index.php
include "lib/config.php";

$id 		 = $uriget[id_peserta];
$peserta 	 = new Database;

$table		 = "peserta";
$where		 = "id_peserta";

$peserta_del = $peserta->delete($table,$where,$id);
echo "
	<script type='text/javascript'>				
		return confirm('Data dihapus');
	</script>
	<meta http-equiv='refresh' content='0;url=./?".$link_overall."' />
";


?>