# Milestone2SPARTA
Tugas Milestone 2 SPARTA Kelompok C (7)

Kelompok C membuat sebuah website untuk menyelesaikan masalah yang ada di Tim Phiwiki saat ini. Website ini merupakan implementasi sistem penjualan buku Phiwiki secara online.

## Pendahuluan
Berikut ini merupakan spesifikasi yang meliputi bahasa, platfrom, dan server dalam pembuatan website. Selain itu, terdapat langkah instalasi untuk melakukan pengembangan dan pengujian bagi unsur dalam website. Terdapat pula catatan mengenai hosting pada server online untuk aplikasi web yang telah dibuat. 

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

Explain how to run the automated tests for this system

### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Deployment

Untuk deployment menggunakan hosting dari salah satu provider. Tahap-tahap hosting mirip dengan cara melakukan deploy di server lokal, hanya saja ada sedikit perbedaan untuk penamaan direktorinya.

## Built With

* [Dropwizard](http://www.dropwizard.io/1.0.2/docs/) - The web framework used
* [Maven](https://maven.apache.org/) - Dependency Management
* [ROME](https://rometools.github.io/rome/) - Used to generate RSS Feeds

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Kontributor

* Front-End: **M** - [PurpleBooth](https://github.com/PurpleBooth)
* Back-End: 

Lihat juga [contributors](https://github.com/your/project/contributors) yang aktif membantu proses pengerjaan projek ini.
