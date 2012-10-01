-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 06, 2012 at 04:43 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blogci3`
--

-- --------------------------------------------------------

--
-- Table structure for table `angkatan`
--

CREATE TABLE IF NOT EXISTS `angkatan` (
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`tahun`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angkatan`
--

INSERT INTO `angkatan` (`tahun`) VALUES
(2007),
(2008),
(2009),
(2010),
(2011);

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `IDartikel` int(11) NOT NULL AUTO_INCREMENT,
  `judul` text NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `editor` varchar(50) NOT NULL,
  PRIMARY KEY (`IDartikel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`IDartikel`, `judul`, `kategori`, `isi`, `tanggal`, `gambar`, `author`, `editor`) VALUES
(1, 'Operasi CRUD pada Codeigniter - Menambah Data', 'Teknologi', '<div align="justify">\nEntah  mengapa banyak yang menanyakan melalui email tentang bagaimana membuat  operasi CRUD pada <span style="text-decoration: underline;">Codeigniter</span>.. padahal kan saya penulis buku tentang <a title="CakePHP" href="http://www.agussaputra.com/books/baca_buku/1" target="_self"> CakePHP</a>?.. tapi tak apa deh.. saya ingin memberikan tutorial mengenai  cara pembuatan operasi CRUD pada Codeigniter.. agar lebih mudah  dimengerti, saya akan memberikan step by step.. pada pembahasan ini saya  akan dimulai dari yang pertama, yaitu <strong>Menambah Data</strong>.<br /><br />Sebelumnya siapkan databasenya terlebih dahulu, misalnya nama databasenya adalah <strong>latihanci</strong>.<br />pada database tersebut memiliki sebuah tabel bernama tabel <strong>komentar</strong>, dengan spesifikasi field sebagai berikut :<br />---------------------------------------------------------------<br /><strong>Field</strong>&nbsp;&nbsp; | <strong>Type</strong> | <strong>Length</strong> | <strong>PrimaryKey</strong> | <strong>Autoincreament</strong><br />---------------------------------------------------------------<br />id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | INT&nbsp;&nbsp; | 11&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | *<br />nama&nbsp; | Varchar | 50<br />url&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | varchar&nbsp; | 100<br />pesan | TEXT<br /><br /><strong>Langkah pertama :</strong><br />buka file <strong>autoload.php</strong> yang terdapat dalam folder <strong>system/application/config</strong>. kemudian lakukan konfigurasi load helper dan library berikut :<br /><span style="font-family: courier new,courier;">$autoload[''libraries''] = array(''table'', ''database'');</span><br /><span style="font-family: courier new,courier;">$autoload[''helper''] = array(''url'', ''html'', ''form'');</span><br /><br /><span style="text-decoration: underline;">Penjelasan Kode</span> :<br />-  pada konfigurasi tersebut kita load database yang berfungsi untuk  me-load database dari model yang akan kita buat secara otomatis. lalu  pada helper, kita lakukan load otomatis pada url (untuk redirect), html  (agar bisa menggunakan penanganan kode html), dan form (sama seperti  html).<br /><br /><strong>Langkah kedua</strong> <strong>:</strong><br />Buka file <strong>database.php</strong> yang terdapat dalam folder <strong>system/application/config</strong>, berguna untuk melakukan konfigurasi agar terkoneksi dengan database. lakukan konfigurasi pada skrip berikut :<br /><span style="font-family: courier new,courier;">$db[''default''][''hostname''] = &quot;localhost&quot;; // Server lokal</span><br /><span style="font-family: courier new,courier;">$db[''default''][''username''] = &quot;root&quot;; // Username MySQL</span><br /><span style="font-family: courier new,courier;">$db[''default''][''password''] = &quot;&quot;; // Password MySQL</span><br /><span style="font-family: courier new,courier;">$db[''default''][''database''] = &quot;latihanci&quot;; // Nama database yang digunakan</span><br /><span style="font-family: courier new,courier;">$db[''default''][''dbdriver''] = &quot;mysql&quot;; // kita menggunakan MySQL sebagai database</span><br /><br /><strong>Langkah ketiga : (Membuat file Model)</strong><br />buat file model dengan nama <strong>mkomentar.php</strong> dan simpan dalam folder <strong>system/application/models</strong>. isi skripnya seperti berikut :<br /><span style="font-family: courier new,courier;">1. &lt;?php</span><br /><span style="font-family: courier new,courier;">2. class Mkomentar extends Model {</span><br /><span style="font-family: courier new,courier;">3. &nbsp;&nbsp; </span><br /><span style="font-family: courier new,courier;">4. &nbsp;&nbsp; function tambah() {</span><br /><span style="font-family: courier new,courier;">5. &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; $nama = $this-&gt;input-&gt;post(''nama'');</span><br /><span style="font-family: courier new,courier;">6. &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; $url = $this-&gt;input-&gt;post(''url'');</span><br /><span style="font-family: courier new,courier;">7. &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; $pesan = $this-&gt;input-&gt;post(''pesan'');</span><br /><span style="font-family: courier new,courier;">8. &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; $data = array(</span><br /><span style="font-family: courier new,courier;">9. &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; ''nama'' =&gt; $nama,</span><br /><span style="font-family: courier new,courier;">10. &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; ''url'' =&gt; $url,</span><br /><span style="font-family: courier new,courier;">11. &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; ''pesan'' =&gt; $pesan</span><br /><span style="font-family: courier new,courier;">12. &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; );</span><br /><span style="font-family: courier new,courier;">13. &nbsp; &nbsp;&nbsp;&nbsp; $this-&gt;db-&gt;insert(''komentar'', $data);</span><br /><span style="font-family: courier new,courier;">14. &nbsp;&nbsp; }</span><br /><span style="font-family: courier new,courier;">15. }</span><br /><span style="font-family: courier new,courier;">16. ?&gt;</span><br /><br /><span style="text-decoration: underline;">Penjelasan Kode :</span><br />- pada baris ke-2, merupakan deklarasi untuk menciptakan class model bernama mkomentar.<br />- pada baris ke 4, skrip untuk menciptakan function tambah guna proses tambah data.<br />- pada baris ke 5 s/d 7, tahu kan?.. kalo di PHP classic mah dapat disamakan seperti kode :<br /><span style="font-family: courier new,courier;">$nama = $_POST[''nama''];</span><br /><span style="font-family: courier new,courier;">$url = $_POST[''url''];</span><br /><span style="font-family: courier new,courier;">$pesan = $_POST[''pesan''];</span><br /><br />- pada baris 8 s/d 12, untuk menjadikan inputan tersebut kedalam bentuk array.<br />- pada baris ke-13, proses penyimpanan kedalam tabel komentar.<br /><br /><strong>Langkah keempat : (Membuat File Controller)</strong><br />Buat file controller dengan nama <strong>ckomentar.php</strong> dan simpan dalam folder <strong>system/application/controllers</strong>. adapun isi skripnya seperti berikut :<br /><span style="font-family: courier new,courier;">1. &lt;?php</span><br /><span style="font-family: courier new,courier;">2. Class Ckomentar extends Controller {</span><br /><span style="font-family: courier new,courier;">3. &nbsp;&nbsp; </span><br /><span style="font-family: courier new,courier;">4. &nbsp;&nbsp; function tambahdata() {</span><br /><span style="font-family: courier new,courier;">5. &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; </span><br /><span style="font-family: courier new,courier;">6. &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; if ($this-&gt;input-&gt;post(''submit'')) {</span><br /><span style="font-family: courier new,courier;">7. &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; $this-&gt;load-&gt;model(''mkomentar'');</span><br /><span style="font-family: courier new,courier;">8. &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; $this-&gt;mkomentar-&gt;tambah();</span><br /><span style="font-family: courier new,courier;">9. &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; redirect(''ckomentar/index'');</span><br /><span style="font-family: courier new,courier;">10. &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }</span><br /><span style="font-family: courier new,courier;">11. &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; </span><br /><span style="font-family: courier new,courier;">12. &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; $this-&gt;load-&gt;view(''tambahkomentar'');</span><br /><span style="font-family: courier new,courier;">13. &nbsp;&nbsp; }</span><br /><span style="font-family: courier new,courier;">14. }</span><br /><span style="font-family: courier new,courier;">15. ?&gt;</span><br /><br /><span style="text-decoration: underline;">Penjelasan Kode :</span><br />- pada baris ke-2, skrip deklarasi untuk menciptakan class controller bernama ckomentar.<br />- pada baris ke-4, skrip untuk menciptakan function tambahdata.<br />- pada baris ke-6, jika diklik tombol submit dari form, maka akan dilakukan proses selanjutnya.<br />- pada baris ke-7, skrip untuk me-load model mkomentar.php<br />-  pada baris ke-8, proses pemanggilan function tambah pada class model  mkomentar, disinilah proses penyimpanan tersebut dilakukan.<br />- pada baris ke-9, skrip untuk mengarahkan (redirect) kepada posisi ckomentar.<br />- pada baris ke-12, skrip untuk melakukan load file view form tambah data.<br /><br /><strong>Langkah kelima : (Membuat File View)</strong><br />karena pada skrip diatas me-load file view bernama tambahkomentar, maka kita buat file view bernama <strong>tambahdata.php</strong> dan simpan dalam folder <strong>system/application/views</strong>. adapun skripnya seperti berikut :<br /><span style="font-family: courier new,courier;">&lt;html&gt;</span><br /><span style="font-family: courier new,courier;">&lt;head&gt;</span><br /><span style="font-family: courier new,courier;">&nbsp;&nbsp;&nbsp; &lt;title&gt; Menambah Data &lt;/title&gt;</span><br /><span style="font-family: courier new,courier;">&lt;/head&gt;</span><br /><span style="font-family: courier new,courier;">&lt;body&gt;</span><br /><span style="font-family: courier new,courier;"></span><br /><span style="font-family: courier new,courier;">&lt;h3&gt; Tambah Data &lt;/h3&gt;</span><br /><span style="font-family: courier new,courier;">&lt;?php echo form_open(''ckomentar/tambahdata''); ?&gt;</span><br /><span style="font-family: courier new,courier;"></span><br /><span style="font-family: courier new,courier;">&lt;table&gt;</span><br /><span style="font-family: courier new,courier;">&lt;tr&gt;</span><br /><span style="font-family: courier new,courier;">&nbsp;&nbsp;&nbsp; &lt;td&gt; Nama &lt;/td&gt;</span><br /><span style="font-family: courier new,courier;">&nbsp;&nbsp;&nbsp; &lt;td&gt; : &lt;/td&gt;</span><br /><span style="font-family: courier new,courier;">&nbsp;&nbsp;&nbsp; &lt;td&gt; &lt;?php echo form_input(''nama''); ?&gt; &lt;/td&gt;</span><br /><span style="font-family: courier new,courier;">&lt;/tr&gt;</span><br /><span style="font-family: courier new,courier;">&lt;tr&gt;</span><br /><span style="font-family: courier new,courier;">&nbsp;&nbsp;&nbsp; &lt;td&gt; Url &lt;/td&gt;</span><br /><span style="font-family: courier new,courier;">&nbsp;&nbsp;&nbsp; &lt;td&gt; : &lt;/td&gt;</span><br /><span style="font-family: courier new,courier;">&nbsp;&nbsp;&nbsp; &lt;td&gt; &lt;?php echo form_input(''url''); ?&gt; &lt;/td&gt;</span><br /><span style="font-family: courier new,courier;">&lt;/tr&gt;</span><br /><span style="font-family: courier new,courier;">&lt;tr&gt;</span><br /><span style="font-family: courier new,courier;">&nbsp;&nbsp;&nbsp; &lt;td&gt; Pesan &lt;/td&gt;</span><br /><span style="font-family: courier new,courier;">&nbsp;&nbsp;&nbsp; &lt;td&gt; : &lt;/td&gt;</span><br /><span style="font-family: courier new,courier;">&nbsp;&nbsp;&nbsp; &lt;td&gt; &lt;?php echo form_textarea(''pesan''); ?&gt; &lt;/td&gt;</span><br /><span style="font-family: courier new,courier;">&lt;/tr&gt;</span><br /><span style="font-family: courier new,courier;">&lt;tr&gt;</span><br /><span style="font-family: courier new,courier;">&nbsp;&nbsp;&nbsp; &lt;td&gt; &lt;?php echo form_submit(''submit'', ''Submit'', ''id=&quot;submit&quot;''); ?&gt; &lt;/td&gt;</span><br /><span style="font-family: courier new,courier;">&lt;/tr&gt;</span><br /><span style="font-family: courier new,courier;">&lt;/table&gt;</span><br /><span style="font-family: courier new,courier;">&lt;?php echo form_close(); ?&gt;</span><br /><span style="font-family: courier new,courier;"></span><br /><span style="font-family: courier new,courier;">&lt;/body&gt;</span><br /><span style="font-family: courier new,courier;">&lt;/html&gt;</span><br /><br />nah selesai sudah pembuatan proses tambah data. untuk mencobanya bisa klik di <span style="text-decoration: underline;">http://localhost/namafoldercodeigniterAnda/index.php/ckomentar/tambahdata</span>.<br /><br /><strong>Source Code </strong>lengkapnya dapat Anda download di <a title="sini" href="http://www.agussaputra.com/downloads/download/14" target="_self">sini</a>.<br /><br />Semoga tutorial yang singkat ini dapat memberikan manfaat sebesar-besarnya bagi siapa saja yang membacanya..\n\n</div>', '2010-06-26', '20110228-113638.jpg', '', ''),
(2, 'Antara CakePHP, Codeigniter, dan Zend', 'Teknologi', '<div align="justify">\nbanyak yang menanyakan pada saya baik melalui email ataupun form kontak pada web ini.. Bagus Mana CodeIgniter, CakePHP maupun Zend, Siapakah yang lebih Unggul??.. sulit untuk dijelaskan karena jika saya mengatakan lebih baik gunakan CakePHP, nanti dikira promosi biar bukunya laku .. =(, namun jika saya mengatakan CodeIgniter atau Zend, bagaimana nanti nasib buku saya? hahaha.. =D..<br />\n<br />\njadi begini saja gambarannya, biar pengunjung yang menilai langsung mengenai ketiga framework tersebut, ini saya dapatkan dari beberapa survei dari 10 pembuat program (programmer/developer) yg pernah menggunakan ketiga Framework tersebut.<br />\n<br />\n<strong>1. CodeIgniter</strong><br />\nkesan: mungkin inilah Framework yang memiliki aksesbility tercepat dibandingkan Framework lain.<br />\nKelebihan:<br />\n- Performa dalam mengeksekusi sangat cepat<br />\n- Mendukung PHP4 dan PHP5<br />\n- Dokumentasi Lengkap<br />\n- Mudah dipelajari (katanya sih)..<br />\n<br />\nKekurangan:<br />\n- Tidak Support AJAX dan ORM<br />\n- Banyak kelonggaran dalam coding, penamaan file dan membebaskan programmer untuk melanggar aturan MVC<br />\n- Karena kelonggaran tersebut, CodeIgniter tak bisa dipakai jika membuat aplikasi skala besar, karena pengembangan malah akan semakin sulit dilakukan.<br />\n<br />\n<strong>2. CakePHP</strong><br />\nKesan: Wow, mungkin framework inilah yang benar-benar menyederhanakan fungsi PHP, sehingga penyelesaian pembuatan/pengembangan web benar-benar paling cepat dibandingkan framework lain (RAD).<br />\nKelebihan:<br />\n- Support AJAX dan ORM<br />\n- Pengembangan yang terus dilakukan, saat ini telah mencapai versi 1.3.7.<br />\n- Mendukung PHP4 dan PHP5<br />\n- Arsitektur OOP dan MVC yang sesungguhnya<br />\n- Semua fungsi dalam CodeIgniter sudah ada dalam CakePHP<br />\n- memiliki teknik unik yang tidak didapatkan pada framework lain (kesan mendalam)<br />\n<br />\nKekurangan:<br />\n- Manual Book tidak selengkap CodeIgniter<br />\n- Terlalu banyak aturan jika dibandingkan CodeIgniter (namun sisi ini ada nilai positifnya, yaitu mempermudah pengembangan karena penamaan file dan database telah diatur semua nya oleh CakePHP, sehingga Developer tidak bisa MAIN-MAIN)<br />\n- Butuh waktu belajar lama jika ingin menguasai framework ini (namun jika sudah benar-benar menguasai, Framework CakePHP mempunyai kemampuan yang benar-benar luar biasa handal)<br />\n<br />\n<strong>3. Zend</strong><br />\nkesan: wah, ini adalah framework keluaran PHP asli.<br />\nKelebihan:<br />\n- Dukungan terhadap AJAX dan ORM<br />\n- tujuan utama framework jenis ini biasanya membangun aplikasi web dan untuk memudahkan dalam mengakses API dari berbagai vendor seperti Google, Amazon, yahoo, Flickr.<br />\n<br />\nKekurangan:<br />\n- Tidak mendukung PHP4<br />\n- Manual tidak lengkap<br />\n- Performa Lambat<br />\n- Membutuhkan skill PHP yang sangat tinggi,<br />\n<br />\nsehingga untuk komentar kepada pemula yang ingin belajar Framework PHP:<br />\n- Jika ingin belajar Framework, gunakan lah CodeIgniter terlebih dahulu.<br />\n- Jika CodeIgniter sudah Anda kuasai, beralihlah kepada Framework CakePHP (maka disitu Anda akan mengetahui kelemahan CodeIgniter).<br />\n- Jika Anda telah menguasai CakePHP, beralihlah kepada Zend Framework (karena Zend merupakan Framework yang memiliki sertifikat International yang telah diakui oleh seluruh dunia).<br />\n<br />\nmungkin seperti itu gambaran dari ketiga framework tersebut.<br />\nthanks to: Partner Web Programmer &amp; Developer Team ..<br />\n\n</div>', '2010-03-03', '20110223-020944.jpg', '', ''),
(3, 'Mengenal Struktur Pemrograman OOP', 'Teknologi', '<div align="justify">Saya sering berkeliling ke sana kemari, setelah dilihat-lihat, ternyata \nbanyak juga pengunjung yang request mengenai OOP PHP.. jadi tertarik \nposting mengenai OOP..<br />\nOOP merupakan tren pemrograman saat ini, dan dapat membantu kita dalam menyelesaikan masalah dengan singkat.<br />\n<br />\nSebenarnya, pada buku-buku keluaran Penerbit Lokomedia yang ditulis oleh\n Pak Lukmanul Hakim tanpa kita sadari sebenarnya terdapat kode OOP yang \nterkandung dalam bonus proyek-nya, misalnya apa? .. ya.. salah satunya \nyaitu pada penulisan skrip Paging. Pada penulisan tersebut terdapat \nsimbol <font face="courier new,courier,monospace">-&gt;</font> secara gamblang penulisan paging pada buku karangan Pak \nLukmanul Hakim adalah seperti berikut: <br />\n<br />\n<font face="courier new,courier,monospace">$p&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = new Paging3;</font><br /><font face="courier new,courier,monospace">\n$batas&nbsp; = 6;</font><br /><font face="courier new,courier,monospace">\n$posisi = $p-&gt;cariPosisi($batas); </font><br />\n<br />\nPenulisan kode seperti itu merupakan salah satu kode yang mengacu pada \naturan teknik OOP. Teknik pada kode tersebut ditandai dengan adanya kode\n new dan juga -&gt;. Dalam penulisan skrip seperti itu, dapat diartikan \nsebagai berikut: <br />\n<br />\n?Dalam mengakses atau memanggil Method dalam suatu Class atau Function \ndiperlukan Method dan Argumen yang harus dikirimkan terlebih dahulu. \nDalam hal ini Method pesan dan Argumen yang dikirimkan yaitu $posisi dan\n juga <font face="courier new,courier,monospace">$batas</font>?. <br />\n<br />\nUntuk menggambarkan kode OOP, disini penulis akan membuat kode OOP \nsecara bertahap dari mulai yang paling sederhana. Coba Anda buat file \ndengan nama hello.php kemudian simpan dalam folder OOP (folder OOP harus\n Anda buat terlebih dahulu) dalam folder htdocs (jika Anda menggunakan \nXampp Server), kemudian tuliskan kode berikut: <br />\n<br />\n<font face="courier new,courier,monospace">&lt;?php</font><br /><font face="courier new,courier,monospace">\nclass Hello {</font><br /><font face="courier new,courier,monospace">\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; public function say() {</font><br /><font face="courier new,courier,monospace">\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; echo &quot;Hello&quot;;&nbsp; &nbsp;</font><br /><font face="courier new,courier,monospace">\n&nbsp;&nbsp;&nbsp; }</font><br /><font face="courier new,courier,monospace">\n}</font><br /><font face="courier new,courier,monospace">\n$new = new Hello();</font><br /><font face="courier new,courier,monospace">\n$new-&gt;say();</font><br /><font face="courier new,courier,monospace">\n?&gt;</font><br />\n<br />\nMenurut Anda apa yang akan ditampilkan pada skrip tersebut?..<br />\nPada skrip tersebut, yang menjadi titik utama objek adalah dengan adanya\n perintah new, perintah ini selalu mencerminkan suatu objek.<br />\nJika didefinisikan, skrip diatas dapat diartikan<br />\n&quot;Kita membuat suatu class dengan nama Hello, yang didalamnya memiliki \nsebuah function bernama say, dan dalam function tersebut mengandung \nkalimat Hello. jadi untuk menampilkan kalimat hello, kita harus \nmembuatkan variabel baru, misalnya dengan nama $new, variabel inilah \nyang akan kita jadikan objek, yang akan diturunkan dari function say \ntersebut. Cara menurunkannya itu tak lebih adalah dengan menggunakan \nnew,<br />\n<br />\nSehingga sekarang $new telah menjadi objek, karena diberi perintah <font face="courier new,courier,monospace">new \nHello()</font> yang merupakan sebuah class.. Intinya, dari Class menjadi sebuah\n objek.<br />\nSo.. untuk menampilkan datanya kini telah berubah haluan menjadi :<br />\n<font face="courier new,courier,monospace">&quot;$new-&gt;say();</font><br />\n<br />\n<font face="courier new,courier,monospace">Say()</font> merupakan nama functionnya..<br />\n<br />\nSemoga dengan postingan ini, memberikan gambaran awal mengenai OOP PHP..\n untuk selanjutnya nanti saya persiapkan terlebih dahulu..<br />\n<br />\nOh iya, saya sangat terbuka bagi teman-teman yang ingin memberikan saran\n kepada saya untuk sharing mengenai tema apa.. semoga nanti bisa kita \nshare bareng-bareng di web ini..\n   </div>', '2010-03-03', '20110412-013623.jpg', '', ''),
(4, 'Sebab Error 1053 pada Gammu', 'Teknologi', '<div align="justify">\nWah, sudah berapa lama ya saya tidak update?.. bagaimana kawan kabarnya? apakah masih tetap setia mengunjungi web saya yang sederhana ini?.. so pastinya.. terima kasih banyak atas kesetiaannya.<br />\n<br />\nkali ini saya ingin share mengenai Error 1053 yang sering dihadapi oleh pemula dalam menjalankan start Gammu SMSD. menurut pengalaman saya setidaknya ada 3 hal yang harus diperhatikan untuk menghindari terjadinya error 1053, diantaranya :<br />\n1. Gunakan Struktur tabel Gammu sesuai versi-nya. hal ini disebabkan versi setiap gammu berbeda-beda terhadap struktur tabelnya.<br />\n2. Pastikan penamaan databasenya benar saat konfigurasi database dalam file smsdrc.<br />\n3. Pastikan Port dan Connection nya juga terkoneksi dengan benar dalam file smsdrc.<br />\n<br />\nJika Anda sudah terlanjur menginstal gammu SMSD, saat Anda melakukan perubahan kode pada file Gammurc ataupun Smsdrc, maka Anda juga harus me-reset kembali Service Gammu SMSD nya. dengan cara Un-Install, kemudian Instal kembali.<br />\n<br />\nUntuk melakukan instalasi, dikerjakan pada halaman command line prompt / cmd :<br />\n<strong>gammu-smsd.exe -c smsdrc -i</strong><br />\n<br />\nUntuk melakukan Un-Instal, dapat mengetikkan kode :<br />\n<strong>gammu-smsd.exe -c smsdrc -u</strong><br />\n<br />\nAtau jika Anda ingin mendapatkan info lengkap tentang cara penginstalan, dapat membaca buku terbaru saya yang berjudul <strong>Step by Step Membangun Aplikasi SMS dengan PHP dan MySQL</strong>.<br />\n<br />\nSemoga artikel singkat ini dapat memberi pencerahan untuk Anda yang mengalami solve problem ini..\n\n</div>', '2010-03-03', '20110426-021015.jpg', '', ''),
(5, 'Bikin Sendiri Metode Pencarian Data Berdasarkan Field Menggunakan Framework CakePHP ', 'Teknologi', '<div align="justify">\nSetelah tidak update selama hampir kurang lebih 2 minggu, akhirnya saya \nsempatkan kembali untuk memposting tutorial terbaru (maaf bro, lagi \nbanyak job.. ceileh.. alay.com) .. kali ini datangnya dari sebuah \npermintaan dari pengunjung yang menanyakan tentang bagaimana sih cara \nbikin form pencarian data berdasarkan field menggunakan Framework \nCakePHP?.. sebenarnya pembahasan ini juga akan dibahas pada buku CakePHP\n edisi lanjutan (Lengkap dengan teknik Highlight) .. tunggu saja ya \nkehadirannya .. ^^<br /><br />Sebagai gambaran, kita mempunyai sebuah tabel dengan nama searches dengan masing-masing field sebagai berikut :<br />id | INT | Autoincreament | PrimaryKey<br />nim | Varchar | 10<br />nama | Varchar | 100<br />kota | Varchar | 100<br /><br />nah, karena tabel bernama searches, maka kita buat file modelnya bernama <strong>search.php</strong> (Singular).. isinya cukup seperti berikut :<br />1. &lt;?php<br />2. Class Search extends AppModel {<br />3.&nbsp;&nbsp;&nbsp;&nbsp; var $name = ''Search'';<br />4. }<br />5. ?&gt;<br /><br />Pada baris ke-1, dan ke-5, merupakan perintah awal dan penutup untuk membuat suatu file PHP<br />Pada baris ke-2, deklarasi untuk membuat file model dengan nama Search.<br />Pada baris ke-3, membuat deklarasi variabel dengan nama Search.<br /><br />berikutnya kita buat file controller (sebagai pengendali) dengan nama <strong>searches_controller.php</strong>, adapun skripnya sebagai berikut :<br /><font face="courier new,courier,monospace">&lt;?php<br />Class SearchesController extends AppController {<br />&nbsp;&nbsp;&nbsp; var $name = ''Searches'';<br />&nbsp;&nbsp; <br />&nbsp;&nbsp;&nbsp; function index() {<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; if (!empty ($this-&gt;data)) { // Jika POST tidak kosong<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $field&nbsp;&nbsp;&nbsp;&nbsp; = $this-&gt;data[''Search''][''field''];<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $keyword = $this-&gt;data[''Search''][''keyword''];<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $options = array (<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ''fields'' =&gt; array(''Search.nim'',''Search.nama'',''Search.kota''), // Field yang akan ditampilkan<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ''conditions'' =&gt; array (<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $field.'' LIKE'' =&gt; ''%'' . $keyword . ''%'' // Pencarian<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; );<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $result = $this-&gt;Search-&gt;find(''all'', $options);<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $this-&gt;set(''result'', $result); // Simpan hasil ke dalam bentuk array<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $this-&gt;set(''keyword'', $keyword); // Simpan Keyword ke dalam bentuk array<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; }<br />&nbsp;&nbsp;&nbsp; }<br />}<br />?&gt;</font><br /><br />Menurut saya sih, skrip tersebut sepertinya mudah dibaca.. betul ga? :) .. karena saya tak buat se-friendly mungkin codingnya..<br /><br />Langkah terakhir adalah tinggal membuat saja file view nya dengan nama <strong>index.ctp</strong> (dalam folder <strong>app/views/searches</strong>).. kemudian ikuti saja skrip berikut :<br /><font face="courier new,courier,monospace">&lt;h4&gt; Cari Data &lt;/h4&gt;<br />&lt;?php<br />$option = array(''nim'' =&gt; ''Nim'', ''nama'' =&gt; ''Nama'', ''kota'' =&gt; ''Kota'');<br />echo\n $form-&gt;create(''Search'', array(''url'' =&gt; array(''action'' =&gt; \n''index''), ''inputDefaults'' =&gt; array(''label'' =&gt; false, ''div'' =&gt; \nfalse))); ?&gt;<br />&lt;table&gt;<br />&nbsp;&nbsp;&nbsp; &lt;tr&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;td&gt; &lt;div id=&quot;tahoma&quot;&gt; Kategori &lt;/div&gt; &lt;/td&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;td&gt; &lt;div id=&quot;tahoma&quot;&gt; : &lt;/div&gt; &lt;/td&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;td&gt; &lt;?php echo $form-&gt;select(''field'', $option); ?&gt; &lt;/td&gt;<br />&nbsp;&nbsp;&nbsp; &lt;/tr&gt;<br />&nbsp;&nbsp;&nbsp; &lt;tr&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;td&gt; &lt;div id=&quot;tahoma&quot;&gt; Keyword &lt;/div&gt; &lt;/td&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;td&gt; &lt;div id=&quot;tahoma&quot;&gt; : &lt;/div&gt; &lt;/td&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;td&gt; &lt;?php echo $form-&gt;input(''keyword''); ?&gt; &lt;/td&gt;<br />&nbsp;&nbsp;&nbsp; &lt;/tr&gt;<br />&nbsp;&nbsp;&nbsp; &lt;tr&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;td&gt; &lt;?php echo $form-&gt;end(''Seacrh''); ?&gt; &lt;/td&gt;<br />&nbsp;&nbsp;&nbsp; &lt;/tr&gt;<br />&lt;/table&gt;<br />&lt;?php if(!empty($result)): ?&gt;&lt;hr&gt;<br />&lt;h5&gt; Hasil Pencarian: &lt;/h5&gt;<br />&lt;div id=&quot;tahoma&quot;&gt;<br />&lt;ol&gt;<br />&nbsp;&nbsp;&nbsp; &lt;?php<br />&nbsp;&nbsp;&nbsp; foreach($result as $search):<br />&nbsp;&nbsp;&nbsp; ?&gt;<br />&nbsp;&nbsp; <br />&nbsp;&nbsp;&nbsp; &lt;li&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;?php echo $search[''Search''][''nim'']; ?&gt; |<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;?php echo $search[''Search''][''nama'']; ?&gt; |<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;?php echo $search[''Search''][''kota'']; ?&gt;<br />&nbsp;&nbsp;&nbsp; &lt;/li&gt;&lt;br&gt;<br />&nbsp;&nbsp; <br />&nbsp;&nbsp;&nbsp; &lt;?php endforeach; ?&gt;<br />&lt;/ol&gt;<br />&lt;/div&gt;<br />&lt;?php else: ?&gt;<br />&nbsp;&nbsp;&nbsp; &lt;?php if($this-&gt;data): ?&gt;<br />&nbsp;&nbsp;&nbsp; &lt;div id=&quot;tahoma&quot;&gt;&lt;hr&gt; Maaf, Data Tidak Ditemukan &lt;/div&gt;<br />&nbsp;&nbsp;&nbsp; &lt;?php endif; ?&gt;<br />&lt;?php endif; ?&gt;</font><br /><br />Untuk mencoba hasil dari skrip tersebut, bisa langsung diakses pada url <strong>http://localhost/NamaFolder/searches</strong> ...<br /><br />Jika Anda tidak ingin direpotkan dalam menuliskan kode, dapat Anda download source code lengkapnya <a title="disini" href="http://www.agussaputra.com/downloads/download/18" target="_self"><strong>disini</strong></a>.<br /><br />Semoga\n dengan adanya pembahasan kali ini, dapat memberikan pengetahuan yang \nbaru kepada Anda dalam mempelajari Framework CakePHP..<br /><br />NEWS : Akan hadir Segera 3 buku Karya Agus Saputra, diantaranya :<br />1. MySQL Database Server | PT. Elex Media Komputindo | Agustus / September 2011<br />2. Framework Codeigniter | Lokomedia | Agustus / September 2011<br />3. Framework CakePHP (Edisi Lanjutan) | Lokomedia | Oktober / November 2011<br />Koleksi ya .. <img border="0" title="Smile" src="http://www.agussaputra.com/js/tiny_mce/plugins/emotions/img/smiley-smile.gif" alt="Smile" />\n</div>', '2010-03-03', '20110210-043709.png', '', ''),
(6, 'Step by Step Membangun Aplikasi SMS dengan PHP dan MySQL', 'Teknologi', '<div align="justify">\r\nHaloo kawan.. lama tak jumpa, saya mau promosi dikit nih.. bagi Anda yang ingin belajar tentang dasar-dasar PHP dan MySQL, serta aplikasi SMS (SMS Broadcast, SMS Flash, SMS Gateway, dll).. akan segera terbit buku saya yang berjudul &quot;Step by Step Membangun Aplikasi SMS dengan PHP dan MySQL&quot;.. yang akan diterbitkan oleh PT. Elex Media Komputindo Jakarta.. saat ini masih dalam tahap produksi.. <br />\r\n<br />\r\nBuku ini membahas dari mulai pengenalan SMS (Gammu), PHP dan MySQL, praktek PHP &amp; MySQL dasar, cara koneksi ke database, cara menginstal software SMS, koneksi dengan port handphone / Modem, membangun aplikasi SMS sederhana (SMS Single, Multiple, Group, Flash, SMS Broadcast, SMS Gateway, Trigger, dll), hingga ditutup oleh bonus proyek &quot;Membangun Aplikasi Web Berbasis SMS&quot;.<br />\r\n<br />\r\nPerkiraan terbitnya April / Mei..<br />\r\nSo.. bagi kalian yang ingin belajar tentang Aplikasi SMS, + belajar tentang PHP &amp; MySQL dasar, tak ada salahnya saya alternatifkan buku ini untuk Anda..<br />\r\nJadi, tunggu terbitnya saja ya kawan..<br />\r\n<br />\r\nKlik <a href="../../app/webroot/img/books/cover-sms.jpg" target="_blank" title="disini">disini</a>  untuk melihat cover dalam ukuran besar.<br />\r\n<br />\r\nSemoga buku nanti akan memberikan manfaat yang sebesar-besarmya untuk Anda..\r\n</div>\r\n\r\n', '2010-03-03', '20110405-032017.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--


-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE IF NOT EXISTS `galeri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `gambar` text NOT NULL,
  `userID` int(4) NOT NULL,
  `author` varchar(100) NOT NULL,
  `caption` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `judul`, `tipe`, `gambar`, `userID`, `author`, `caption`) VALUES
