<!DOCTYPE html>
<html>
<head>
<title>index</title>
</head>
  
<body>

<?php
include('baglan.php');
?>
<div style="padding:100px; text-align: center;">
<h1>CANSIN İÇGÖZ</h1>
<p>Kayıt olmak için mail aşağıdaki formu doldurunuz</p>

<form action="kayit.php" method="post">
  İsim<br>
  <input type="text"  name="ahmet" required><br>
  Soyisim<br>
  <input type="text"  name="soyisim" required><br>
  Mail<br>
  <input type="email" name="mail" required><br>
  Şifre<br>
  <input type="password" name="sifre" required><br><br>
  <input type="submit" value="Kayıt Ol">
</form>
<a href="/yonetim/giris.php">Zaten Bir Hesabım Var.</a>


</body>
</html>