<!DOCTYPE html>
<html>
<head>
<title>ADMİN PANELİ</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="icon" href="https://www.kindpng.com/picc/m/247-2472302_admin-transparent-background-admin-icon-hd-png-download.png">
<style>
	body{
		margin: 0px;
		padding: 0px;
	}
.col-sm
{
	border:2px solid grey;
}
a
{ text-decoration:none;}
.cards{
	border: 3px solid green; 
    border-radius: 0px;
	width:350px;
    height: auto; 
    float:left;
    text-align: center;
    margin: 30px;
    background-color: white;	
}
.navbar
{
    font-family: sans-serif;
    background-color:black;
    width: 100%;
    padding-bottom: 0px;
    display: inline-block; 
    align-items: center; 
    
}


.kutular
{
  margin-top: 11px;
  float: right;
  
}
.kutular > a
{
    text-decoration: none;
    color:white;
    margin-right: 30px;
    transition: 0.8s;
}
a:hover
{
    color:aquamarine;
}



</style>

</head>
<body>
<nav class="navbar">

<h1 style="float: left;margin-left: 3%;color:white;margin-top:12px;font-size: 25px;font-family: arial;">CANSIN CHEFF ADMİN</h1>  

        <div class="kutular">    
            <a href="http://localhost/index.html#home">ANA SAYFA</a>                      
        </div>
</nav>

