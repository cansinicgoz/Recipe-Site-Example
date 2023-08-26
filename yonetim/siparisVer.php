<?php
include ('baglan.php');


$isim=$_POST["isim"];
$telefon=$_POST["telefonNumarasi"];
$mail=$_POST["mail"];
$mesaj=$_POST["mesaj"];
		
		$sql = "INSERT INTO mesajlar (isimSoyisim, gonderen_tel, gonderen_mail,mesaj,mesaj_tarih)
  VALUES ('$isim', '$telefon', '$mail','$mesaj','2022-31-05')";
  
  $conn->exec($sql);
  { echo '<script>alert("Siparişiniz Oluşturulmuştur");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=/index.html">';
        }
?>
