<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Sandık numarasını al
  $sandikNo = $_POST["sandikNo"]; echo $sandikNo; } ?> Numaralı Sandık | Dijital Cumhurbaşkanlığı Oy Sayım Çetelesi</title>
<link rel="stylesheet" type="text/css" href="style/islem.css">
<link rel="icon" type="image/x-icon" href="img/tr.png">
<script>
    // Sayfa üzerinde çift tıklama olayını dinleyen fonksiyon
    function disableZoom(event) {
      event.preventDefault(); // Varsayılan davranışı engelle
    }
    // Çift tıklama olayını yakala
    document.addEventListener("dblclick", disableZoom);
  </script>
<script>
    // Sandık seçimine geri dön
function goBack() {
  var onay1 = confirm("Sandık seçimine geri dönmek istediğinizden emin misiniz? Bu işlemden sonra girdiğiniz tüm veriler temizlenecektir.");
  if (onay1) {
    window.location.href = "index.php";
  }
}
    // Oyların tutulacağı değişkenleri tanımlayalım
    var kkOy = 0;
    var rteOy = 0;
    var gecersizOylar = 0;
    var gecerliOylar = 0;
    var toplam = 0;
    // Buton tıklandığında oyu artırma işlemini gerçekleştiren fonksiyon
    function oyArttir(aday) {
      if (aday === "kk") {
        kkOy++;
        gecerliOylar++;
      } else if (aday === "rte") {
        rteOy++;
        gecerliOylar++;
      }
      toplam = gecerliOylar+gecersizOylar;
      document.getElementById("kkOy").innerText = kkOy;
      document.getElementById("rteOy").innerText = rteOy;
      document.getElementById("gecerli").innerText = gecerliOylar;
      document.getElementById("toplam").innerText = toplam;
    }
  function oyCikart(aday) {
      if (aday === "kk" && kkOy > 0) {
        kkOy--;
        gecerliOylar--;
      } else if (aday === "rte" && rteOy > 0) {
        rteOy--;
        gecerliOylar--;
      }
      toplam = gecerliOylar+gecersizOylar;
      localStorage.setItem("kkOy", kkOy);
      localStorage.setItem("rteOy", rteOy);
      localStorage.setItem("gecerli", gecerliOylar);
      localStorage.setItem("toplam", toplam);
      document.getElementById("kkOy").innerText = kkOy;
      document.getElementById("rteOy").innerText = rteOy;
      document.getElementById("gecerli").innerText = gecerliOylar;
      document.getElementById("toplam").innerText = toplam;
    }
   // Oyları sıfırlama fonksiyonu
    function oySifirla() {
    var onay = confirm("Tüm verileri sıfırlamak istediğinizden emin misiniz? Bu işlem geri alınamaz.");
if (onay) {
 var kkOy = 0;
    var rteOy = 0;
    var gecersizOylar = 0;
    var gecerliOylar = 0;
    var toplam = 0;
      document.getElementById("kkOy").innerText = kkOy;
      document.getElementById("rteOy").innerText = rteOy;
      document.getElementById("gecerli").innerText = gecerliOylar;
      document.getElementById("gecersiz").innerText = gecersizOylar;
      document.getElementById("toplam").innerText = toplam;
}
    }
    // Geçersiz oylar
    function gecersizArttir(){
      gecersizOylar++;
      toplam = gecerliOylar + gecersizOylar;
      document.getElementById("gecersiz").innerText = gecersizOylar;
      document.getElementById("toplam").innerText = toplam;
    }
    function gecersizCikart(){
      if (gecersizOylar>0) {
        gecersizOylar--;
        toplam = gecerliOylar + gecersizOylar;
        document.getElementById("gecersiz").innerText = gecersizOylar;
        document.getElementById("toplam").innerText = toplam;
      }
    }
  </script>
</head>
<body>
<div class="sandik">
  Sandık Numarası: <strong><?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Sandık numarasını al
  $sandikNo = $_POST["sandikNo"];
  if($sandikNo == 2133){
echo '<script>
  alert("Merhaba Halil Olcay!");</script>
  '; } else if($sandikNo == 2134){ echo '
  <script>alert("Merhaba Sibel!");</script>
  '; } else if($sandikNo == 2135){ echo '
  <script>alert("Merhaba Şevval Sude!");</script>
  '; } else if($sandikNo == 2137){ echo '
  <script>alert("Merhaba Bora!");</script>
  '; } echo $sandikNo; } ?></strong>
</div>
<header class="baslik">
<h2>DİJİTAL<br>
CUMHURBAŞKANLIĞI OY SAYIM ÇETELESİ</h2>
<h4></h4>
</header>
<div class="main">
  <div class="box">
    <div class="rteFotograf">
    </div>
    <span>
    <h3>Recep Tayyip<br>
    Erdoğan</h3>
    </span>
    <span>
    <h1 id="rteOy">0</h1>
    </span>
    <button class="arti" onclick="oyArttir('rte')">+</button>
    <p>
      <button class="eksi" onclick="oyCikart('rte')">-</button>
    </div>
    <div class="ortaCizgi">
    </div>
    <div class="box">
      <div class="kkFotograf">
      </div>
      <span>
      <h3>Kemal<br>
      Kılıçdaroğlu</h3>
      </span>
      <span>
      <h1 id="kkOy">0</h1>
      </span>
      <button class="arti" onclick="oyArttir('kk')">+</button>
      <p>
        <button class="eksi" onclick="oyCikart('kk')">-</button>
      </div>
    </div>
    <div class="yanCizgi">
    </div>
    <div class="gecersizOylar">
      <h2>Geçersiz Oylar</h2>
      <h1 id="gecersiz">0</h1>
      <button class="arti" onclick="gecersizArttir()">+</button>
      <p>
        <button class="eksi" onclick="gecersizCikart()">-</button>
      </div>
      <div class="yanCizgi">
      </div>
      <div class="gecersizOylar">
        <h2>Geçerli Oylar</h2>
        <h1 id="gecerli">0</h1>
      </div>
      <div class="yanCizgi">
      </div>
      <div class="gecersizOylar">
        <h2>Açılan Zarf Sayısı</h2>
        <h1 id="toplam">0</h1>
      </div>
      <div class="yanCizgi">
      </div>
      <div class="main2">
        <button class="sifirla" onclick="oySifirla()">Tüm Oyları Sıfırla</button>
        <button class="sifirla" onclick="goBack()">Sandık Seçimine Geri Dön</button>
      </div>
      </body>
      <footer></footer>
      </html>