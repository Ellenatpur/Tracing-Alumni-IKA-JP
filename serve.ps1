$env:Path = "E:\laragon\bin\php\php-8.5.4;E:\laragon\bin\mysql\mysql-8.0.30-winx64\bin;E:\Program Files\node.js;" + $env:Path
Write-Host "Menjalankan Laravel Server di http://127.0.0.1:8000 ..." -ForegroundColor Cyan
& "E:\laragon\bin\php\php-8.5.4\php.exe" artisan serve
