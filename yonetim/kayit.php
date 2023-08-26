<!DOCTYPE html>
<html>
<head>
<title>index</title>
</head>
<body>

<?php
include ('baglan.php');


$isim=$_POST["isim"];
$soyisim=$_POST["soyisim"];
$mail=$_POST["mail"];
$sifre=$_POST["sifre"];

$bak="select  * from uyeler where uyeler_mail='$mail' ";
$say =$conn->query($bak);
$varmi=$say->rowCount();

if($varmi>0)
		{ echo '<script>alert("Hoş Geldiniz");</script>';
echo '<meta http-equiv="refresh" content="0;URL=index.php">';
	}
	
	else {
		
		$sql = "INSERT INTO uyeler (uyeler_isim, uyeler_soyisim, uyeler_mail,uyeler_sifre,uyeler_tur)
  VALUES ('$isim', '$soyisim', '$mail','$sifre','2')";
  
  $conn->exec($sql);
  echo '<script>alert("Başarıyla Kayıt Oldunuz!");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=giris.php">';
	}

?>


</body>
</html>
