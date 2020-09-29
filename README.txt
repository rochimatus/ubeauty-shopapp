1. buat database utf8mb4_general_ci
2. download composer kalau belum ada
3. di folder project, buka file .env terus cek nama db sama username password
4. command: composer install
5. command: php artisan key:generate
6. command: php artisan migrate
7. command: php artisan serve



NOTE:

-kalau bikin controller buat backend:
php artisan make:controller Back/NamaController --resource

-kalau bikin controller buat backend:
php artisan make:controller Front/NamaController --resource
(model udah tak buat semua kaya e)

-view untuk backend ada di resources/views/back, kalau yg frontend di /front
-kalau mau nambah view bisa copas folder view yang udah jadi terus edit sesuai pola

-kalau mau masukin routes nya ngikut di dalemnya masing masing yaa.. ada referensi buat back sama front, ntar ikutin polanya