(31, 'jsadg', 'image/jpeg', 'upload/active-people-vector-silhouette-11140-large.jpg', 2, 'aggasg', 'sagadgdsagd'),
(30, 'samsul', 'image/jpeg', 'upload/like.JPG', 2, 'irfan', 'kasjdksajl'),
(29, 'SAP', 'image/jpeg', 'upload/sap.jpg', 2, 'Irfan', 'Saya anak SAP'),
(28, 'SAP', 'image/jpeg', 'upload/sap.jpg', 2, 'Irfan', 'Saya anak SAP');

-- --------------------------------------------------------

--
-- Table structure for table `iklan`
--

CREATE TABLE IF NOT EXISTS `iklan` (
  `IDiklan` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL,
  `gambar` text NOT NULL,
  PRIMARY KEY (`IDiklan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `iklan`
--

INSERT INTO `iklan` (`IDiklan`, `url`, `gambar`) VALUES
(1, 'www.bhineka.com', '20100726110001.bmp');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `komentarID` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `url` text NOT NULL,
  `komentar` text NOT NULL,
  `tgl` date NOT NULL,
  `userID` int(11) NOT NULL,
  `artikelID` int(11) NOT NULL,
  PRIMARY KEY (`komentarID`),
  UNIQUE KEY `userID` (`komentarID`),
  UNIQUE KEY `userID_4` (`komentarID`),
  KEY `userID_2` (`komentarID`),
  KEY `userID_3` (`komentarID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`komentarID`, `nama`, `url`, `komentar`, `tgl`, `userID`, `artikelID`) VALUES
(1, 'Agus Saputra', 'www.agussaputra.com', 'mantab gan, tutorialnya sangat membantu..', '2011-06-01', 0, 1),
(2, 'Feni Agustin', '-', 'Nice ^^', '2011-06-02', 0, 1),
(3, 'Putra', '-', 'tq gan, yang sering-sering ya..', '2011-06-02', 0, 2),
(4, 'Suhan', '-', 'Sukses yo..', '2011-06-03', 0, 2),
(5, 'izar', '-', 'mantabbb, semakin byk sharing ilmu semakin banyak duitnya hehe ', '2011-06-03', 0, 2),
(6, 'ifliandry', '-', 'lanjutkan gan..', '2011-06-04', 0, 3),
(10, 'Reporter', '-', 'thanks gan', '2011-12-30', 0, 1),
(11, 'User', '-', 'coba ya gan gua komen', '2011-12-30', 0, 1),
(12, 'asd', '', 'asd', '0000-00-00', 0, 0),
(13, 'aku', '', 'aku', '0000-00-00', 0, 0),
(14, 'kuda', '', 'adadsadas', '0000-00-00', 0, 0),
(15, 'test', '', 'asdad', '0000-00-00', 0, 2),
(16, 'new', '', 'adsas', '0000-00-00', 0, 3),
(17, '', '', '', '0000-00-00', 0, 1),
(18, '0', '', '0', '0000-00-00', 0, 0),
(19, '0', '', 'sdfssfsdf', '0000-00-00', 0, 3),
(20, '0', '', 'asdasdasdadsadsad', '0000-00-00', 0, 3),
(21, '0', '', 'asdasdasdadsadsad', '0000-00-00', 0, 3),
(22, '0', '', 'pppppppppppppppppppppppppppppppppppppppppp', '0000-00-00', 0, 3),
(23, '0', '', 'xxxxxxxxxxxxxxxxxxxxxxxxxxx', '0000-00-00', 0, 3),
(24, '0', '', 'xxxxxxxxxxxxxxxxxxxxxxxxxxx', '0000-00-00', 0, 3),
(25, '0', '', 'xxxxxxxxxxxxxxxxxxxxxxxxxxx', '0000-00-00', 0, 3),
(26, '0', '', 'xxxxxxxxxxxxxxxxxxxxxxxxxxx', '0000-00-00', 0, 3),
(27, '0', '', 'xxxxxxxxxxxxxxxxxxxxxxxxxxx', '0000-00-00', 0, 3),
(28, '0', '', '0', '0000-00-00', 0, 0),
(29, '0', '', '0', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `IDartikel` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `gambar` text NOT NULL,
  PRIMARY KEY (`IDartikel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`IDartikel`, `judul`, `url`, `gambar`) VALUES
(1, 'Agus Saputra', 'www.agussaputra.com', 'Agus_Saputra.jpg'),
(2, 'Lokomedia', 'www.bukulokomedia.com', '110112-052742.png'),
(3, 'Elexmedia', 'www.elexmedia.co.id', 'n8810356148_1460259_3717.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `jurusan` varchar(25) NOT NULL,
  `angkatan` varchar(5) NOT NULL,
  `level` int(11) NOT NULL,
  `IDartikel` int(11) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `nama`, `nim`, `jurusan`, `angkatan`, `level`, `IDartikel`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', '', '', 0, 0),
(2, 'irfandipta', '1234', 'Irfan Budipradipta', '09110110112', 'Teknik Informatika', '2009', 1, 1),
(3, 'irfanbudi', 'doremi', 'Irfan Bachdim', '08110110112', 'Teknik Informatika', '2008', 2, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
