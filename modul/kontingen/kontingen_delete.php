<?php
//$uriget in index.php
include "lib/config.php";

$id 		 = $uriget[id_kontingen];
$peserta 	 = new Database;

$table		 = "kontingen_all";
$where		 = "id_kontingen";

$peserta_del = $peserta->delete($table,$where,$id);
echo "
	<script type='text/javascript'>				
		alert('Data dihapus');
	</script>
	<meta http-equiv='refresh' content='0;url=./?".$link_manage_kontingen."' />
";


?>