param(
    [string]$Database = 'dsam_vibe',
    [string]$Username = 'root',
    [string]$Password = '',
    [string]$DbHost = '127.0.0.1',
    [int]$Port = 3306,
    [string]$PhpPath = ''
)

$ErrorActionPreference = 'Stop'
$projectRoot = Split-Path -Parent $PSScriptRoot
Set-Location $projectRoot

function Find-MySqlClient {
    $command = Get-Command mysql -ErrorAction SilentlyContinue
    if ($command) { return $command.Source }

    $candidates = @(
        'C:\xampp\mysql\bin\mysql.exe',
        'C:\wamp64\bin\mariadb\mariadb*\bin\mysql.exe',
        'C:\Program Files\MariaDB*\bin\mysql.exe',
        'C:\Program Files\MySQL\MySQL Server*\bin\mysql.exe'
    )

    foreach ($candidate in $candidates) {
        $match = Get-Item $candidate -ErrorAction SilentlyContinue | Select-Object -First 1
        if ($match) { return $match.FullName }
    }

    throw 'MySQL/MariaDB client not found. Install MySQL, MariaDB, or XAMPP and start its database service first.'
}

function Invoke-DbCommand([string]$client, [string]$sql) {
    $args = @('--protocol=tcp', "--host=$DbHost", "--port=$Port", "--user=$Username")
    if ($Password) { $args += "--password=$Password" }
    $sql | & $client @args
    if ($LASTEXITCODE -ne 0) { throw 'The database command failed. Check that the service is running and the credentials are correct.' }
}

$mysql = Find-MySqlClient
Invoke-DbCommand $mysql "CREATE DATABASE IF NOT EXISTS `$Database CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

$envPath = Join-Path $projectRoot '.env'
$envText = Get-Content $envPath -Raw
$replacements = @{
    'DB_CONNECTION=.*' = 'DB_CONNECTION=mysql'
    'DB_HOST=.*' = "DB_HOST=$DbHost"
    'DB_PORT=.*' = "DB_PORT=$Port"
    'DB_DATABASE=.*' = "DB_DATABASE=$Database"
    'DB_USERNAME=.*' = "DB_USERNAME=$Username"
    'DB_PASSWORD=.*' = "DB_PASSWORD=$Password"
}
foreach ($entry in $replacements.GetEnumerator()) {
    $envText = [regex]::Replace($envText, "(?m)^$($entry.Key)$", $entry.Value)
}
Set-Content -Path $envPath -Value $envText -Encoding utf8

$php = if ($PhpPath) { Get-Command $PhpPath -ErrorAction SilentlyContinue } else { Get-Command php -ErrorAction SilentlyContinue }
if (-not $php) {
    $phpCandidate = Get-Item 'C:\xampp\php\php.exe', 'C:\Program Files\PHP*\php.exe' -ErrorAction SilentlyContinue | Select-Object -First 1
    if ($phpCandidate) { $php = $phpCandidate }
}
if (-not $php) { throw 'PHP was not found. Add PHP to PATH or pass -PhpPath C:\path\to\php.exe.' }

& $php.Source artisan config:clear
if ($LASTEXITCODE -ne 0) { throw 'Laravel configuration could not be cleared.' }
& $php.Source artisan migrate --seed
if ($LASTEXITCODE -ne 0) { throw 'Laravel migrations or seed failed.' }

Write-Host ''
Write-Host 'DSAM database is ready.' -ForegroundColor Green
Write-Host 'Admin login: General Management / Executive | sonnymata | genmgr'
