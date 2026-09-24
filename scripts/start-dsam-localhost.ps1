$ErrorActionPreference = 'Stop'

$appRoot = 'C:\Users\Admin\.codex\visualizations\2026\09\15\01a0a418-061a-76f3-b302-79077ff08488\vibe-app'
$php = 'C:\Users\Admin\.codex\visualizations\2026\09\04\01a06adb-05cc-7e83-95d2-a46c0d2f76da\tools\php\php.exe'
$mysql = 'C:\xampp\mysql\bin\mysqld.exe'
$mysqlConfig = 'C:\xampp\mysql\bin\my.ini'
$logDirectory = Join-Path $appRoot 'storage\logs'

New-Item -ItemType Directory -Force -Path $logDirectory | Out-Null

if (-not (Get-Process -Name mysqld -ErrorAction SilentlyContinue)) {
    Start-Process -FilePath $mysql -ArgumentList "--defaults-file=$mysqlConfig" -WorkingDirectory 'C:\xampp\mysql\bin' -WindowStyle Hidden -RedirectStandardOutput (Join-Path $logDirectory 'mysql-startup.log') -RedirectStandardError (Join-Path $logDirectory 'mysql-startup-error.log')
    Start-Sleep -Seconds 3
}

$laravelRunning = Get-NetTCPConnection -LocalAddress '127.0.0.1' -LocalPort 8000 -State Listen -ErrorAction SilentlyContinue
if (-not $laravelRunning) {
    Start-Process -FilePath $php -ArgumentList 'artisan', 'serve', '--host=127.0.0.1', '--port=8000' -WorkingDirectory $appRoot -WindowStyle Hidden -RedirectStandardOutput (Join-Path $logDirectory 'artisan-serve.log') -RedirectStandardError (Join-Path $logDirectory 'artisan-serve-error.log')
}
