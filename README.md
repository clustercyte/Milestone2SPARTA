# Milestone2SPARTA
Tugas Milestone 2 SPARTA Kelompok C (7)

Kelompok C membuat sebuah website untuk menyelesaikan masalah yang ada di Tim Phiwiki saat ini. Website ini merupakan implementasi sistem penjualan buku Phiwiki secara online.

## Pendahuluan
Berikut ini merupakan spesifikasi yang meliputi bahasa, platform, dan server dalam pembuatan website. Selain itu, terdapat langkah instalasi untuk melakukan pengembangan dan pengujian bagi unsur dalam website. Terdapat pula catatan mengenai hosting pada server online untuk aplikasi web yang telah dibuat. 

### Prasyarat

* Platform yang digunakan untuk menulis kode ialah **Text Editor**
* Server web yang digunakan adalah **XAMPP**
* Untuk Front-End, bahasa pemrograman yang digunakan adalah **HTML**
* Untuk Back-End, bahasa pemrograman yang digunakan adalah **PHP**

### Instalasi
Untuk menjalankan environment pengembangan website, maka terdapat rangkaian langkah yang dilakukan. 

**Langkah instalasi XAMPP pada Windows 10:**

1. Download XAMPP dari [Apache Friends](https://www.apachefriends.org/index.html) 

```
Catatan: Perlu dilakukan penyesuaian kebutuhan bergantung dengan jenis versi PHP
```
2. Klik dua kali pada link menuju file yang akan diunduh
3. Klik button **OK** pada warning box untuk melanjutkan
4. Klik button **Next** untuk menyelesaikan instalasi
5. Pilih berbagai komponen yang dibutuhkan sebagai default seperti PHP, dan lain-lain. Selanjutnya, pilih **Next** untuk memilih folder penempatan software.
6. Klik button **Next** untuk Setup
7. Klik button **Allow access** kemudian klik **Finish** untuk menyelesaikan proses Setup
8. Pilih default bahasa kemudian klik **Save**

Adapun langkah berikutnya setelah pengunduhan XAMPP adalah memulai konfigurasi environment sever web.


**Langkah konfigurasi XAMPP pada Windows 10:**

Pada Control Panel XAMPP terdapat tiga bagian utama dimana semua jenis **Service** pada **Module** yang dapat dijalankan melalui button **Start**. 
1. Ketika sebuah service mulai dijalankan, terdapat informasi mengenai process ID serta port TCP/IP pada bagian kanan.
```
Untuk default Apache menggunakan port TCP/IP 80 dan 443 sementara MySQL menggunakan port TCP/IP 3306
```
2. Mengatur button yang terlibat
* Button **Admin** berguna untuk memperoleh akses pada dashboard administrasi pada setiap service dan memastikan bahwa sistem bekerja dengan benar
* Button **Config** untuk melakukan konfigurasi modul secara otomatis ketika launch XAMPP
* Button **Netstat** untuk memunculkan service yang sedang mengakses jaringan, process ID, serta informasi port TCP/IP

Selain itu, terdapat pintasan untuk mengakses folder instalasi XAMPP, service, dan keluar dari aplikasi. Bahkan terdapat bagian logs untuk mengetahui detail perubahan modul yang bekerja sehingga dapat memeroleh pesan kesalahan yang mungkin terjadi.

## Menjalankan pengujian

Pengujian dilakukan secara manual yaitu satu per satu sesuai dengan prosedur yang benar untuk membeli buku

### Sebagai Pembeli

1. Melakukan Registrasi melalui **Create An Account**
Pada **Registration Form**, terdapat data username dan password yang harus diisi kemudian memilih button **Register My Account**

2. Melakukan Log in dengan mengisi username dan password yang benar kemduian memilih button **Sign In**
3. Mengisi Form Pemesanan Buku dengan cara melengkapi semua kolom data yang tersedia kemudian memilih button **Submit**
4. Menguggah Bukti Pembayaran dengan memilih **Choose File** kemudian klik **Submit** jika file sudah benar
5. Memperoleh QR Code untuk mengambil buku
6. Keluar dari akun melalui Button berwarna abu-abu di sebelah kiri atas dashboard, kemudian memilih **Log Out**


### Sebagai Admin

1. Melakukan Log in dengan mengisi username=**z** dan password=**z** kemduian memilih button **Sign In**
2. Membuka penjualan dengan **Buat PO Baru** kemudian pengisi nama PO dan batas tanggal
3. Melihat Data Pre-Order yang mencakup **Data PO** dan **Data Lunas**
Pada **Data PO**, Admin akan melakukan **Konfirmasi** jika bukti pembayaran valid atau **Hapus** jika bukti pembayaran tidak valid
Pada **Data Lunas**, Admin akan melihat data pembeli yang bisa mengambil buku 
4. Membaca QR Code pada Tab **Scanner** sebelum memberikan buku kepada pembeli
5. Keluar dari akun melalui Button berwarna abu-abu di sebelah kiri atas dashboard, kemudian memilih **Log Out**


## Deployment

Untuk deployment menggunakan hosting dari salah satu provider. Tahap-tahap hosting mirip dengan cara melakukan deploy di server lokal, hanya saja ada sedikit perbedaan untuk penamaan direktorinya.

## Program dan Framework yang Terlibat

* [Bootsrap](https://getbootstrap.com/) - Framework yang digunakan
* [QRCode Generator](https://github.com/chillerlan/php-qrcode) - Untuk generator QRCode
* [QRCode Decoder](https://github.com/cirocosta/qcode-decoder/) - Untuk membaca QRCode

## Kontributor

Lihat para [contributors](https://github.com/your/project/contributors) yang aktif membantu proses pengerjaan projek ini.

## Ucapan Terima Kasih

* Untuk sumber inspirasi kode program yang digunakan 
* Untuk konsultan dari Panitia SPARTA 2018
* dan lain-lain
