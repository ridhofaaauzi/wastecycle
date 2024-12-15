## Struktur Folder

### 1. Folder Utama

-   **`app/`**  
    Berisi logika utama aplikasi, termasuk Controllers, Models, dan Middleware.

    -   **`app/Http/Controllers/`**  
        Berisi file controller untuk pengelolaan request, seperti `TrashExchangeController.php` dan `PointController.php`.
    -   **`app/Models/`**  
        Berisi model untuk interaksi dengan database, seperti `User.php` dan `TrashExchange.php`.

-   **`resources/views/`**  
    Berisi Blade template untuk UI aplikasi.

    -   **`resources/views/transactions/`**  
        Berisi file template untuk fitur penukaran sampah dan poin.

-   **`routes/`**  
    Berisi definisi rute aplikasi.
    -   **`routes/web.php`**  
        Berisi rute untuk halaman web.
    -   **`routes/api.php`**  
        Berisi rute untuk API.

### 2. Folder Publik

-   **`public/`**  
    Folder yang dapat diakses publik, seperti entry point aplikasi (`index.php`) dan file aset (gambar, CSS, JS).
    -   **`public/images/`**  
        Berisi file gambar yang diunggah pengguna atau default aplikasi.

## Cara Menjalankan Aplikasi

1. Clone repository ini.
2. Jalankan perintah berikut untuk instalasi dependensi:
    ```bash
    composer install
    ```