<?php
include('baglan.php');
?>
<center><h2>Admin Paneli</h2></center>
<div class="container" style="padding:50px;">
 
 <div class="row">
  
  
    <div class="col-sm" >
     Üyeler<hr>
	 <a href="admin.php?islem=1">Üyeleri Listele</a><br>
	 <a href="admin.php?islem=2">Admin Yapma</a><br>
	 <a href="admin.php?islem=3">Üye Sil</a><br>
	 <a href="admin.php?islem=14">Kullanıcı Yapma</a><br>
	 <a href="admin.php?islem=16">Ürün Ekle</a><br>
	 <a href="admin.php?islem=17">Ürün Listesi</a><br>
	 
    </div>
  </div>
  <br>
    <?php
	
	

	
	
	$sorgu = $conn->query("SELECT * FROM uyeler where uyeler_tur='2'");
	
	

    
	
	
	
	$islem=@$_GET["islem"];
	switch ($islem)
	{
		case "1":
		
			$sql = "SELECT uyeler_id, uyeler_isim, uyeler_soyisim,uyeler_mail FROM uyeler";
			$result = $conn->query($sql);
			
			session_start();
			
			if (isset($result)) {
				
				while($row = $result->fetch(PDO::FETCH_ASSOC)) {
					  
					echo "<div>"."İD: ".$row["uyeler_id"]."<br>"."</br>"."<div class='uyead'>"."ADI: ".$row["uyeler_isim"]."</div>"."</br>".
					"<div class='uyesoyisim'>"."SOY İSİM: ".$row["uyeler_soyisim"]."</div></br><div class='uyemail'>"."MAİL: ".$row["uyeler_mail"].
					"</div></div><br><hr>".					
					"</br>";
					
						   
					}
				
				}
			 else {
				echo "sonuç yok";
			}
		
		
		break;
		
		case "2":
			echo "<h5>Admin Yap</h5>" . "</br>";
			

		 while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
			echo "Adı: " . $cikti["uyeler_isim"] . "<br /> Soyadı: " . $cikti["uyeler_soyisim"] . "<br /> E-posta: " . $cikti["uyeler_mail"] . "<br>";
			echo '<button type="button" class="btn btn-danger"><a  style="color:white;" href="admin.php?islem=12&id='.$cikti["uyeler_id"].'">ADMİN YAP</a></button>';
			
			echo "<hr />";
 
	   }

			break;
		case "3":

			

		 while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
			  echo "Adı: " . $cikti["uyeler_isim"] . "<br /> Soyadı: " . $cikti["uyeler_soyisim"] . "<br /> E-posta: " . $cikti["uyeler_mail"] . "<br>";
			  echo '<button type="button" class="btn btn-danger"><a  style="color:white;" href="admin.php?islem=9&id='.$cikti["uyeler_id"].'">SİL</a></button>';
			  
			  echo "<hr />";
   
		 }
		
		
		
		break;

		case "9":
		
		$uyeler_id=$_GET["id"];
		//$uyeler_id=10;
		$sonuc = $conn->exec("DELETE FROM uyeler WHERE uyeler_id='$uyeler_id'");

    if ($sonuc > 0) {
        echo " kayıt silindi.";
    } else {
        echo "Herhangi bir kayıt silinemedi.";
    }
		
		
		
		break;
		case "10":
		
		$sifre=$_POST["sifre"];
		$m5_sifre=md5($sifre);
	 	$sifresifirla = $conn->exec("UPDATE uyeler SET uyeler_sifre = '$m5_sifre' WHERE uyeler_id = 1");

    if ($sifresifirla > 0) {
        echo " kayıt güncellendi.";
    } else {
        echo "Herhangi bir kayıt güncellenemedi.";
    }
	break;

	case "11":
		
		$mesaj_id=$_GET["mesaj_id"];
		$sonuc = $conn->exec("DELETE FROM mesajlar WHERE mesaj_id='$mesaj_id'");

    if ($sonuc > 0) {
        echo " kayıt silindi.";
    } else {
        echo "Herhangi bir kayıt silinemedi.";
    }
		
		
		
		break;

		case "12":
		
			$uyeler_id=$_GET["id"];
			$sonuc = $conn->exec("UPDATE uyeler SET uyeler_tur = '2' WHERE uyeler_id ='$uyeler_id'");
	
		if ($sonuc > 0) {
			echo " Kullanıcı Admin Yapıldı.";
		} else {
			echo "Herhangi Bir Kullanıcı Admin Yapılamadı!";
		}
			
			
			
			break;

			case "13":
		
				$uyeler_id=$_GET["id"];
				$sonuc = $conn->exec("UPDATE uyeler SET uyeler_tur = '2' WHERE uyeler_id ='$uyeler_id'");
		
			if ($sonuc > 0) {
				echo "Admin Kullanıcı Yapıldı.";
			} else {
				echo "Herhangi Bir Admin Kullanıcı Yapılamadı!";
			}
				
				
				
				break;

				case "14":
					echo "<h5>Kullanıcı Yap</h5>" . "</>";

					$sorgu = $conn->query("SELECT * FROM uyeler where uyeler_tur='1'");
					
				 while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
					echo "Adı: " . $cikti["uyeler_isim"] . "<br /> Soyadı: " . $cikti["uyeler_soyisim"] . "<br /> E-posta: " . $cikti["uyeler_mail"] . "<br>";
					echo '<button type="button" class="btn btn-danger"><a  style="color:white;" href="admin.php?islem=13&id='.$cikti["uyeler_id"].'">KULLANICI YAP</a></button>';
					
					echo "<hr />";
		 
			   }
		
					break;

					case"15":


						$baslik=$_POST["baslik"];
						$detay=$_POST["detay"];
						$fiyat=$_POST["fiyat"];
						
						
						$bak="select  * from uyeler where uyeler_mail='$baslik' ";
						$say =$conn->query($bak);
						$varmi=$say->rowCount();
						
							if($varmi>0)
							{ echo '<script>alert("Bu ürün zaten kayıtlı");</script>';
							  echo '<meta http-equiv="refresh" content="0;URL=';
							}
						
							else {
						
								
						
								$sql = "INSERT INTO urunler(urun_adi, urun_bilgisi, urun_fiyati)
								VALUES ('$baslik', '$detay', '$fiyat')";
						
						  $conn->exec($sql);
						  echo '<script>alert("Kayıt Başarılı");</script>';
								echo '<meta http-equiv="refresh" content="0;URL=admin.php">';
							}

						break;

						case"16":

							echo "
							<div>
							<div>
							
							<h2>ÜRÜN EKLE</h2>
							<form action='admin.php?islem=15' method='post'>
							  
							  <br>
							  <input type='text' name='baslik' placeholder='BAŞLIK' required><br>
							  <br>
							  <input type='text' name='detay' placeholder='DETAY' required><br>
							  <br>
							  <input type='text' name='fiyat' placeholder='FİYAT' required><br>
							  <input type='submit' value='EKLE'>
							  <br><br>";
							
	
							break;

							case "17":
								error_reporting(0);
								$sorgu = $conn->query("SELECT * FROM urunler");
							while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
							echo "Adı: " . $cikti["urun_adi"] . "<br /> Detay: " . $cikti["urun_bilgisi"] . "<br /> Fiyatı: " . $cikti["urun_fiyati"] . "<br>";
							echo '<button type="button" class="btn btn-danger"><a  style="color:white;" href="admin.php?islem=18&id='.$cikti["urun_id"].'">SİL</a></button>';
							echo "<hr />";
						
						}
								break;


								case "18":
		
									$urun_id=$_GET["id"];
									$sonuc = $conn->exec("DELETE FROM urunler WHERE urun_id='$urun_id'");
							
								if ($sonuc > 0) {
									echo " kayıt silindi.";
								} else {
									echo "Herhangi bir kayıt silinemedi.";
								}
									
									
									
									break;


									case "19":
		
										$mesaj_id=$_GET["id"];
										$sonuc = $conn->exec("DELETE FROM mesajlar WHERE mesaj_id='$mesaj_id'");
								
									if ($sonuc > 0) {
										echo " kayıt silindi.";
									} else {
										echo "Herhangi bir kayıt silinemedi.";
									}
										
										
										
										break;
	

			
		
		
		
		default:
		//echo "HATA";
	}
	
	?>
  
  
</div>



</body>
</html>



