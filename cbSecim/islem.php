<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Sandık numarasını al
  $sandikNo = $_POST["sandikNo"]; echo $sandikNo; } ?>
 Numaralı Sandık | Dijital Cumhurbaşkanlığı Oy Sayım Çetelesi</title>
<link rel="stylesheet" type="text/css" href="style/islem.css">
<link rel="icon" type="image/x-icon" href="img/tr.png">
<script>
    function disableZoom(event) {
      event.preventDefault();
    }
    document.addEventListener("dblclick", disableZoom);
function sonlandır(){
   var sonlandirOnay = confirm("Seçimi sonlandırmak istediğinizden emin misiniz? Bu işlemden sonra oylara müdahale edemeyeceksiniz.");
   if (sonlandirOnay) {
    var elements = document.getElementsByClassName("gizle");
  for (var i = 0; i < elements.length; i++) {
    elements[i].style.display = "none";
  }
  var elements = document.getElementsByClassName("degistir");
  for (var i = 0; i < elements.length; i++) {
    elements[i].style.height = "50%";
  }
  var elements = document.getElementsByClassName("degistirMain");
  for (var i = 0; i < elements.length; i++) {
    elements[i].style.height = "30%";
  }
   var metinElementleri = document.getElementsByClassName("baslik");
  for (var i = 0; i < metinElementleri.length; i++) {
    metinElementleri[i].innerHTML = "<strong>" + "<h2>"+"CUMHURBAŞKANLIĞI OY SAYIM ÇETELESİ" + "</h2>" + "<p>"
    + "<h3>" +"Sandık Numarası: " + "<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Sandık numarasını al
  $sandikNo = $_POST["sandikNo"]; echo $sandikNo; } ?>" + "</h3>"+"</strong>"
    ;
  }
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
   }
}
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
  kkOy = 0;
     rteOy = 0;
     gecersizOylar = 0;
     gecerliOylar = 0;
     toplam = 0;
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
<div class="sandik gizle baslik">
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
<div class="main degistirMain">
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
    <button class="arti gizle" onclick="oyArttir('rte')">+</button>
    <p>
      <button class="eksi gizle" onclick="oyCikart('rte')">-</button>
    </div>
    <div class="ortaCizgi degistir">
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
      <button class="arti gizle" onclick="oyArttir('kk')">+</button>
      <p>
        <button class="eksi gizle" onclick="oyCikart('kk')">-</button>
      </div>
    </div>
    <div class="yanCizgi">
    </div>
    <div class="gecersizOylar">
      <h2>Geçersiz Oylar</h2>
      <h1 id="gecersiz">0</h1>
      <button class="artiGecersiz gizle" onclick="gecersizArttir()">+</button>
      <p>
        <button class="eksiGecersiz gizle" onclick="gecersizCikart()">-</button>
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
      <div class="yanCizgi gizle">
      </div>
      <button class="sifirla gizle" onclick="oySifirla()">Tüm Oyları Sıfırla</button>
      <button class="sifirla gizle" onclick="goBack()">Sandık Seçimine Geri Dön</button>
      <button class="sifirla2 gizle" onclick="sonlandır()">Sayımı Sonlandır</button>
      </body>
      <footer></footer>
      </html>