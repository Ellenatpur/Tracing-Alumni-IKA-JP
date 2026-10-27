@echo off
set "PATH=E:\laragon\bin\php\php-8.5.4;E:\laragon\bin\mysql\mysql-8.0.30-winx64\bin;E:\Program Files\node.js;%PATH%"
echo Menjalankan Laravel Development Server...
"E:\laragon\bin\php\php-8.5.4\php.exe" artisan serve
