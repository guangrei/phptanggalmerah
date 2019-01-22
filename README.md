[![Build Status](https://travis-ci.org/guangrei/phptanggalmerah.svg?branch=master)](https://travis-ci.org/guangrei/phptanggalmerah)

phptanggalmerah adalah simple library pengecekan tanggal merah berdasarkan hari minggu dan hari libur nasional (porting dari [pytanggalmerah](https://github.com/guangrei/pytanggalmerah)).

### di butuhkan

php 7.0+

### installasi

```
composer require grei/tanggalmerah
```

### menggunakan phptanggalmerah

``` php
<?php
require "vendor/autoload.php";

$t = new Grei\TanggalMerah();
$t->check(); # mengecek apakah tanggal merah, return boolean.
$t->is_holiday(); # mengecek apakah hari libur nasional, return  boolean.
$t->is_sunday(); # mengecek apakah hari minggu, return booelan.
$t->get_event(); # mendapatkan event, return array

```
 **mengecek specific tanggal tertentu** 

``` php
$t->set_date("20190205");
$t->check();
```
 **mengatur zona waktu** 

secara default zona waktu phptanggalmerah adalah Asia/Jakarta tapi bisa diubah, seperti

``` php
$tz = new DateTimeZone("Asia/Makassar");
$t->set_timezone($tz);
$t->check();
```
 **menggunakan module offline**

untuk memastikan data slalu update library ini mengharuskan terhubung ke internet, namun opsi untuk menggunakan offline juga tersedia.

pastikan sudah mendownload [calendar.json](https://github.com/guangrei/Json-Indonesia-holidays/raw/master/calendar.json)


```php
$t = new Grei\TanggalMerah("lokasi/calendar.json");

```
### sumber data

**phptanggalmerah** menggunakan data yang bersumber dari google calendar, data yang telah lampau mungkin tidak tersedia & data yang sekarang masih bisa direvisi.