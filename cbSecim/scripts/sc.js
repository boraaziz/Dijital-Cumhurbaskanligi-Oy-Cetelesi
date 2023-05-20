  // Sayfa üzerinde çift tıklama olayını dinleyen fonksiyon
    function disableZoom(event) {
      event.preventDefault(); // Varsayılan davranışı engelle
    }
    // Çift tıklama olayını yakala
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