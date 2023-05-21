<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Title kısmında sandık numarasını yazdık. -->
<title><?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Sandık numarasını al
  $sandikNo = $_POST["sandikNo"]; echo $sandikNo; } ?>
 Numaralı Sandık | Dijital Cumhurbaşkanlığı Oy Sayım Çetelesi</title>

<!-- İşlem sayfamız için islem.css dosyamızı entegre ettik. -->
<link rel="stylesheet" type="text/css" href="style/islem.css">

<!-- Sitenin küçük resmine Türk bayrağını ekledik. -->
<link rel="icon" type="image/x-icon" href="img/tr.png">

<!-- Ekran Görüntüsü alabilmek için HTML2CANVAS eklentisini "html2canvas.js" isimli bir dosyada tanımladık. Daha sonra bu dosyayı entegre ettik. -->
<script type="text/javascript" src="scripts/html2canvas.js"></script>

<!-- Genel işlem sayfasında kullanılan script dosyasını ekledik. -->
<script>
  // Telefonda hızlı oy ekleme sonucu çift tıklama esnasında ekranın büyümemesi için aşağıdaki fonksiyonu yazdık.
    function disableZoom(event) {
      event.preventDefault();
    }
    document.addEventListener("dblclick", disableZoom);

  // Her şeyin sonunda işlemi sonlandırmak için tek bir fonksiyon tanımladık. 
  function sonlandır(){

    // confirm methodu ile alert verip kullanıcının seçimi sonlandırmak isteyip istemediğini kontrol ettik.  
   var sonlandirOnay = confirm("Seçimi sonlandırmak istediğinizden emin misiniz? Bu işlemden sonra oylara müdahale edemeyeceksiniz.");

    // Eğer sonlandırma işlemi onaylandıysa aşağıdaki kod blokları çalışacaktır.
   if (sonlandirOnay) {

    // Sonlandırma sonucu, classında "gizle" ifadesi bulunan tüm öğeleri gizledik.
    var elements = document.getElementsByClassName("gizle");
  for (var i = 0; i < elements.length; i++) {
    elements[i].style.display = "none";
  }

    // Sonlandırma sonucu ortadaki çizginin height değerini değiştirmek için aşağıdaki kod bloğunu yazdık.
  var elements = document.getElementsByClassName("degistir");
  for (var i = 0; i < elements.length; i++) {
    elements[i].style.height = "50%";
  }

    // Main kısmının yüksekliğini değiştirmek için aşağıdaki döngüyü yazdık.
  var elements = document.getElementsByClassName("degistirMain");
  for (var i = 0; i < elements.length; i++) {
    elements[i].style.height = "30%";
  }

    // İşlemler sonlandırıldıktan sonra yazılacak olan başlığı oluşturduk.
    // CUMHURBAŞKANLIĞI OY SAYIM ÇETELESİ
    // Sandık numarası: XXXX
   var metinElementleri = document.getElementsByClassName("baslik");
  for (var i = 0; i < metinElementleri.length; i++) {
    metinElementleri[i].innerHTML = "<strong>" + "<h2>"+"CUMHURBAŞKANLIĞI OY SAYIM ÇETELESİ" + "</h2>" + "<p>"
    + "<h3>" + "Sandık Numarası: " + "<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Sandık numarasını al
  $sandikNo = $_POST["sandikNo"]; echo $sandikNo; } ?>" + "</h3>"+"</strong>"
    ;
  }

    // Ekran görüntüsü alma
   html2canvas(document.body).then(function(canvas) {
    var screenshot = canvas.toDataURL("image/png");
    var link = document.createElement('a');
    link.href = screenshot;
    link.download = '<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // İndirilecek olan dosyanın ismini XXXX_sandik_sonucu olarak değiştirdik.
  $sandikNo = $_POST["sandikNo"]; echo $sandikNo; } ?>' + '_sandik_sonucu.png';
    link.click();
  });

    // İşlem sonlandırıldıktan sonra sayfanın en yukarı çıkması için aşağıdaki kod bloğunu yazdık.
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
   }

}

    // Sandık seçimine geri dönmek için aşağıdaki fonksiyonu yazdık.
  function goBack() {

    // Onay aldık ve uyarı mesajı verdik.
  var onay1 = confirm("Sandık seçimine geri dönmek istediğinizden emin misiniz? Bu işlemden sonra girdiğiniz tüm veriler temizlenecektir.");
    // Eğer onaylanmışsa;
  if (onay1) {
    // kullanıcıyı Sandık Seçim Ekranına yönlendirdik.
    window.location.href = "index.php";
  }
}

    // Oyların tutulacağı değişkenleri tanımladık.
    var kkOy = 0;                 // Kemal Kılıçdaroğlu'nun oylarının tutulduğu değişken.
    var rteOy = 0;                // Recep Tayyip Erdoğan'ın oylarının tutulduğu değişken.
    var gecersizOylar = 0;        // Geçersiz oyların tutulduğu değişken.
    var gecerliOylar = 0;         // Geçerli oyların tutulduğu değişken.
    var toplam = 0;               // Toplam oyların tutulduğu değişken.

    // Buton tıklandığında oyu artırma işlemini gerçekleştiren fonksiyonu yazdık.
    function oyArttir(aday) {

      // Adaya oy yazıldığı takdirde oy geçerli sayılacağı için aynı zamanda gecerliOylar değişkenini arttırdık. 
      if (aday === "kk") {
        kkOy++;
        gecerliOylar++;
      } else if (aday === "rte") {
        rteOy++;
        gecerliOylar++;
      }

      // Her oy eklendiğinde hızlıca verilerin güncellenmesi için toplam oyları ve diğer tüm oyları güncelledik.
      toplam = gecerliOylar+gecersizOylar;

      // "xxxxXxxx" id'sine sahip öğelere karşılık gelen değişkenleri öğelerin yazısına yazdık.
      //                      "id"      =      Yeni Oy Değeri
      document.getElementById("kkOy").innerText = kkOy;
      document.getElementById("rteOy").innerText = rteOy;
      document.getElementById("gecerli").innerText = gecerliOylar;
      document.getElementById("toplam").innerText = toplam;
    }

    // Buton tıklandığında oyu çıkartma işlemini gerçekleştiren fonksiyonu yazdık.
  function oyCikart(aday) {

    // Adaydan her oy çıkartıldığında aynı zamanda gecerliOylar değişkenini azalttık. 
      if (aday === "kk" && kkOy > 0) {
        kkOy--;
        gecerliOylar--;
      } else if (aday === "rte" && rteOy > 0) {
        rteOy--;
        gecerliOylar--;
      }

      // Her oy çıkartıldığında hızlıca verilerin güncellenmesi için toplam oyları ve diğer tüm oyları güncelledik.
      // Oy eklemekten farklı olarak burada önce itemlere değer atadık daha sonra yazılarına ekleme yaptık.
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

    // Oyları sıfırlama fonksiyonunu yazdık.
    // Örneğin oyların tekrar sayımı için tüm oyların temizlenmesi gerektiğinde çalışacak fonksiyonu yazdık.
    function oySifirla() {

      // Onay alıyoruz.
    var onay = confirm("Tüm verileri sıfırlamak istediğinizden emin misiniz? Bu işlem geri alınamaz.");

    // Eğer onaylandıysa;
    if (onay) {

      // Tüm oyların değerini 0 yapıyoruz. Daha sonra;
      kkOy = 0;
      rteOy = 0;
      gecersizOylar = 0;
      gecerliOylar = 0;
      toplam = 0;

      // Tüm yeni değerleri ilgili öğelere güncelliyoruz.
      document.getElementById("kkOy").innerText = kkOy;
      document.getElementById("rteOy").innerText = rteOy;
      document.getElementById("gecerli").innerText = gecerliOylar;
      document.getElementById("gecersiz").innerText = gecersizOylar;
      document.getElementById("toplam").innerText = toplam;
}
    }


    // Geçersiz oy kullanımını arttırmak için aşağıdaki fonksiyonu yazdık.
    function gecersizArttir(){
      gecersizOylar++;
      toplam = gecerliOylar + gecersizOylar;

      // Güncelleme
      document.getElementById("gecersiz").innerText = gecersizOylar;
      document.getElementById("toplam").innerText = toplam;
    }

    // Geçersiz oy kullanımını çıkartmak için aşağıdaki fonksiyonu yazdık.
    function gecersizCikart(){
      if (gecersizOylar>0) {
        gecersizOylar--;
        toplam = gecerliOylar + gecersizOylar;

        // Güncelleme
        document.getElementById("gecersiz").innerText = gecersizOylar;
        document.getElementById("toplam").innerText = toplam;
      }
    }
</script>
<!-- SCRIPT BİTİMİ -->

</head>
<!-- HEAD BİTİMİ -->

<!-- BODY BAŞLANGICI -->
<body>

  <!-- Yapışkan olacak sandık numarasını yazmak için div oluşturduk. -->
<div class="sandik gizle baslik">
   Sandık Numarası: <strong>

    <!-- <3 -->
    <?php
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

<!-- Ana Başlığı Yazıyoruz. -->
<header class="baslik">
<h2>DİJİTAL<br>
 CUMHURBAŞKANLIĞI OY SAYIM ÇETELESİ</h2>
<h4></h4>
</header>

<!-- Adayların bilgisi ver arttırma butonlarının bulunduğu div -->
<div class="main degistirMain">
  <div class="box">
    <div class="rteFotograf">
    </div>
    <span>
      <!-- Aday 1 -->
    <h3>Recep Tayyip<br>
     Erdoğan</h3>
    </span>
    <span>
    <h1 id="rteOy">0</h1>
    </span>
    <button class="arti gizle" onclick="oyArttir('rte')">+</button> <!-- Oy arttır butonu -->
    <p>
      <button class="eksi gizle" onclick="oyCikart('rte')">-</button> <!-- Oy çıkart butonu -->
    </div>
    <div class="ortaCizgi degistir">
    </div>
    <div class="box">
      <div class="kkFotograf">
      </div>
      <span>
        <!-- Aday 2 -->
      <h3>Kemal<br>
       Kılıçdaroğlu</h3>
      </span>
      <span>
      <h1 id="kkOy">0</h1>
      </span>
      <button class="arti gizle" onclick="oyArttir('kk')">+</button>  <!-- Oy arttır butonu -->
      <p>
        <button class="eksi gizle" onclick="oyCikart('kk')">-</button> <!-- Oy çıkart butonu -->
      </div>
    </div>
    <div class="yanCizgi">
    </div>

     <!-- Geçeris Oylar divi  -->
    <div class="gecersizOylar">
      <h2>Geçersiz Oylar</h2>
      <h1 id="gecersiz">0</h1>
      <button class="artiGecersiz gizle" onclick="gecersizArttir()">+</button>
      <p>
        <button class="eksiGecersiz gizle" onclick="gecersizCikart()">-</button>
      </div>
      <div class="yanCizgi">
      </div>

      <!-- Geçeris Oylar divi  -->
      <div class="gecersizOylar">
        <h2>Geçerli Oylar</h2>
        <h1 id="gecerli">0</h1>
      </div>
      <div class="yanCizgi">
      </div>

      <!-- Açılan Zarf Sayısı divi  -->
      <div class="gecersizOylar">
        <h2>Açılan Zarf Sayısı</h2>
        <h1 id="toplam">0</h1>
      </div>
      <div class="yanCizgi">
      </div>

      <!-- İşlem sırasında veya işlem sonrasında kullanılacak buttonlar -->
      <button class="sifirla gizle" onclick="oySifirla()">Tüm Oyları Sıfırla</button>
      <button class="sifirla gizle" onclick="goBack()">Sandık Seçimine Geri Dön</button>
      <button class="sifirla2 gizle" onclick="sonlandır()">Sayımı Sonlandır</button>
      
      </body>
      <!-- BODY BİTİŞİ -->
      
      </html>