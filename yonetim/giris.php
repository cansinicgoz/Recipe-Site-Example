<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>index</title>
<style>
	.form--success {
		color: #fff;
		padding: 8px 16px;
		margin-bottom: 16px;
		background-color: #4caf50;
	}

	.form--error {
		color: #fff;
		padding: 8px 16px;
		margin-bottom: 16px;
		background-color: #f44336;
	}
</style>
</head>
<body>

<?php
	include ('baglan.php');


	if(isset($_POST['submit'])) {
		$mail = $_POST['mail'];
		$sifre = $_POST['sifre'];

		$bak="select  * from uyeler where uyeler_mail='$mail' and uyeler_sifre='$sifre'";
		$say =$conn->query($bak);
		$varmi=$say->rowCount();

		$response = "";
		$responseStatus = "";
		if($varmi > 0) {
			$cikti = $say->fetch(PDO::FETCH_ASSOC);
			session_start();
			$_SESSION['userId'] = $cikti["uyeler_id"];
		if ($cikti["uyeler_tur"] == 1) {
			$response = "Admin olarak başarılı bir şekilde giriş yaptınız. Yönlendirme işlemi için lütfen bekleyiniz...";
			$responseStatus = "success";
			echo '<meta http-equiv="refresh" content="1;URL=/yonetim/admin.php">';
		}
		if ($cikti["uyeler_tur"] == 2) {
			$response = "Başarılı bir şekilde giriş yaptınız. Yönlendirme işlemi için lütfen bekleyiniz...";
			$responseStatus = "success";
			echo '<meta http-equiv="refresh" content="1;URL=/index.html">';
		}
		
	} 
		else {
		$response = "Hatalı giriş. Mail veya şifrenizi kontrol ediniz.";
		$responseStatus = "error";
		
	}
	}
?>
<div style="padding:100px; text-align: center;">
<h1>CANSIN USTA WEB SAYFASI</h1>
<p>Uygulamaya giriş yapmak için mail ve şifrenizi giriniz</p>
<?php
	if (isset($response)) {
		$class = $responseStatus == "success" ? "form--success" : "form--error";
		echo "<div role=alert class=$class>$response</div>";
	}
?>
<form action="" method="post">
  Mail<br>
  <input type="email" name="mail" required><br>
  Şifre<br>
  <input type="password" name="sifre" required><br><br>
  <input type="submit" value="Giriş Yap" name="submit">
</form>
<a href="/yonetim/kayit.php">Hesabım yok?</a>
</body>
</html>
