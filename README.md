# Aplikasi Rental Mobil

Aplikasi manajemen rental mobil berbasis CodeIgniter 3 dan MySQL/MariaDB.

## Menjalankan dengan XAMPP

1. Salin atau clone repository ke `C:\xampp\htdocs\rental-mobil`.
2. Jalankan Apache dan MySQL dari XAMPP.
3. Buat database bernama `rental` melalui phpMyAdmin.
4. Import file `Database/rental.sql` ke database tersebut.
5. Sesuaikan konfigurasi database pada `application/config/database.php` jika username atau password MySQL berbeda dari konfigurasi default XAMPP.
6. Pastikan `application/config/config.php` memiliki base URL yang sesuai dengan nama folder, misalnya:

   ```php
   $config['base_url'] = 'http://localhost/rental-mobil/';
   ```

7. Buka `http://localhost/rental-mobil/` di browser.

## Akun demo lokal

- Username: `demo`
- Password: `DemoRental2026!`

Data di SQL adalah data contoh sintetis. Akun demo hanya untuk menjalankan aplikasi secara lokal. Jangan gunakan kredensial ini atau aplikasi ini apa adanya di server publik; mekanisme password project masih menggunakan MD5.

## Kebutuhan

- PHP dan Apache (misalnya melalui XAMPP)
- MySQL atau MariaDB
- Apache `mod_rewrite` untuk URL tanpa `index.php`
