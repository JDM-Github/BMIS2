@echo off
SETLOCAL

SET PROJECT_PATH=%cd%

echo Checking if Composer is installed...
composer --version >nul 2>&1
IF %ERRORLEVEL% NEQ 0 (
    echo Composer is not installed. Please install Composer first.
    exit /b 1
)

echo Checking if Node.js is installed...
node --version >nul 2>&1
IF %ERRORLEVEL% NEQ 0 (
    echo Node.js is not installed. Please install Node.js first.
    exit /b 1
)

echo Checking if NPM is installed...
npm --version >nul 2>&1
IF %ERRORLEVEL% NEQ 0 (
    echo NPM is not installed. Please install NPM first.
    exit /b 1
)

echo Installing Composer dependencies...
composer install

echo Installing NPM dependencies...
npm install

IF NOT EXIST .env (
    echo Generating .env file...
    cp .env.example .env
)

echo Generating application key...
php artisan key:generate

echo Running migrations and refreshing the database...
php artisan migrate:refresh --seed

:: Clear and cache config, routes, and views
echo Clearing and caching application settings...
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo Setup completed successfully.

:: End script
ENDLOCAL
pause
