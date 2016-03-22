//Tutor Ajax PHP

<?php
    echo 'Hello';
?>

<html>
<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: 'file1.php',
                success: function(data) {
                    alert(data);
                }
            });

        }); //END $(document).ready()

    </script>
</head>
<body></body>
</html>

<script>
$(document).ready(function() {   
    $(".myclass").change(function(){
        var identifier = $(this).attr('id');
        var Qty = $(this).val();
        var Price = $("#price_"+identifier).val();//price value
        var Total =  Qty * Price;  
        $("#priceDisplay_"+identifier).html(Total);                 
        GrandTotal();

        //Call an ajax function here
          $.ajax({
             type: "GET",
             url: "sessionupdate.php",
             data: { quantity:Qty,price1:Price,id: <?php echo $_SESSION['r'];?>},
             success:function(data){
                     alert(data);
              }
           });
       });
     GrandTotal();      
      });
</script>

<?php 
//contoh array
$data = Array
(
    [1] => 'Kalkulator',
    [2] => 'Server',
    [3] => 'Komputer',
    [4] => 'PC'
);
 
//hasil serialisasi (serialization)
$hasil_serialisasi = serialize($data);
echo $hasil_serialisasi; ## akan menghasilkan a:4:{i:1;s:10:"Kalkulator";i:2;s:6:"Server";i:3;s:8:"Komputer";i:4;s:2:"PC";}
 
//$hasil_serisalisasi inilah yang dapat anda masukkan ke suatu kolom      

?>